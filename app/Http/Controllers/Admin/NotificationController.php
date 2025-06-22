<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    public function index()
    {
        // جلب كل إشعارات المستخدم (الأدمن)
        $notifications = auth()->user()->notifications()->paginate(20);

        return view('admin.notifications.index', compact('notifications'));
    }
    public function markRead($id) {
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();
    return back()->with('success', 'تم وضع الإشعار كمقروء.');
}
    //
}
