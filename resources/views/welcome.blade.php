<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Socialx</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon-1.png') }}"> 
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/react-icons@5.4.0/md" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'Poppins', sans-serif;
  font-style: normal;
  scroll-behavior: smooth;
  background-color: rgb(250, 250, 250);
}
h1,
h2,
h3,
p {
  color: #333;
}
label {
  color: #333;
}
button,
input,
textarea,
select {
  font-family: 'Poppins', sans-serif;
  font-style: normal;
}
select option {
  text-transform: capitalize;
}


/* Main */

.landingpage-container {
  /* max-width: 1024px; */
  margin: auto;
  /* background-color: aqua; */
  /* padding: 1rem; */
  padding-top: 2.8rem;
}
.landingpage-container .landingpage-herosection-container {
  background-color: aquamarine;
  /* height: 80vh; */
  padding-top: 3rem;
  background: rgb(34, 75, 195);
  background: linear-gradient(
    0deg,
    rgba(34, 75, 195, 0.44870448179271705) 0%,
    rgba(255, 255, 255, 1) 100%
  );
  color: #333;
}
.landingpage-herosection-container .ldp-herosection-image-desp-c {
  /* background-color: burlywood; */
  max-width: 1024px;
  margin: auto;
  padding-top: 1rem;
  display: flex;
  /* justify-content: space-between; */
}
@media screen and (max-width: 968px) {
  .landingpage-herosection-container .ldp-herosection-image-desp-c {
    flex-direction: column-reverse;
  }
  .landingpage-herosection-container
    .ldp-herosection-image-desp-c
    .ldp-herosection-desp-action-btn-c {
    justify-content: center;
  }
  .ldp-herosection-image-desp-c .ldp-herosection-image-c {
    margin-top: 2rem;
  }
}
.ldp-herosection-image-desp-c .ldp-herosection-image-c {
  /* background-color: cadetblue; */
  flex: 1.3;
  display: flex;
  flex-direction: column;
  position: relative;
}
.ldp-herosection-image-desp-c .ldp-herosection-image-c .ldp-herosection-image {
  /* background-color: darkgreen; */
  width: 20rem;
  padding: 4px;
}
@media screen and (max-width: 640px) {
  .ldp-herosection-image-desp-c
    .ldp-herosection-image-c
    .ldp-herosection-image {
    width: 15rem;
  }
}
@media screen and (max-width: 540px) {
  .ldp-herosection-image-desp-c
    .ldp-herosection-image-c
    .ldp-herosection-image {
    width: 10rem;
  }
}
.ldp-herosection-image-desp-c
  .ldp-herosection-image-c
  .ldp-herosection-image:nth-child(2) {
  /* background-color: chocolate; */
  align-self: flex-end;
  margin-top: -1rem;
}
.ldp-herosection-image-c .ldp-herosection-image img {
  width: 100%;
}
.ldp-herosection-image-desp-c .ldp-herosection-desp-c {
  /* background-color: chartreuse; */
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 1rem;
}
.ldp-herosection-image-desp-c
  .ldp-herosection-desp-c
  .ldp-herosection-desp-info
  h1 {
  font-size: 2rem;
}
.ldp-herosection-image-desp-c
  .ldp-herosection-desp-c
  .ldp-herosection-desp-info
  p {
  margin-top: 1rem;
  font-weight: 400;
  font-size: 1.2rem;
}
.ldp-herosection-image-desp-c
  .ldp-herosection-desp-c
  .ldp-herosection-desp-action-btn-c {
  margin-top: 3rem;
  width: 100%;
  display: flex;
}
.ldp-herosection-desp-c .ldp-herosection-desp-action-btn-c a {
  text-decoration: none;
  border: 1px solid #fff;
  border-radius: 0.5rem;
  background-color: #f5ba41;
  color: #fff;
  padding: 0.5rem;
  font-size: 1rem;
  display: flex;
  align-items: center;
  cursor: pointer;
  transition: 0.2s ease-in;
}
.ldp-herosection-desp-c .ldp-herosection-desp-action-btn-c a:hover {
  color: #263246;
  background-color: #fff;
  border: 1px solid #f5ba41;
}
.ldp-herosection-desp-c .ldp-herosection-desp-action-btn-c a i {
  margin-left: 0.5rem;
  /* color: #fff; */
}

/* features */
.landingpage-container .landingpage-features-container {
  /* height: 50vh; */
  background: rgb(34, 75, 195);
  background: linear-gradient(
    180deg,
    rgba(34, 75, 195, 0.44870448179271705) 0%,
    rgba(255, 255, 255, 1) 100%
  );
}
.landingpage-container .landingpage-features-container .ldp-features-c {
  /* background-color: aqua; */
  max-width: 1024px;
  margin: auto;
  padding-top: 6rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.ldp-features-c .ldp-features-header {
  display: flex;
  justify-content: center;
}
.ldp-features-c .ldp-features-header h3 {
  font-size: 2rem;
  text-transform: capitalize;
}
.ldp-features-c .ldp-features-cards-container {
  margin-top: 2rem;
  padding: 1rem;
  /* background-color: cadetblue; */
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 3rem;
}
@media screen and (max-width: 768px) {
  .ldp-features-c .ldp-features-cards-container {
    grid-template-columns: repeat(1, minmax(0, 1fr));
  }
}
.ldp-features-cards-container .ldp-features-card-c {
  background-color: #fff;
  display: flex;
  border: 1px solid #bfb3f1;
  border-radius: 0.5rem;
  padding: 0.5rem;
  box-shadow: 1px 1px 4px #bfb3f1;
}
.ldp-features-cards-container .ldp-features-card-c .ldp-features-card-img-c {
  display: flex;
  /* background-color: chartreuse; */
  justify-content: center;
  align-items: center;
  padding: 0.3rem 0.5rem;
  border-radius: 4px;
}
.ldp-features-card-c .ldp-features-card-img-c i {
  font-size: 4rem;
  font-weight: 300;
  color: #294be2;
}
.ldp-features-card-c .ldp-features-card-desp-c {
  margin-left: 1rem;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 5px;
}
.ldp-features-card-c .ldp-features-card-desp-c p {
  font-size: 1rem;
  font-weight: 400;
  color: #686868;
}

/* about */
.landingpage-container .landingpage-about-container {
  padding: 5rem 0;
  background: rgb(34, 75, 195);
  background: linear-gradient(
    0deg,
    rgba(34, 75, 195, 0.11817226890756305) 2%,
    rgba(255, 255, 255, 1) 100%
  );
}
.ldp-about-c .ldp-about-header {
  display: flex;
  justify-content: center;
}
.ldp-about-c .ldp-about-header h3 {
  font-size: 2rem;
  text-transform: capitalize;
}
.ldp-about-c .ldp-about-desp {
  max-width: 1024px;
  margin: auto;
  padding: 1rem;
}
.ldp-about-c .ldp-about-desp p {
  font-size: 1.1rem;
  font-weight: 300;
  color: #333;
  margin-top: 1rem;
  line-height: 2;
  letter-spacing: 0.5px;
}


/* Navbar */
.navbar-0 {
  background-color: #fff;
  width: 100%;
  position: fixed;
  z-index: 10;
}

.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.5rem 2rem;
  color: #fff;
  max-width: 1180px;
  margin: auto;
}

/* Navbar Right Section */
.navbar-right {
  display: flex;
  align-items: center;
}

/* User Actions (Visible on Larger Screens) */
.navbar-user-action-c {
  display: flex;
  align-items: center;
}

@media screen and (max-width: 768px) {
  .navbar-user-action-c {
    display: none; /* Hide on small screens */
  }
}

.navbar-user-action-btn {
  text-decoration: none;
  text-transform: capitalize;
  background-color: #f5ba41;
  color: #fff;
  border: 1px solid #eee;
  border-radius: 0.5rem;
  padding: 0.4rem 1rem;
  margin-left: 1rem;
}

.navbar-user-action-btn:hover {
  text-decoration: underline;
}

/* Menu Icon (Visible on Small Screens) */
.navbar-menu-icon {
  display: none; /* Hidden by default */
  cursor: pointer;
}

@media screen and (max-width: 768px) {
  .navbar-menu-icon {
    display: block; /* Show on small screens */
  }
}

.navbar-right .navbar-user-action-btn {
  text-decoration: none;
  text-transform: capitalize;
  background-color: #f5ba41;
  color: #fff;
  border: 1px solid #eee;
  border-radius: 0.5rem;
  padding: 0.4rem 1rem;
}
.navbar-right .navbar-user-action-btn:hover {
  text-decoration: underline;
}
.navbar-right .navbar-user-action-btn:nth-child(2) {
  margin-left: 1.2rem;
  background-color: #ffffff;
  color: #333;
}
/* Dropdown Menu for Small Screens */
.navbar-dropdown-mb {
  display: none; /* Hidden by default */
  position: absolute;
  top: 100%;
  right: 0;
  background-color: #fff;
  color: #333;
  border-radius: 4px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  z-index: 10;
  padding: 1rem;
  min-width: 200px;
}

.navbar-dropdown-mb ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.navbar-dropdown-mb ul li a {
  text-decoration: none;
  color: gray;
  display: block;
  padding: 0.5rem 1rem;
}

.navbar-dropdown-mb ul li a:hover {
  color: #333;
  background-color: #f5f5f5;
}

/* Show Dropdown Menu When Toggled */
.navbar-dropdown-mb.active {
  display: block;
}

.navbar-right .navbar-add-blog-btn svg {
  margin-right: 0.3rem;
}
@media screen and (max-width: 540px) {
  .navbar-right .navbar-add-blog-btn {
    display: none;
  }
}
.navbar .navbar-brand a {
  text-decoration: none;
}
.navbar .navbar-brand a h2 {
  /* color: aliceblue; */
  color: #333;
}
.navbar .navbar-avatar {
  position: relative;
  display: flex;
  align-items: center;
  cursor: pointer;
}
.navbar-avatar .navbar-avatar-initials {
  background-color: coral;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.navbar .navbar-avatar img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid #bebebe;
  object-fit: cover;
}
.navbar .navbar-avatar .navbar-dropdown {
  z-index: 10;
  position: absolute;
  top: 100%;
  right: 0;
  padding: 1rem;
  min-width: 300px;
  background-color: #fff;
  color: #333;
  border-radius: 4px;
  display: flex;
  flex-direction: column;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.navbar .navbar-avatar .navbar-dropdown .only-mb-d {
  display: none;
}
@media screen and (max-width: 540px){
  .navbar .navbar-avatar .navbar-dropdown .only-mb-d {
    display: block;
  }
}
.navbar-avatar .navbar-dropdown p {
  font-weight: 300;
  display: inline-block;
}
.navbar-avatar .navbar-dropdown ul {
  list-style: none;
  margin-top: 1rem;
}
.navbar-avatar .navbar-dropdown ul li:nth-child(3) {
  border-top: 1px solid #dddddd;
  /* margin-top: 0.1rem; */
  padding-top: 0.5rem;
}

.navbar-dropdown ul li a,
.navbar-dropdown ul li {
  text-decoration: none;
  cursor: pointer;
  margin: 0.5rem;
  color: gray;
  text-transform: capitalize;
  display: flex;
  align-items: center;
  width: 100%;
}
.navbar-dropdown ul li svg {
  margin-right: 0.5rem;
  font-size: 1.2rem;
}
.navbar-dropdown ul li a {
  margin: 0;
  width: 100%;
}
.navbar-dropdown ul li .navbar-navlinks-active {
  color: #333;
}
.navbar-dropdown ul li .navbar-navlinks {
  color: gray;
}
.navbar-avatar .navbar-dropdown ul li:hover,
.navbar-avatar .navbar-dropdown ul a:hover {
  color: #333;
}
.navbar-right .navbar-menu-icon {
  color: #333;
  font-size: 1.5rem;
  display: none;
}
@media screen and (max-width: 540px) {
  .navbar-right .navbar-menu-icon {
    display: block;
  }
}
.navbar .navbar-avatar .navbar-menu-icon {
  display: none;
  font-size: 1.8rem;
  cursor: pointer;
  color: #333;
}
/* max-width 640px */
@media screen and (max-width: 640px) {
  .navbar .navbar-avatar img {
    display: none;
  }
  .navbar .navbar-avatar .navbar-menu-icon {
    display: flex;
  }
}


/* Logo */
@keyframes globe-spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.logo-c {
  display: flex;
  align-items: center;
}
.logo-c i {
  color: rgb(174, 0, 255);
  position: relative;
  margin-right: 0.6rem;
  font-size: 1.5rem;
  font-weight: 100;
  animation: globe-spin 15s linear infinite;
}
.logo-c i:nth-child(2) {
  color: rgb(73, 103, 236);
  margin-left: -0.4rem;
}
.logo-c p {
  color: #2d2d2e;
  font-weight: 700;
  font-size: 1.2rem;
  letter-spacing: 1px;
}
@media screen and (max-width: 540px) {
  .logo-c svg {
    font-size: 1.2rem;
  }
  .logo-c p {
    font-size: 1rem;
  }
}

/* footer */
footer {
  border-top: 1px solid #dddddd;
  position: relative;
  /* background-color: rgb(255, 255, 255); */
  background: rgb(73,75,81);
background: linear-gradient(0deg, rgba(73,75,81,0.22461484593837533) 2%, rgba(255,255,255,1) 100%);
  color: #333;
  padding: 2rem 4rem;
  overflow: hidden;
}

footer .footer-container {
  position: relative;
  margin: auto;
}
.footer-logo-c {
  display: flex;
  align-items: center;
}
@keyframes globe-spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.footer-logo-c i {
  color: rgb(174, 0, 255);
  position: relative;
  margin-right: 0.6rem;
  font-size: 2rem;
  font-weight: 100;
  animation: globe-spin 15s linear infinite;
}
.footer-logo-c i:nth-child(2) {
  color: rgb(73, 103, 236);
  margin-left: -0.4rem;
}
.footer-logo-c p {
  color: #333;
  font-size: 2rem;
  font-weight: 600;
  letter-spacing: 1px;
}
.footer-credits-c {
  display: flex;
  margin-top: 0.5rem;
}
.footer-credits-c p {
  color: #333;
  font-weight: 200;
  margin-right: 1rem;
}
.footer-credits-c div a {
  display: flex;
  align-items: center;
  color: #333;
  text-decoration: none;
  font-weight: 400;
}
.footer-credits-c div a:hover {
  text-decoration: underline;
}
.footer-credits-c div a svg {
  margin-right: 0.3rem;
}

.footer-container .footer-links {
  /* background-color: aqua; */
  margin-top: 2rem;
  display: flex;
  justify-content: space-around;
}

.footer-container .footer-links .footer-link-c {
  display: flex;
  flex-direction: column;
}
.footer-links .footer-link-c span {
  font-weight: 600;
  margin-bottom: 0.5rem;
}
.footer-links .footer-link-c p {
  font-weight: 400;
  margin-bottom: 0.2rem;
}
.footer-links .footer-link-c p a {
  text-decoration: none;
  color: #333;
  display: flex;
  align-items: center;
  text-transform: capitalize;
}
.footer-links .footer-link-c p a:hover {
  text-decoration: underline;
}
.footer-links .footer-link-c p a svg {
  margin-right: 0.5rem;
  color: #333;
}
.footer-container .footer-banner {
  margin-top: 3rem;
  display: flex;
  justify-content: flex-start;
  align-items: center;
}
.footer-container .footer-banner p {
  letter-spacing: 1px;
  display: flex;
  align-items: center;
}
.footer-container .footer-banner p a {
  /* text-decoration: none; */
  color: #333;
}
.footer-banner p svg {
  margin: 0 0.5rem;
}
.footer-banner p svg:nth-child(1) {
  color: rgb(223, 93, 93);
}
/* bg svg */
footer .svg-c {
  position: absolute;
  right: -8px;
  top: -3rem;

  display: flex;
  /* flex-direction: column; */
  overflow: hidden;
}
footer .svg-c i {
  font-size: 10rem;
  color: rgb(235, 235, 235);
}
footer .svg-c svg:nth-child(2) {
  margin-left: 2rem;
}

@media screen and (max-width: 540px) {
  .footer-logo-c svg {
    font-size: 1.1rem;
  }
  .footer-logo-c p {
    font-size: 1.1rem;
  }
  .footer-credits-c {
    flex-direction: column;
  }
  .footer-links {
    flex-direction: column;
  }
  .footer-links .footer-link-c {
    margin-bottom: 0.5rem;
  }
  .footer-container .footer-banner {
    justify-content: center;
  }
  .footer-banner p {
    flex-direction: column;
  }
  .footer-banner p svg {
    margin: 0.5rem;
  }
  footer .svg-c {
    right: -20px;
  }
  footer .svg-c svg {
    font-size: 6rem;
  }
}
  </style>
</head>
<body>
<div class="landingpage-navbar">
  <div class='navbar-0'>
    <nav class='navbar'>
      <!-- Brand Logo -->
      <div class='navbar-brand'>
        <a href='/'>
          <div class='logo-c'>
            <img src="{{ asset('images/logo-1.png') }}" height="90" alt="Logo">
          </div>
        </a>
      </div>

      <!-- Navbar Right Section -->
      <div class='navbar-right'>
        <!-- Menu Icon (Visible on Small Screens) -->
        <div class='navbar-menu-icon' onclick="toggleDropdownMb()">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </div>

        <!-- User Actions (Visible on Larger Screens) -->
        <div class='navbar-user-action-c'>
          @if (Route::has('login'))
            @auth
              <a href="{{ url('/dashboard') }}" class='navbar-user-action-btn'>
                Dashboard
              </a>
            @else
              <a href="{{ route('login') }}" class='navbar-user-action-btn'>
                Login
              </a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class='navbar-user-action-btn'>
                  Sign Up
                </a>
              @endif
            @endauth
          @endif
        </div>
      </div>

      <!-- Dropdown Menu for Small Screens -->
      <div class='navbar-dropdown-mb' id="navbarDropdownMb">
        <ul>
          @if (Route::has('login'))
            @auth
              <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            @else
              <li><a href="{{ route('login') }}">Login</a></li>
              @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Sign Up</a></li>
              @endif
            @endauth
          @endif
        </ul>
      </div>
    </nav>
  </div>
</div>

<div class='landingpage-container'>
  <section class='landingpage-herosection-container'>
    <div class='ldp-herosection-image-desp-c'>
      <div class='ldp-herosection-image-c'>
        <div class='ldp-herosection-image'>
          <img src="https://blogsphere-react-node.vercel.app/assets/landingpageheroone-D1F3EI2r.svg" alt='hero1' />
        </div>
        <div class='ldp-herosection-image'>
          <img src="https://blogsphere-react-node.vercel.app/assets/landingpageherotwo-CLWc85VH.svg" alt='hero1' />
        </div>
      </div>
      <div class='ldp-herosection-desp-c'>
        <div class='ldp-herosection-desp-info'>
          <h1>Experience the Future of Social.</h1>
          <p>Feel free to connect others, chatting and share memories.</p>
        </div>
        <div class='ldp-herosection-desp-action-btn-c'>
          <a href='https://blogsphere-react-node.vercel.app/' target="_blank">
            Get Started
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class='landingpage-features-container'>
    <div class='ldp-features-c'>
      <div class='ldp-features-header'>
        <h3>features</h3>
      </div>
      <div class='ldp-features-cards-container'>
        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style=" background-color: rgb(255 231 231) ">

            <i class="fa-regular fa-newspaper" style="color: #eb7373;"></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>
              create and explore awesome blog post of different
              categories.
            </p>
          </div>
        </div>

        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style=" background-color: #ede6ff">

            <i class="fa-regular fa-user" style="color: #9773eb;"></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>Follower other blogs and be updated on new blog posts. </p>
          </div>
        </div>

        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style="  background-color: #d5ffea">
            <FaHouseUser style="color:#73ebaf;" />
            <i class="fa-regular fa-handshake" style="  color: #73ebaf"></i></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>
              Complete user management. Include password reset and forgot
              password, abouts and more.
            </p>
          </div>
        </div>

        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style="  background-color: #dce4ff">
            <SiGooglegemini style="color:#738feb;"  />
            <i class="fa-regular fa-star" style="color: #738feb"></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>Generate Blogs using google's gemini</p>
          </div>
        </div>
        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style="  background-color: #fdffef">

            <i class="fa-regular fa-gem" style="color: #d9eb73"></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>
              Earn rewards by posting blog, liking a post or commenting.
            </p>
          </div>
        </div>
        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style="background-color: #e8ffe8">

            <i class="fa-regular fa-credit-card" style="color: #77eb73"></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>Redeem your earned rewards to Ai credits</p>
          </div>
        </div>
        <div class='ldp-features-card-c'>
          <div class='ldp-features-card-img-c' style=" background-color: #d0d9ff">

            <i class="fa-regular fa-rectangle-list" style="color: #294be2"></i>
          </div>
          <div class='ldp-features-card-desp-c'>
            <p>
              Razorpay payment integration for seemless and hasslefree
              payments.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class='landingpage-about-container'>
    <div class='ldp-about-c'>
      <div class='ldp-about-header'>
        <h3>About</h3>
      </div>
      <div class='ldp-about-desp'>
        <p>
          Blogsphere is an innovative platform that leverages artificial
          intelligence to simplify content creation with google's gemini ai. Whether you're a
          professional writer or a hobbyist, our tools help you craft
          compelling blogs, manage images, and reach your audience
          efficiently.

        </p>
        <p>Complete user management lets you manage your profile details, reset passwords and more. Besides creating new posts user get rewards point which later can be redeem to ai credits. User also gets rewards for liking and commenting on post.
        </p>
        <p>Purchase Ai credits with seemless payment through razorpay payment gateway.</p>
      </div>
    </div>
  </section>
   <footer>
      <div class='svg-c'>
       <i class="fa-regular fa-lemon"></i>
        <i class="fa-regular fa-lemon"></i>
      </div>
      <div class='footer-container'>
        <div class='footer-logo-credits'>
          <div class='footer-logo-c'>
            <img src="{{ asset('images/logo-1.png') }}" height="90">
          </div>
          <div class='footer-credits-c'>
            <p>© 2024 - 2026</p>
            <div>
              <a href='https://github.com/GaneshSrambikal' target='_blank'>
                <FaGithub />
                GaneshSramikal
              </a>
            </div>
          </div>
        </div>

        <div class='footer-links'>
          <div class='footer-link-c'>
            <span>pages</span>
   
                <p>
                  <a href='#'>login</a>
                </p>
                <p>
                  <a href='#'>sign up</a>
                </p>
   
                <p>
                  <a href='/home'>home</a>
                </p>
                <p>
                  <a href='/profile'>profile</a>
                </p>
              </>
           
          </div>
          <div class='footer-link-c'>
            <span>social</span>
            <p>
              <a href='https://github.com/GaneshSrambikal' target='_blank'>
                <FaGithub />
                github
              </a>
            </p>
            <p>
              <a href='https://x.com/GaneshSrambikal' target='_blank'>
                <FaTwitter />x
              </a>
            </p>
            <p>
              <a
                href='https://www.behance.net/GaneshSrambikal'
                target='_blank'
              >
                <FaBehance />
                behance
              </a>
            </p>
            <p>
              <a href='https://codepen.io/ganeshsrambikal' target='_blank'>
                <FaCodepen /> codepen
              </>
            </p>
            <p>
              <a href='mailto:ganesh.srambikal@gmail.com' target='_blank'>
                <MdOutlineMail /> mail
              </a>
            </p>
          </div>

          <div class='footer-link-c'>
            <span>tech stack</span>
            <p>
              <a href='https://react.dev/' target='_blank'>
                <FaReact /> react
              </a>
            </p>
            <p>
              <a href='https://expressjs.com/' target='_blank'>
                <SiExpress /> express
              </a>
            </p>
            <p>
              <a href='https://www.mongodb.com/' target='_blank'>
                <SiMongodb /> mongodb
              </a>
            </p>
            <p>
              <a href='https://nodejs.org/en' target='_blank'>
                <FaNodeJs /> nodejs
              </a>
            </p>
            <p>
              <a
                hreg='https://ai.google.dev/gemini-api/docs/models/gemini'
                target='_blank'
              >
                <SiGooglegemini /> gemini
              </>
            </p>
            <p>
              <a href='https://axios-http.com/' target='_blank'>
                <SiAxios /> axios
              </a>
            </p>
            <p>
              <a href='https://joi.dev/' target='_blank'>
                <FaJoint /> joi
              </a>
            </p>
            <p>
              <a href='https://reactrouter.com/' target='_blank'>
                <SiReactrouter /> react router
              </a>
            </p>
            <p>
              <a
                href='https://razorpay.com/docs/payments/payment-gateway/web-integration/standard/'
                target='_blank'
              >
                <SiRazorpay /> razorpay
              </a>
            </p>
            <p>
              <a href='https://cloudinary.com/' target='_blank'>
                <SiCloudinary /> cloudinary
              </a>
            </p>
            <p>
              <a href='https://undraw.co/' target='_blank'>
                <FaPen /> illustrations
              </a>
            </p>
          </div>
        </div>
        <div class='footer-banner'>
          <p>
            Made with <i class="fa-regular fa-heart"></i> by 
            <a href='https://github.com/GaneshSrambikal' target='_blank'>
              GaneshSrambikal
            </a>
          </p>
        </div>
      </div>
    </footer>
</div>
</body>
<script>
    function toggleDropdownMb() {
  const dropdown = document.getElementById("navbarDropdownMb");
  dropdown.classList.toggle("active");
}
</script>
</html>