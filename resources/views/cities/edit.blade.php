@extends('layouts.app')

@section('content')

    <div class="container-fluid p-5">
        <div class="row">
            <form action="{{ route('cities.update', $city) }}" method="POST" class="col-md-6 offset-3">
                @method('PATCH')
                @csrf
                <h5 class="text-center text-uppercase">Update city name</h5>
                <div class="form-group">
                    <label for="city">Enter City</label>
                    <input type="text" class="form-control" value="{{ $city->name }}" name="name" placeholder="Enter City">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    @include('_includes.errors')

@endsection
