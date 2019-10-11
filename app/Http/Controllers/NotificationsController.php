<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function notifications()
    {
    	// $user = App\User::find(1);
    	$user = Auth::user();

    	$notifications = $user->notifications->take(25);

		return response()->json($notifications, 200);
    }


    public function markAsRead(Request $request, $id){
    	$user = Auth::user();

    	$notification = $user->notifiations()->find($id)->markAsRead();
    }


    public function markAllAsRead(Request $request)
    {
    	$user = Auth::user();
    	$user->unreadNotifications->markAsRead();
    }

}
