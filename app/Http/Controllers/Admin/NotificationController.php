<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
class NotificationController extends Controller
{
    

    public function notifications()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.notification.notifications', ['admin'=>$admin]);

    }
	public function remove($id)
    {
        Notification::where('id',$id)->delete();
		return redirect()->route('admin.notification.notifications');
    }
}
