@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <!-- Profile Header -->
        <div class="row mb-5">
            <div class="col-md-4 text-center profile-page">
                <!-- Profile Image -->
                <div class="profile-image-container mb-3">
                    @if(Auth::user()->profile_photo_path)
                        <img src="{{ asset(Auth::user()->profile_photo_path) }}" alt=">{{ Auth::user()->name }}" class="rounded-circle profile-image">
                    @else
                        <img src="{{ asset('images/user.png') }}" alt=">{{ Auth::user()->name }}" class="rounded-circle profile-image">
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <!-- Profile Details -->
                <div class="d-flex align-items-center mb-3">
                    <h2 class="me-3 mb-0">{{ Auth::user()->name }}</h2>
                    <button type="button" class="btn btn-outline-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                    <a href="#" class="btn btn-outline-secondary btn-sm">View Archive</a>
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
                    <p class="mb-0"><strong>{{ Auth::user()->name }}</strong></p>
                    <p class="mb-0">{{ Auth::user()->bio }}</p>
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


         <!-- Edit Profile Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="POST" action="{{ route('profile.update') }}" id="ProfileForm" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <!-- Bio -->
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ Auth::user()->bio }}</textarea>
                            </div>
                            <!-- City -->
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ Auth::user()->city }}">
                            </div>
                            <!-- Country -->
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" class="form-control" id="country" value="{{ Auth::user()->country }}">
                            </div>
                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <!-- Profile Picture -->
                            <div class="mb-3">
                                <label for="profilePicture" class="form-label">Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control" id="profilePicture">
                            </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>


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