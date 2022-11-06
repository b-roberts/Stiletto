
<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs
 * @license MIT
 -->
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Stiletto">
    <link rel="shortcut icon" href="{{asset('logo.png')}}">

    <title>@yield('page_title') | Stiletto</title>

    <!-- Icons -->
    <link href="{{asset('/css/fa-pro/all.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&display=swap" rel="stylesheet">
    <!--<link href="/css/simple-line-icons.css" rel="stylesheet">-->

    <!-- Main styles for this application -->
    <link rel="stylesheet" href="{{ asset('/css/theme.css') }}">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="{{asset('/css/print.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    @stack('styles')
    <style>
    .ui-autocomplete { z-index:30000; }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Footer options
1. '.footer-fixed'						- Fixed footer

-->

<body class="app header-fixed aside-menu-show sidebar-show">
  @include('header')
  <div class="app-body">
      @include('left_menu')
    <!-- Main content -->
    <main class="main">
        <ol class="breadcrumb">
          @yield('breadcrumbs')
          <li class="breadcrumb-menu d-md-down-none">
            @yield('breadcrumb-menu')
            @stack('breadcrumb-menu')
              <a class="btn btn-link" href="{{route('article.create')}}" > New Article</a>
          </li>
        </ol>
      <div class="container-fluid">
        @if(session('flash_info'))
          <div class="alert alert-info" role="alert">
            {!! session('flash_info') !!}
          </div>
        @endif
        @if(session('flash_success'))
          <div class="alert alert-success" role="alert">
            {!! session('flash_success') !!}
          </div>
        @endif
        @if ((isset($errors) && $errors->any()) || session('flash_error'))
          <div class="alert alert-danger" role="alert">
            {!! session('flash_error') !!}
            @if (isset($errors) && $errors->any())
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
          </div>
        @endif
        @yield('content')
      </div>
      <!-- /.conainer-fluid -->
    </main>
      <aside class="aside-menu">
@include('right_menu')
      </aside>
  </div>
@include('footer')