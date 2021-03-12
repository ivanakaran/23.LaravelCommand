<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('date')->get();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGameRequest $request)
    {
        $game = new Game();
        $game->team1_id = $request->team1_id;
        $game->team2_id = $request->team2_id;
        $game->date = $request->date;
        $game->is_finished = $request->is_finished;
        $save = $game->save();

        if ($game->is_finished == 1) {
            $team1Players = $game->team1->players->all();
            foreach ($team1Players as $player) {
                $game->players()->attach($player->id);
            }

            $team2Players = $game->team2->players->all();
            foreach ($team2Players as $player) {
                $game->players()->attach($player->id);
            }
        }

        if ($save) {
            return redirect()->route('games')->with('success', 'The game was successfully added!');
        } else {
            return back()->with('error', 'Something went wrong, please try again.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Team::all();
        $game = Game::find($id);

        return view('games.edit', compact('game', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(CreateGameRequest $request, $id)
    {
        $game = Game::find($id);
        $game->team1_id = $request->team1_id;
        $game->team2_id = $request->team2_id;
        $game->date = $request->date;
        $game->is_finished = $request->is_finished;
        $save = $game->save();

        $team1Players = $game->team1->players->all();
        foreach ($team1Players as $player) {
            $game->players()->attach($player->id);
        }

        $team2Players = $game->team2->players->all();
        foreach ($team2Players as $player) {
            $game->players()->attach($player->id);
        }
        if ($save) {
            return redirect()->route('games')->with('status', 'The game was successfully updated!');
        } else {
            return back()->with('fail', 'Something went wrong, please try again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();

        return redirect()->route('games');
    }
}