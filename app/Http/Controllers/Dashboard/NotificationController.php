<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class NotificationController extends Controller
{
    public function all()
    {
      $notifications = Auth::user()->notifications()->paginate(10);
       return view('dashboard.notification.all', compact('notifications'));
    }


    public function markAllAsRead()
    {
      foreach (Auth::user()->notifications as $notification) {
        $notification->markAsRead();
      }
      return redirect()->back();
    }
}
