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
                    <div class="card-header">{{ __('Create New Match') }}</div>
                    <div class="card-body custom-card-body">
                        <form action="{{ route('storeGame') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="team1">Home Team</label>
                                <select class="" id="team1" name="team1_id">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="team2">Guest Team</label>
                                <select class="" id="team2" name="team2_id">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="mm/dd/yy">
                            </div>

                            <div class="form-group">
                                <label for="is_finished">Is Finished</label>
                                <select class="custom-select" id="is_finished" name="is_finished">
                                    <option value="0">Scheduled Game</option>
                                    <option value="1">Finished Game</option>
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
