<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function markAsRead(){
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $user->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Notifications marked as read']);
    }
    public function markSingleAsRead($id)
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['message' => 'User not authenticated'], 401);
    }

    $notification = $user->unreadNotifications->where('id', $id)->first();

    if ($notification) {
        $notification->markAsRead();
        return response()->json(['message' => 'Notification marked as read']);
    }

    return response()->json(['message' => 'Notification not found'], 404);
}

}
