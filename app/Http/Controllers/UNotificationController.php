<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UNotificationController extends Controller
{
    public function index()
    {
         $notifications = auth()->user()->notifications;
          $UnreadNotificationsCount = auth()->user()->UnreadNotifications->count();
        return view('Unotifications.index', compact('notifications', 'UnreadNotificationsCount'));
    }
     public function markAsRead($id)
{
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();

    return redirect()->back()->with('success', 'Notification marked as read.');
}
    //
}
