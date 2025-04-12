<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Notifications\NewFollowerNotification;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function profile(Request $request): View
    {
        $title = 'Socialx - Profile';
        $user = $request->user();
        $posts = Post::where('user_id', Auth::user()->id)->get();
        $postsCount = $posts->count();
        $followers = $user->followers()->get();
        $following = $user->following()->get();
        
        // You can also get counts for display purposes
        $followersCount = $followers->count();
        $followingCount = $following->count();
        
        // Return the view with all the necessary data
        return view('profile.profile', [
            'user' => $user,
            'title' => $title,
            'posts' => $posts,
            'followers' => $followers,
            'following' => $following,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
            'postsCount' => $postsCount
        ]);
    }
    

    public function see_profile($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        $postsCount = $posts->count();
        $followers = $user->followers()->get();
        $following = $user->following()->get();
    
        // You can also get counts for display purposes
        $followersCount = $followers->count();
        $followingCount = $following->count();
        return view('profile.see_profile', compact('user', 'posts', 'followers', 'following', 'followersCount', 'followingCount', 'postsCount'));
    }

    /**
     * Update the user's profile information.
     */

public function update(Request $request)
{ //dd($request->all());
    $user = Auth::user(); 

    // Handle Profile Picture Upload (if any)
    if ($request->hasFile('profile_picture')) {
        // Get the uploaded image
        $image = $request->file('profile_picture');

        // Delete old profile picture if it exists
        if ($user->profile_photo_path && file_exists(public_path('profile_images/' . $user->profile_photo_path))) {
            unlink(public_path('profile_images/' . $user->profile_photo_path)); // Remove old image
        }

        // Generate a new image name and store it in 'profile_images' folder
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('profile_images'), $imageName);

        // Save the new profile photo path to the database
        $profile_photo_path = 'profile_images/' . $imageName;
    }

    // Save other user fields one by one
    $user->name = $request->name;
    $user->bio = $request->bio;
    $user->city = $request->city;
    $user->country = $request->country;
    $user->phone = $request->phone;
    $user->profile_photo_path = $profile_photo_path;

    // If email is changed, reset email verification
    if (isset($validated->email) && $user->email !== $validated->email) {
        $user->email_verified_at = null;
        $user->email = $validated->email;
    }

    // Save the updated user
    $user->save();

    // Redirect with a success message
    return redirect()->route('profile')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function follow(User $user)
    {
        // Check if the user is trying to follow themselves
        if (auth()->user()->id == $user->id) {
            return back()->with('error', 'You cannot follow yourself.');
        }
    
        // Follow the user
        auth()->user()->following()->attach($user->id);
    
        // Send the follow notification to the followed user
        $user->notify(new NewFollowerNotification(auth()->user()));
    
        return back()->with('success', 'You are now following ' . $user->name);
    }

public function unfollow(User $user)
{
    // Check if the user is following this user
    if (!auth()->user()->isFollowing($user)) {
        return back()->with('error', 'You are not following this user.');
    }

    // Unfollow the user
    auth()->user()->following()->detach($user->id);

    return back()->with('success', 'You have unfollowed ' . $user->name);
}


}
