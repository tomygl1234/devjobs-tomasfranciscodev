<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;
        $notifications_history = auth()->user()->readNotifications;
        //Clean notifications
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index',[
            'notifications' => $notifications,
            'notifications_history' => $notifications_history
        ]);
    }
}