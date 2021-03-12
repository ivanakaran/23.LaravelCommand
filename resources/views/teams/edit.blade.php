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
                    <div class="card-header">{{ __('Edit Team') }}</div>
                    <div class="card-body custom-card-body">
                        <form action="{{ route('updateTeam', $team->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Team</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="year_founded">Year Founded</label>
                                <input type="text" class="form-control" id="year_founded" name="year_founded"
                                    value="{{ old('year_founded') }}">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
