@extends('layouts.app')

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase text-center" style="padding-top: 5%">Book a Program</h1>
                <form action="{{ route('programsmembers.store') }}" method="POST" class="col-md-6 offset-3">
                    @csrf
                    <div class="form-group">
                        <label class="w-100" for="start_date">Enter start date of your program
                            <input type="date" class="form-control" name="start_date" placeholder="Enter Start Date">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="w-100" for="end_date"> Enter end date of your program
                            <input type="date" class="form-control" name="end_date" placeholder="Enter End Date">
                        </label>
                    </div>
                    <div class="form-group">
                        <select name="trainer_id" class="form-control">
                            <option value="0">Pick a trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="program_id" value="{{ request('program_id') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('_includes.errors')

@endsection
