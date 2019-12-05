@extends('auth.auth_layouts')

@section('title', 'Login')

@section('sidebar')
    {{-- @parent --}}
@endsection

@section('content')
    <div id="app">
        <login></login>
        {{-- <example-component></example-component> --}}
    </div>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
