@extends('layouts.app')

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>

    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase text-center" style="padding-top: 5%">Book a Program</h1>
                <form action="{{ route('programsmembers.update', $programsmember) }}" method="POST" class="col-md-6 offset-3">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="start_date">Enter start date of your program
                            <input type="date" class="form-control" name="start_date" value="{{ Carbon\Carbon::parse($programsmember->start_date)->format('Y-m-d') }}">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Enter End date of your program
                            <input type="date" class="form-control" name="end_date" value="{{ Carbon\Carbon::parse($programsmember->end_date)->format('Y-m-d') }}">
                        </label>
                    </div>
                    <div class="form-group">
                        <select name="trainer_id" class="form-control">
                            <option value="0">Choose Trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('_includes.errors')

@endsection
