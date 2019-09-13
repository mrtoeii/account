<?php
if (!session()->has('users')) {
    return redirect('/');
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title> @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/dashboard/sidebar.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cd73ae7822.js"></script>

    </head>
    <script  type="text/javascript">
        function openSlideMenu(){
            document.getElementById('menu').style.width='250px';
            document.getElementById('content').style.marginLeft='250px';
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
                    <li><a href="{{ url('list') }}">List</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Log out</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
