@extends('layouts.app')

@section('content')

    <div class="container-fluid p-5">
        <div class="row">
            <form action="{{ route('cities.store') }}" method="POST" class="col-md-6 offset-3">
                @csrf
                <h5 class="text-center text-uppercase">create new city</h5>
                <div class="form-group">
                    <label for="city">Enter City</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter City">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    @include('_includes.errors')

@endsection
