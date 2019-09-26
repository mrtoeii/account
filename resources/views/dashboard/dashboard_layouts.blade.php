<?php
    $session = session()->get('user');
    $username =  $session['username'];
    $fname =  $session['fname'];
    $lname =  $session['lname'];
    $role =  $session['role'];
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title> @yield('title')</title>
        <link rel="icon" href="{{asset('title/calculator.png')}}"/>
        <link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/dashboard/sidebar.css')}}">

        {{-- datetime picker --}}
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/cd73ae7822.js"></script>

    </head>
    <script  type="text/javascript">
        function openSlideMenu(){
            document.getElementById('menu').style.width='200px';
            document.getElementById('content').style.marginLeft='200px';
        }
        function closeSideMenu(){
            document.getElementById('menu').style.width='0px';
            document.getElementById('content').style.marginLeft='0px';
        }
    </script>
    <body>
        <div id='content'>
            <span class="slide">
                <a href="#" onclick="openSlideMenu()">
                    <i class="fas fa-bars"></i>
                </a>
            </span>
            <div id="menu" class="nav">
                <a href="#" class="close" onclick="closeSideMenu()">
                    <i class="fas fa-times"></i>
                </a>
                <ul>
                    <li><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><a href="{{ url('account') }}">Account</a></li>
                    <li><a href="{{ url('users') }}">Users</a></li>
                    <li><a href="{{ url('profile') }}">Profile</a></li>
                    <li><a href="{{ url('logout') }}">Log out</a></li>
                </ul>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
