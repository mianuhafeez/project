<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
</head>
<body class="font-montserrat">
<div id="app">
    <div id="header_top" class="header_top">
        <div class="container">
            <div class="hleft">
                <a class="header-brand"><i class="zmdi zmdi-settings brand-logo"></i></a>
            </div>
        </div>
    </div>
    <div id="left-sidebar" class="sidebar ">
        <h5 class="brand-name">Project <a href="javascript:void(0)" class="menu_option float-right">
            </a></h5>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
                <li class="active mt-3"><a href="project-todo.html"><i class="zmdi zmdi-balance-wallet"></i><span>Todo List</span></a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="page">
        <div id="page_top" class="section-body top_dark">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="left">
                        <a href="javascript:void(0)" class="icon menu_toggle mr-3"><i
                                class="zmdi zmdi-format-align-left"></i></a>
                        <h1 class="page-title">Todo List</h1>
                    </div>
                    <div class="right">
                        <div class="notification d-flex">
                            <div class="dropdown d-flex">

                                <div class="" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto">
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                            @endif
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                   role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                     aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <main>
        @yield('content')
    </main>
</div>
</div>
</body>
</html>
