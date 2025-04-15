@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Posts Column -->
            <div class="col-lg-8">
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                    <div class="card mb-4 border-0 shadow-sm">
                        <!-- Post Header with User Info -->
                        <div class="card-header bg-white d-flex align-items-center">
                            <a href="{{ route('see.profile', $post->user->id) }}" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center">
                                    @if($post->user->profile_photo_path)
                                    <img src="{{ asset($post->user->profile_photo_path) }}" alt="{{ $post->user->name }}" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                    <img src="{{ asset('images/user.png') }}" alt="{{ $post->user->name }}" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $post->user->name }}</h6>
                                        @if($post->location)
                                        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $post->location }}</small>
                                        @endif
                                    </div>
                                </div>
                            </a>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Save Post</a></li>
                                        @if($post->user_id == Auth::id())
                                        <li><a class="dropdown-item" href="#">Edit Post</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Post Image -->
                        <div class="post-image-container">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top w-100" alt="Post Image" style="max-height: 600px; object-fit: cover;">
                        </div>
                        
                        <!-- Post Actions (Like, Comment, Share) -->
                        <div class="card-body pt-2 pb-1">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <button class="btn btn-sm p-0 me-2 like-btn" data-post-id="{{ $post->id }}">
                                        <i class="far fa-heart fa-lg {{ auth()->user()->hasLiked($post) ? 'text-danger fas' : '' }}"></i>
                                    </button>
                                    <button class="btn btn-sm p-0 me-2 comment-btn">
                                        <i class="far fa-comment fa-lg"></i>
                                    </button>
                                    <button class="btn btn-sm p-0 share-btn">
                                        <i class="far fa-paper-plane fa-lg"></i>
                                    </button>
                                </div>
                                <button class="btn btn-sm p-0 bookmark-btn">
                                    <i class="far fa-bookmark fa-lg"></i>
                                </button>
                            </div>
                            
                            <!-- Likes Count -->
                            <div class="mb-2">
                                <strong>{{ $post->likers()->count() }} likes</strong>
                            </div>
                            
                            <!-- Caption -->
                            <div class="mb-2">
                                <p class="mb-1">
                                    <strong>{{ $post->user->name }}</strong> {{ $post->caption }}
                                </p>
                                @if($post->tags)
                                <div class="tags">
                                    @foreach(explode(',', $post->tags) as $tag)
                                        <a href="#" class="text-primary">#{{ trim($tag) }}</a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            
                            <!-- Comments Preview -->
                            @if($post->comments->count() > 0)
                            <div class="mb-2">
                                <a href="#" class="text-decoration-none text-muted">
                                    View all {{ $post->comments->count() }} comments
                                </a>
                                <div class="d-flex align-items-start">
                                    <strong class="me-2">{{ $post->comments->first()->user->name }}</strong>
                                    <p class="mb-0">{{ $post->comments->first()->comment }}</p>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Time Posted -->
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            
                            <!-- Add Comment -->
                            <form class="mt-2 d-flex mb-2" action="{{ route('comment.store', $post->id) }}" method="POST">
                                @csrf
                                <input type="text" class="form-control form-control-sm border-0 bg-light" placeholder="Add a comment..." name="comment">
                                <button type="submit" class="btn btn-sm btn-link text-primary"><i class="far fa-paper-plane fa-lg"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Default posts when no posts exist -->
                    @for($i = 1; $i <= 4; $i++)
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-header bg-white d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/user.png') }}" alt="Default User" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">Demo User</h6>
                                    <small class="text-muted"><i class="fas fa-map-marker-alt"></i> Lucknow</small>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('images/post'.$i.'.jpg') }}" class="card-img-top w-100" alt="Post Image" style="max-height: 600px; object-fit: cover;">
                        <div class="card-body pt-2 pb-1">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <button class="btn btn-sm p-0 me-2">
                                        <i class="far fa-heart fa-lg"></i>
                                    </button>
                                    <button class="btn btn-sm p-0 me-2">
                                        <i class="far fa-comment fa-lg"></i>
                                    </button>
                                    <button class="btn btn-sm p-0">
                                        <i class="far fa-paper-plane fa-lg"></i>
                                    </button>
                                </div>
                                <button class="btn btn-sm p-0">
                                    <i class="far fa-bookmark fa-lg"></i>
                                </button>
                            </div>
                            <div class="mb-2">
                                <strong>0 likes</strong>
                            </div>
                            <div class="mb-2">
                                <p class="mb-1">
                                    <strong>Demo User</strong> This is a sample post #demo #example
                                </p>
                            </div>
                            <small class="text-muted">Just now</small>
                            <form class="mt-2 d-flex">
                                <input type="text" class="form-control form-control-sm border-0 bg-light" placeholder="Add a comment...">
                                <button class="btn btn-sm btn-link text-primary">Post</button>
                            </form>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>

            <!-- Profile and Suggestions Column -->
            <div class="col-lg-4 d-none d-lg-block">
                <!-- User Profile Card -->
                <div class="card mb-4 border-0 shadow-sm sticky-top" style="top: 80px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @if(Auth::user()->profile_photo_path)
                            <img src="{{ asset(Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                            <img src="{{ asset('images/user.png') }}" alt="{{ Auth::user()->name }}" class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            @endif
                            <div>
                                <a href="{{ route('profile') }}" class="text-decoration-none text-dark">
                                    <h6 class="mb-0">{{ Auth::user()->username ?? Auth::user()->name }}</h6>
                                </a>
                                <small class="text-muted">{{ Auth::user()->name }}</small>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="{{ route('profile') }}" class="btn btn-sm btn-outline-secondary flex-grow-1 me-2">Profile</a>
                            <a href="{{ route('post.create') }}" class="btn btn-sm btn-custom flex-grow-1">Create Post</a>
                        </div>
                    </div>
                </div>
                
                <!-- Suggestions -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Suggestions For You</h6>
                        <!-- <a href="#" class="btn btn-sm btn-link">See All</a> -->
                    </div>
                    <div class="card-body">
                        @foreach($users as $user)
                        <div class="d-flex align-items-center mb-3">
                            <a href="{{ route('see.profile', $user->id) }}" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center flex-grow-1">
                                    @if($user->profile_photo_path)
                                    <img src="{{ asset($user->profile_photo_path) }}" alt="{{ $user->name }}" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                    <img src="{{ asset('images/user.png') }}" alt="{{ $user->name }}" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                    @endif
                                    <div>
                                        <h6 class="mb-0">{{ $user->username ?? $user->name }}</h6>
                                        <small class="text-muted">Suggested for you</small>
                                    </div>
                                </div>
                            </a>
                            <form action="{{ auth()->user()->isFollowing($user) ? route('unfollow', $user->id) : route('follow', $user->id) }}" method="POST" class="ms-auto">
                                @csrf
                                <button class="btn btn-sm {{ auth()->user()->isFollowing($user) ? 'btn-outline-secondary' : 'btn-link text-primary' }}" type="submit">
                                    {{ auth()->user()->isFollowing($user) ? 'Following' : 'Follow' }}
                                </button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Footer Links -->
                <div class="text-center text-muted small">
                    <div class="mb-3">
                        <a href="#" class="text-decoration-none text-muted me-2">About</a>
                        <a href="#" class="text-decoration-none text-muted me-2">Help</a>
                        <a href="#" class="text-decoration-none text-muted me-2">Press</a>
                        <a href="#" class="text-decoration-none text-muted me-2">API</a>
                        <a href="#" class="text-decoration-none text-muted me-2">Jobs</a>
                        <a href="#" class="text-decoration-none text-muted me-2">Privacy</a>
                        <a href="#" class="text-decoration-none text-muted me-2">Terms</a>
                        <a href="#" class="text-decoration-none text-muted">Locations</a>
                    </div>
                    <div>
                        © 2023 INSTAGRAM CLONE
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Like button functionality
        $('.like-btn').click(function(e) {
            e.preventDefault();
            const postId = $(this).data('post-id');
            const heartIcon = $(this).find('i');
            
            $.ajax({
                url: '/posts/' + postId + '/like',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.liked) {
                        heartIcon.removeClass('far').addClass('fas text-danger');
                    } else {
                        heartIcon.removeClass('fas text-danger').addClass('far');
                    }
                    // Update like count
                    $(this).closest('.card-body').find('strong').text(response.likes + ' likes');
                }.bind(this)
            });
        });
        
        // Make the sidebar sticky on scroll
        const sidebar = $('.sticky-top');
        const sidebarOffset = sidebar.offset().top;
        
        $(window).scroll(function() {
            if($(window).width() >= 992) { // Only for large screens
                const scrollTop = $(window).scrollTop();
                if (scrollTop > sidebarOffset) {
                    sidebar.css('top', '20px');
                } else {
                    sidebar.css('top', (sidebarOffset - scrollTop + 20) + 'px');
                }
            }
        });
    });
</script>
@endsection
