<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'user',
            'withdraw_detail'
        ])->where([
            ['user_id', '=', $user->id]
        ])->search($search);

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
}
