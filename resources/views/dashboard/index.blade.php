@extends('dashboard.dashboard_layouts')

@section('title', 'Dashboard')


@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col">Dashboard</div> --}}
            <div id="app">
                <dashboard></dashboard>
            </div>
        </div>
    </div>
@endsection
