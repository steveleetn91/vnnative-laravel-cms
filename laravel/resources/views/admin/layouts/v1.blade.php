<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VN Native CMS') }}</title>
    <script type="text/javascript" src='/js/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app.alert.js') }}" defer></script>
    <script src="{{ asset('datatable/datatables.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>
    <!-- select 2 --> 
    <!-- <script src="{{ asset('select2/dist/js/select2.full.js') }}" defer></script> -->
    <!-- <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet"> -->
    <!-- tinymce --> 
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}" defer></script>
    <script src="{{ asset('js/tinymce.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatable/datatables.min.css') }}" rel="stylesheet">            
    <!-- awesome css v5 -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'VN Native CMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>Menu
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="header-avatar-menu-user">
                                        <img class="admin-header-user-avatar-menu" 
                                        src="{{asset(Auth::user()->avatar)}}" width="40"/>
                                    </div>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!-- profile --> 
                                    <a class="dropdown-item" href="<?php echo route('UpdateUserProfile'); ?>">  
                                    @lang('admin_menu.admin_menu_profile')
                                    </a>
                                    <!-- logout --> 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- menu admin --> 
        @include('admin.menu.v1')
        <main class="py-4">
             <div class="container">
                 <!-- title section --> 
                 <div class="box-title-section">
                    <h2>@yield('title_page')</h2>
                    <p>@yield('sub_title_page')</p>
                </div>
                 <!-- help -->
                <div class="pos-f-t" style="margin-bottom:20px">
                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class="bg-dark p-4">
                        <h4 class="text-white">Help content</h4>
                        <span class="text-muted">@yield('helperContent')</span>
                        </div>
                    </div>
                    <nav class="navbar navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>
                </div>
             </div>
            @yield('content')
        </main>
        @include('admin.footer.v1')
        <!-- app alert --> 
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" style="display:none"
        data-target="#alert-modal-cms-modal-box" id="alert-modal-cms-modal-box-trigger" ></button>

        <!-- Modal -->
        <div class="modal fade" id="alert-modal-cms-modal-box" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="app-modal-alert-title-cms">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="app-modal-alert-message-cms">
                ...
            </div>
            <div class="modal-footer">
                <button id="app-modal-alert-button-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="app-modal-alert-button-confirm" type="button" class="btn btn-primary">Confirm</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
