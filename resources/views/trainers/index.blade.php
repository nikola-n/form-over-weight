@extends('layouts.app')

@section('header')
    @include('_includes.header',
    ['title' => 'Trainers',
    'subtitle' => 'Check out our best coaches',
    'join_community' => 'JOIN OUR COMMUNITY',
    'schedule_program' => 'SCHEDULE PROGRAM',
    ])
@endsection

@section('content')

    <div class="container-fluid m-0 pl-3 pr-3">
        <div class="row">
            <div class="col-md-12 w-100 p-0">
                <table class="table-striped w-75 col-md-8 offset-2 mt-5 mb-5">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($trainers as $trainer)
                        <tr>
                            <td>{{ $trainer->name }}</td>
                            <td>{{ $trainer->created_at }}</td>
                            <td>{{ $trainer->updated_at }}</td>
                        </tr>
                    @empty
                        <td colspan="3">
                            <div class="d-flex align-items-center flex-column p-5">
                                <div class="h5">No Trainers added yet.</div>
                            </div>
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $trainers->links() }}
    </div>

@endsection
