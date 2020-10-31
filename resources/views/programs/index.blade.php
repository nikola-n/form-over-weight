@extends('layouts.app')

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pb-5">
                <h1 class="text-uppercase p-5 text-center">List of all programs</h1>
                @can('create', App\Program::class)
                    <div class="text-center">
                        <span>Are you an experienced trainer?</span>
                        <a href="{{ route('programs.create') }}">Create your program then!</a>
                    </div>
                @endcan
            </div>
            @foreach($programs as $program)
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">

                            <div class="col-md-4">
                                <img src="{{ asset('images/istockphoto-1069959276-612x612.jpg') }}" class="card-img" alt="gym">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $program->name }}</h5>
                                    <p class="card-text">{{ str_limit($program->description, 50) }}</p>
                                    <p class="card-text">
                                        <small class="text-muted"> {{ $program->created_at->diffForHumans() }}</small>
                                    </p>
                                    <p>
                                        <a class="btn btn-info text-white" href="{{ route('members.create', ['program_id' => $program->id]) }}">Apply</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
