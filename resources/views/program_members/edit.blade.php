@extends('layouts.app')

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase text-center" style="padding-top: 5%">Book a Program</h1>
                <form action="{{ route('members.update', $program_member) }}" method="POST" class="col-md-6 offset-3">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="date" class="form-control" name="start_date" value="{{ Carbon\Carbon::parse($program_member->start_date)->format('Y-m-d') }}" placeholder="Enter Start Date">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="end_date" value="{{ Carbon\Carbon::parse($program_member->end_date)->format('Y-m-d') }}" placeholder="Enter End Date">
                    </div>
                    <div class="form-group">
                        <select name="trainer_id" class="form-control">
                            <option value="0">Choose Trainer</option>
                            <option selected value="{{ $program_member->trainer->id }}">{{ $program_member->trainer->name }}</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="gym_id" class="form-control">
                            <option value="0">Choose Gym</option>
                            <option selected value="{{ $program_member->gym->id }}"> {{ $program_member->gym->name }}</option>
                            @foreach($gyms as $gym)
                                <option value="{{ $gym->id }}">{{ $gym->name }}</option>
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
