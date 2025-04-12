@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <div class="row">
            <!-- Posts Column -->
            <div class="col-md-8">
                @foreach($posts as $post)
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->caption }}</h5>
                        <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{ $post->location }}</p>
                        @php
                            $createdAt = $post->created_at;
                        @endphp

                        <p class="card-text">
                            <small class="text-muted">
                                 {{ $createdAt->diffForHumans() }}
                            </small>
                        </p>
                </div>
            </div>
                @endforeach
            </div>

            <!-- Profile and Suggestions Column -->
            <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body text-center profile-card">
                            <!-- Circular Profile Image -->
                            <div class="profile-image-container mb-3">
                                @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset(Auth::user()->profile_photo_path) }}" alt=">{{ Auth::user()->name }}" class="rounded-circle profile-image">
                                @else
                                <img src="{{ asset('images/user.png') }}" alt=">{{ Auth::user()->name }}" class="rounded-circle profile-image">
                                @endif
                            </div>
                            <!-- User Name -->
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                            <!-- Card Text -->
                            <p class="card-text">{{ Auth::user()->bio }}</p>
                            <!-- Button -->
                            <div class="text-center">
                                <a href="{{ route('profile') }}" class="btn btn-default">Profile</a>
                                <a href="{{ route('post.create') }}" class="btn btn-default">Create Post</a>
                            </div>
                        </div>
                    </div>
                <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Suggestions</h5>
                    <!-- List of Suggestions -->
                    <div class="suggestion-list">
                    @foreach($users as $user)
                    <!-- Suggestion Item -->
                    <div class="suggestion-item d-flex align-items-center mb-3 p-3 bg-light rounded shadow-sm">
                        <!-- Profile Image and Name -->
                        <a href="{{ route('see.profile', $user->id) }}" class="d-flex align-items-center text-decoration-none text-dark flex-grow-1">
                            <div class="profile-image-container me-3">
                               @if($user->profile_photo_path)
                                <img src="{{ asset($user->profile_photo_path) }}" alt="Profile Image" class="rounded-circle profile-image" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/user.png') }}" alt=">{{ $user->name }}" class="rounded-circle profile-image">
                                @endif
                            </div>
                            <div class="suggestion-details">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <small class="text-muted">Suggested for you</small>
                            </div>
                        </a>

                        <!-- Follow/Unfollow Button -->
                        <form action="{{ auth()->user()->isFollowing($user) ? route('unfollow', $user->id) : route('follow', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm {{ auth()->user()->isFollowing($user) ? 'btn-outline-danger' : 'btn-default' }}" type="submit">
                                {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                            </button>
                        </form>
                    </div>
                @endforeach

                        <!-- Suggestion 2 -->
                        <div class="suggestion-item d-flex align-items-center mb-3">
                            <div class="profile-image-container me-3">
                                <img src="https://via.placeholder.com/50" alt="Profile Image" class="rounded-circle profile-image">
                            </div>
                            <div class="suggestion-details flex-grow-1">
                                <h6 class="mb-0">User Two</h6>
                                <small class="text-muted">Popular</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-default">Follow</a>
                        </div>

                        <!-- Suggestion 3 -->
                        <div class="suggestion-item d-flex align-items-center mb-3">
                            <div class="profile-image-container me-3">
                                <img src="https://via.placeholder.com/50" alt="Profile Image" class="rounded-circle profile-image">
                            </div>
                            <div class="suggestion-details flex-grow-1">
                                <h6 class="mb-0">User Three</h6>
                                <small class="text-muted">Follows you</small>
                            </div>
                            <a href="#" class="btn btn-sm btn-default">Follow</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection