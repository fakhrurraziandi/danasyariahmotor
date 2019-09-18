<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\SubscriptionDesktopApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionDesktopAppController extends Controller
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

        $subscription_desktop_app = SubscriptionDesktopApp::with([
            'user'
        ])->wherehas('user')->search($search);

        $data['total'] = $subscription_desktop_app->count();


        $subscription_desktop_app->skip($offset);
        $subscription_desktop_app->limit($limit);
        $subscription_desktop_app->orderBy($sort, $order);

        $data['rows'] = $subscription_desktop_app->get();

        return $data;
    }

    
    public function index()
    {
        return view('admin.subscription_desktop_app.index');
    }

    public function edit(Request $request, SubscriptionDesktopApp $subscription_desktop_app)
    {

        
        return view('admin.subscription_desktop_app.edit', compact('subscription_desktop_app'));
    }

    public function update(Request $request, SubscriptionDesktopApp $subscription_desktop_app)
    {

        $user = $subscription_desktop_app->user;
    
        $data = [
            'status' => $request->get('status')
        ];

        if($request->get('status') == 'approved'){
            $data['subscription_approved_at'] = date('Y-m-d H:i:s');
            $data['subscription_expired_at'] = date('Y-m-d H:i:s', strtotime('+30 days',strtotime($data['subscription_approved_at'])));
        }else{
            $data['subscription_approved_at'] = null;
            $data['subscription_expired_at'] = null;
        }

        

        $subscription_desktop_app->update($data);

        // $user = User::find($user->id);

        // if($request->status == '2'){ $user->notify(new \App\Notifications\User\SubscriptionDesktopAppRequestApproved($user)); }
        // if($request->status == '3'){ $user->notify(new \App\Notifications\User\SubscriptionDesktopAppRequestDenied($user)); }


        return redirect()->route('admin.subscription_desktop_app.index');
    }

    public function report_form()
    {
        return view('admin.subscription_desktop_app.report_form');
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

        $subscription_desktop_apps = SubscriptionDesktopApp::whereRaw("DATE(created_at) BETWEEN '". $from ."' AND '". $to ."'")->get();

        $html = view('admin.subscription_desktop_app.report_pdf', compact('subscription_desktop_apps'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'tempDir' => storage_path()
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();


    }
}
