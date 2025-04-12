@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <!-- Profile Header -->
        <div class="row mb-5">
            <div class="col-md-4 text-center profile-page">
                <!-- Profile Image -->
                <div class="profile-image-container mb-3">
                    @if($user->profile_photo_path)
                        <img src="{{ asset($user->profile_photo_path) }}" alt=">{{ $user->name }}" class="rounded-circle profile-image">
                    @else
                        <img src="{{ asset('images/user.png') }}" alt=">{{ $user->name }}" class="rounded-circle profile-image">
                    @endif
                </div>
            </div>
            <div class="col-md-8">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <!-- Profile Details -->
                <h2 class="mb-0">{{ $user->name }}</h2>

                <!-- Follow/Unfollow Button -->
                <form action="{{ auth()->user()->isFollowing($user) ? route('unfollow', $user->id) : route('follow', $user->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm {{ auth()->user()->isFollowing($user) ? 'btn-outline-danger' : 'btn-default' }}" type="submit">
                        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
            </div>
                <!-- Stats -->
                <div class="d-flex mb-3">
                    <div class="me-4">
                        <strong>{{ $postsCount ?? 0 }}</strong> posts
                    </div>
                    <div class="me-4">
                        <strong>{{ $followersCount ?? 0 }}</strong> followers
                    </div>
                    <div>
                        <strong>{{ $followingCount ?? 0 }}</strong> following
                    </div>
                </div>
                <!-- Bio -->
                <div>
                    <p class="mb-0"><strong>{{ $user->name }}</strong></p>
                    <p class="mb-0">{{ $user->bio }}</p>
                    <a href="#" class="text-decoration-none">example.com</a>
                </div>
            </div>
        </div>

        <!-- Tabs for Posts, Reels, etc. -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="fas fa-th"></i> Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-video"></i> Reels
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-bookmark"></i> Saved
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-tag"></i> Tagged
                </a>
            </li>
        </ul>
        <!-- Posts Grid -->
        <div class="row">
        @if(!$posts->isEmpty())
    @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <!-- Post Image -->
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->caption }}">

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Post Caption -->
                    <h5 class="card-title">{{ $post->caption }}</h5>

                    <!-- Post Location -->
                    <p class="card-text">
                        <i class="fa-solid fa-location-dot"></i> {{ $post->location }}
                    </p>

                    <!-- Post Creation Time -->
                    <p class="card-text">
                        <small class="text-muted">
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <!-- No Posts Message -->
    <p>No posts yet.</p>
@endif
        </div>
    </div>
@endsection