@extends('auth.auth_layouts')

@section('title', 'Login')

@section('sidebar')
    {{-- @parent --}}
@endsection

@section('content')
    <div class="container loginBox">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ url('checklogin') }}">
                    @csrf
                    <img class="user" src="{{asset('images/user.png')}}" alt="" srcset="">
                    <h3>Sign in here</h3>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="form-group inputBox">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        <span><i class="fas fa-user"></i></span>

                    </div>
                    <div class="form-group inputBox">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span><i class="fas fa-lock"></i></span>

                    </div>
                    <button type="submit" class="btn btn-primary btn-login ">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
