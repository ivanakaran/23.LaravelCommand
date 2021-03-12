<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlayerRequest $request)
    {
        $player = new Player();
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->date_of_birth = $request->date_of_birth;
        $player->team_id = $request->team_id;

        if ($player->save()) {
            return redirect()->route('players')->with('success', 'The player was successfully added!');
        } else {
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePlayerRequest $request, $id)
    {
        $player = Player::find($id);
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->date_of_birth = $request->date_of_birth;
        $player->team_id = $request->team_id;

        if ($player->save()) {
            return redirect()->route('players')->with('status', 'The player was successfully updated!');
        } else {
            return back()->with('fail', 'Something went wrong, please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();

        return redirect()->route('players');
    }
}