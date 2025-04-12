<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $title = 'Socialx - Create Post';
        return view('posts.create', compact('title'));
    }

        public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'caption' => 'nullable',
            'location' => 'nullable|string|max:100',
        ]);

        // Store the image
        $imagePath = $request->file('image')->store('posts', 'public');

        // Save the post to the database
        auth()->user()->posts()->create([
            'image' => $imagePath,
            'caption' => $request->caption,
            'location' => $request->location,
        ]);

        // Redirect with a success message
        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }
}
