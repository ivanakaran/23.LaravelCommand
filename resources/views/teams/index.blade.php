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
                            {{ __('Teams') }}
                        </div>
                        <div class="card-body custom-card-body">
                            <a href="{{ route('createTeam') }}" class="btn btn-primary float-right my-3">Add new team</a>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Year Founded</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->year_founded }}</td>
                                            <td>
                                                <a href="{{ route('editTeam', $team->id) }}" class='btn btn-link'>Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('deleteTeam', $team->id) }}" method="post">
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
