@extends('layouts.app');

@section('content')

    <div class="container">
        <div class="conatiner">
            <div class="row justify-content-center">
                @if (Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
        </div>
        @if ($errors->any())
            <div class="row justify-content-center">
                <div class="alert alert-danger col-md-6" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Player') }}</div>
                    <div class="card-body custom-card-body">
                        <form action="{{ route('storePlayer') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    placeholder="mm/dd/yy">
                            </div>

                            <div class="form-group">
                                <label for="team">Team</label>
                                <select class="custom-select" id="team" name="team_id">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
