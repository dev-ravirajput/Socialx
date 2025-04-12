<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        Auth::user()->likes()->attach($post->id);
        
        return back()->with('success', 'Post liked!');
    }

    public function destroy(Post $post)
    {
        Auth::user()->likes()->detach($post->id);
        
        return back()->with('success', 'Post unliked!');
    }
}