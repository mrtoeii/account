@extends('auth.auth_layouts')

@section('title', 'Login')

@section('sidebar')
    {{-- @parent --}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
