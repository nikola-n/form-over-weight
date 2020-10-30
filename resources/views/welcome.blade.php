@extends('layouts.app')

@section('header')
    @include('_includes.header',[
        'title'=> 'FORM OVER WEIGHT',
        'subtitle' => 'Train with the best coaches and stay strong & healthy',
        'join_community' => 'JOIN OUR COMMUNITY',
        'schedule_program' => 'SCHEDULE PROGRAM'
        ])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-3 mt-3">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Programs</h5>
                        <p class="card-text">Checkout our workout programs</p>
                        <a href="#" class="btn btn-primary">Go to programs</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text">Learn some nutrition facts, about calories and healthy advices</p>
                        <a href="#" class="btn btn-primary">Go to Blogs</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Trainers</h5>
                        <p class="card-text">Checkout our Trainers</p>
                        <a href="#" class="btn btn-primary">Go to Trainers</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gyms</h5>
                        <p class="card-text">We are all over the country.</p>
                        <a href="#" class="btn btn-primary">Go to gyms</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cities</h5>
                        <p class="card-text">We may be located in your city. Check it out.</p>
                        <a href="{{ route('cities.index') }}" class="btn btn-primary">Go to Cities</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Become a member</h5>
                        <p class="card-text">Book on of our programs</p>
                        <a href="#" class="btn btn-primary">Go to Schedule Program</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
