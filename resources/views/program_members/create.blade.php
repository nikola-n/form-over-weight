@extends('layouts.app')

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase text-center" style="padding-top: 5%">Book a Program</h1>
                <form action="{{ route('members.store') }}" method="POST" class="col-md-6 offset-3">
                    @csrf
                    <div class="d-flex pt-3">
                        <div class="form-check mr-4">
                            <input class="form-check-input" type="radio" name="is_member" value="1">
                            <label class="form-check-label">
                                Member
                            </label>
                        </div>
                        <div class="form-check pb-3">
                            <input class="form-check-input" type="radio" name="is_member" value="2">
                            <label class="form-check-label">
                                Trainer
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="start_date" placeholder="Enter Start Date">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="end_date" placeholder="Enter End Date">
                    </div>
                    <div class="form-group">
                        <select name="trainer_id" class="form-control">
                            <option value="0">Choose Trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="gym_id" class="form-control">
                            <option value="0">Choose Gym</option>
                            @foreach($gyms as $gym)
                                <option value="{{ $gym->id }}">{{ $gym->name }}</option>
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
