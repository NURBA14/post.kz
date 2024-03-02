<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')@show
    </title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    @section('header')
        <header class="p-3 text-bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="{{ route('home') }}" class="col-1 navbar-brand d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                            <circle cx="12" cy="13" r="4" />
                        </svg>
                        <strong>POST</strong>
                    </a>

                    <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 gap-3 px-5">
                        <a href="{{ route('home') }}"><button class="btn btn-outline-warning px-3"
                                type="button">HOME</button></a>
                        @auth
                            <a href="{{ route('post.create') }}"><button class="btn btn-outline-warning px-3"
                                    type="button">POST CREATE</button></a>
                        @endauth
                        <a href="{{ route('page.about') }}"><button class="btn btn-outline-warning px-3"
                                type="button">ABOUT</button></a>
                    </div>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ route('post.search') }}" role="search"
                        method="GET">
                        @csrf
                        <input type="search" class="form-control form-control-dark text-warning text-bg-dark"
                            placeholder="Search..." aria-label="Search" name="search">
                    </form>

                    @auth
                        <div class="text-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-warning">{{ auth()->user()->name }}</button>
                                <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.profile.posts') }}">My posts</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-bg-danger" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="text-end">
                            <a href="{{ route('login.create') }}"><button type="button"
                                    class="btn btn-warning me-2">Login</button></a>
                            <a href="{{ route('reg.create') }}"><button type="button"
                                    class="btn btn-warning">Sign-up</button></a>
                        </div>
                    @endguest
                </div>
            </div>
        </header>
    @show

    <main>
        @yield('main')
    </main>

    @section('footer')
        @include('layouts.footer')
    @show

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
