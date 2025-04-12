<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $users = User::where('id', '!=', Auth::user()->id)->latest()->get();
        return view('dashboard', compact('posts', 'users'));
    }

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }

        // Return the new unread notification count in JSON format
        return response()->json(['unreadCount' => auth()->user()->unreadNotifications->count()]);
    }

}
