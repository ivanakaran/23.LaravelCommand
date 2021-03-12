@extends('layouts.app')

@section('content')
    <div class="conatiner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="conatiner">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (Session::get('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
            </div>




            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Matches') }}
                        </div>
                        <div class="card-body custom-card-body">
                            <a href="{{ route('createGame') }}" class="btn btn-primary float-right my-3">Add new Match</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Team1</th>
                                        <th>Team2</th>
                                        <th>Result</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($games as $game)
                                        <tr>
                                            <td>{{ $game->team1->name }}</td>
                                            <td>{{ $game->team2->name }}</td>
                                            @if ($game->is_finished == 1)
                                                <td>{{ $game->result }}</td>
                                            @else
                                                <td>/</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('editGame', $game->id) }}" class='btn btn-link'>Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('deleteGame', $game->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class='btn btn-link'>Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
