@extends('layouts.app')

@section('content')

    <div class="text-center">
        @include('flash::message')
    </div>

    <div class="container-fluid m-0 pl-3 pr-3">
        <div class="row">
            <div class="col-md-12 w-100 p-0">
                <table class="table-striped w-75 col-md-8 offset-2 mt-5 mb-5">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Your Trainer</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th colspan="3" class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($program_members as $programsmember)
                        <tr>
                            <td>{{ $programsmember->program->name }}</td>
                            <td>{{ $programsmember->start_date }}</td>
                            <td>{{ $programsmember->end_date }}</td>
                            <td>{{ $programsmember->trainer->name }}</td>
                            <td>{{ $programsmember->created_at }}</td>
                            <td>{{ $programsmember->updated_at }}</td>
                            <td><a class="btn btn-dark" href="{{ route('programsmembers.edit', $programsmember) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('programsmembers.destroy', $programsmember) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                            <td><a class="btn btn-success" href="{{ route('programs.index') }}">Apply</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="h5">No programs added yet.</div>
                            </td>
                            <td>
                                <a class="btn btn-success float-right" href="{{ route('programs.index') }}">Apply</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $program_members->links() }}
    </div>

@endsection
