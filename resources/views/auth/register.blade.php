@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-6">
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required autocomplete>
                                        <option value="0">Select</option>
                                        <option value="1">Trainer</option>
                                        <option value="2">Member</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="member-select d-none">
                                <div class="form-group row">
                                    <label for="member-gyms" class="col-md-4 col-form-label text-md-right">{{ __('Gym') }}</label>
                                    <div class="col-md-6">
                                        <select name="member-gyms" class="form-control @error('member-gyms') is-invalid @enderror">
                                            @foreach($gyms as $gym)
                                                <option value="{{ $gym->id }}">{{ $gym->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('member-gyms')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="trainer-select d-none">
                                <div class="form-group row">
                                    <label for="gyms" class="col-md-4 col-form-label text-md-right">{{ __('Gym') }}</label>
                                    <div class="col-md-6">
                                        <select name="gyms[]" multiple class="form-control @error('gyms') is-invalid @enderror">
                                            @foreach($gyms as $gym)
                                                <option value="{{ $gym->id }}">{{ $gym->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('gyms')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $(document).on('change', '#role', function () {
                toggleGymFields();
            });

            function toggleGymFields() {
                if ($('select#role').val() == 2) {
                    $('.member-select').removeClass('d-none');
                    $('.trainer-select').addClass('d-none');
                }
                if ($('select#role').val() == 1) {
                    $('.trainer-select').removeClass('d-none');
                    $('.member-select').addClass('d-none');
                }
                if ($('select#role').val() == 0) {
                    $('.trainer-select').addClass('d-none');
                    $('.member-select').addClass('d-none');
                }
            }
        });
    </script>
@endpush
