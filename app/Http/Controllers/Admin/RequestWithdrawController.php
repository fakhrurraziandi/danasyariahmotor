<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestWithdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function json(Request $request)
    {
        $user = Auth::user();

        $limit = $request->filled('limit') ? $request->get('limit') : 10;
        $offset = $request->filled('offset') ? $request->get('offset') : 0;
        $search = $request->filled('search') ? $request->get('search') : '';
        $sort = $request->filled('sort') ? $request->get('sort') : 'id';
        $order = $request->filled('order') ? $request->get('order') : 'DESC';

        $withdraw = Withdraw::with([
            'user'
        ])->wherehas('withdraw_detail')->whereIn('status', [1, 2, 3])->search($search);

        $data['total'] = $withdraw->count();


        $withdraw->skip($offset);
        $withdraw->limit($limit);
        $withdraw->orderBy($sort, $order);

        $data['rows'] = $withdraw->get();

        return $data;
    }

    
    public function index()
    {
        return view('admin.request_withdraw.index');
    }

    public function edit(Request $request, Withdraw $withdraw)
    {
        return view('admin.request_withdraw.edit', compact('withdraw'));
    }

    public function update(Request $request, Withdraw $withdraw)
    {

        $user = $withdraw->user;
    
        $data = [
            'status' => $request->get('status')
        ];

        $withdraw->update($data);

        // $user = User::find($user->id);

        if($request->status == '2'){ $user->notify(new \App\Notifications\User\WithdrawRequestApproved($user)); }
        if($request->status == '3'){ $user->notify(new \App\Notifications\User\WithdrawRequestDenied($user)); }


        return redirect()->route('admin.request_withdraw.index');
    }

    public function report_form()
    {
        return view('admin.request_withdraw.report_form');
    }

    public function report_pdf(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ]);

        // return $request->all();
        $from = $request->get('from');
        $to = $request->get('to');

        $withdraws = Withdraw::whereRaw("DATE(created_at) BETWEEN '". $from ."' AND '". $to ."'")->get();

        $html = view('admin.request_withdraw.report_pdf', compact('withdraws'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'tempDir' => storage_path()
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


    }
}
