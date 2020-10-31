@extends('layouts.app')

@section('content')

    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-uppercase text-center" style="padding-top: 5%">Create a Program</h1>
                <form action="{{ route('programs.store') }}" method="POST" class="col-md-8 offset-2">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter program name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Enter program description" class="w-100 form-control"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('_includes.errors')


@endsection
