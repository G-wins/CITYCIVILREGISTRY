<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function markAsRead()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Log user notifications (pang-debug lang)
        Log::info('User notifications: ', $user->unreadNotifications->toArray());

        $user->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Notifications marked as read']);
    }
}
