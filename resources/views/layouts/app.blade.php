<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title ?? 'Socialx- Home' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon-1.png') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <!-- Instagram Logo -->
            <a class="navbar-brand logo-title" href="{{ route('dashboard') }}">
                Socialx
            </a>

            <!-- Search Bar -->
            <div class="d-flex align-items-center">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <!-- Icons -->
                <div class="ms-3 d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="text-dark me-3"><i class="fas fa-home fa-lg"></i></a>
                <a href="#" class="text-dark me-3"><i class="fab fa-facebook-messenger fa-lg"></i></a>
                <a href="#" class="text-dark me-3"><i class="fas fa-video fa-lg"></i></a>


<!-- Notification Bell with Dropdown -->
<div class="dropdown me-3">
    <a href="#" class="text-dark dropdown-toggle" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell fa-lg notification-bell"></i>
        <span class="badge bg-danger rounded-pill notification-badge">
            {{ auth()->user()->unreadNotifications->count() }} <!-- Dynamic unread notification count -->
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="notificationDropdown">
        @if(auth()->user()->notifications->isEmpty())
            <li class="dropdown-item text-muted">No notifications.</li>
        @else
            @foreach(auth()->user()->notifications as $notification)
                <li class="dropdown-item">
                    <!-- Mark as read and view the notification details -->
                    <a href="{{ route('see.profile', $notification->data['follower_id']) }}" class="text-decoration-none text-dark">
                        <p class="mb-1">
                            {{ $notification->data['message'] }}
                        </p>
                        <small class="text-muted">at {{ $notification->created_at->diffForHumans() }}</small>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
            @endforeach
        @endif
    </ul>
</div>



                <!-- Dark Mode Toggle -->
                <button id="darkModeToggle" class="btn btn-link text-dark p-0">
                    <i class="fas fa-moon fa-lg"></i>
                </button>
            </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS and Dark Theme Script -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    // Dark Theme Toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;

    // Check for saved theme in localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
    }

    // Toggle Dark Mode
    darkModeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        const icon = darkModeToggle.querySelector('i');
        if (body.classList.contains('dark-mode')) {
            icon.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('theme', 'dark'); // Save theme preference
        } else {
            icon.classList.replace('fa-sun', 'fa-moon');
            localStorage.setItem('theme', 'light'); // Save theme preference
        }
    });
</script>
<script>
    function markAsRead(notificationId) {
        // Send an AJAX request to mark the notification as read
        fetch('/notification/read/' + notificationId, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Ensure CSRF token is included
            },
        })
        .then(response => response.json())
        .then(data => {
            // After marking as read, update the notification badge count
            document.querySelector('.notification-badge').textContent = data.unreadCount;
        })
        .catch(error => console.error('Error marking notification as read:', error));
    }
</script>
</body>
</html>