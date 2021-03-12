@extends('layouts.app');

@section('content')

    <div class="container">
        <div class="conatiner">
            <div class="row justify-content-center">
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
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
                    <div class="card-header">{{ __('Edit Player') }}</div>
                    <div class="card-body custom-card-body">
                        <form action="{{ route('updatePlayer', $player->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ old('first_name') }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ old('last_name') }}">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}">
                            </div>

                            <div class="form-group">
                                <label for="team">Team</label>
                                <select class="custom-select" id="team" name="team_id">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}" @if ($team->id == $player->team_id) {{ 'selected' }} @endif>{{ $team->name }}</option>
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
