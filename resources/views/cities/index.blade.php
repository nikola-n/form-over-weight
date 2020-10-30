@extends('layouts.app')

@section('header')
    @include('_includes.header',
    ['title' => 'Cities',
    'subtitle' => 'Are we located in your city?'
    ])
@endsection

@section('content')

    @include('flash::message')

    <div class="container-fluid m-0 pl-3 pr-3">
        <div class="row">
            <div class="col-md-12 w-100 p-0">
                <table class="table-striped w-75 col-md-8 offset-2 mt-5 mb-5">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->created_at }}</td>
                            <td>{{ $city->updated_at }}</td>
                            <td><a class="btn btn-dark" href="{{ route('cities.edit', $city) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('cities.destroy', $city) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td><a class="btn btn-success" href="{{ route('cities.create') }}">Create</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $cities->links() }}
    </div>

@endsection
