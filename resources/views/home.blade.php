@extends('layouts.app')

@section('header')

    @include('_includes.header', ['title' => 'Welcome, ' . $user->name, 'subtitle' => 'Thank you for joining our team as a ' . $user->role,
'schedule_program' => 'Schedule Program'])

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div>
@endsection
