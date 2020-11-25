@extends('layouts.app')

@section('header')
    @include('_includes.header',[
    'title' => 'Cities',
    'subtitle' => 'Are we located in your city?',
    'join_community' => 'JOIN OUR COMMUNITY',
    'schedule_program' => 'SCHEDULE PROGRAM',
    ])
@endsection

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>

    @livewire('data-pagination');

@endsection
