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
                            {{ __('Players') }}
                        </div>
                        <div class="card-body custom-card-body">
                            <a href="{{ route('createPlayer') }}" class="btn btn-primary float-right my-3">Add new
                                player</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Team</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($players as $player)
                                        <tr>
                                            <td>{{ $player->first_name }} {{ $player->last_name }}</td>
                                            <td>{{ $player->date_of_birth }}</td>
                                            <td>{{ $player->team->name }}</td>
                                            <td>
                                                <a href="{{ route('editPlayer', $player->id) }}"
                                                    class='btn btn-link'>Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('deletePlayer', $player->id) }}" method="post">
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
