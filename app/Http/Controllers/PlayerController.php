<?php

namespace App\Http\Controllers;

use App\Events\PlayerUpdated;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('name')->get();
        return view('player.index', compact('players'));
    }

    public function create(Player $player)
    {
        return view('player.create', compact('player'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'real_name' => 'required'
        ]);

        $player = Player::create($request->only('name', 'real_name', 'hit_points', 'max_hit_points', 'defence'));

        event(new PlayerUpdated($player));

        return redirect(route('player.index'));
    }

    public function show(Player $player)
    {
        return view('player.show', compact('player'));
    }

    public function edit(Player $player)
    {
        return view('player.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $this->validate($request, [
            'name' => 'required',
            'real_name' => 'required'
        ]);

        $player->update($request->only('name', 'real_name', 'hit_points', 'max_hit_points', 'defence'));

        event(new PlayerUpdated($player));

        return redirect(route('player.index'));
    }

    public function destroy(Player $player)
    {
        $player->delete();
        event(new PlayerUpdated($player));

        return redirect(route('player.index'));
    }

    public function hitPoints(Request $request, Player $player)
    {
        $player->update($request->only('hit_points'));
        event(new PlayerUpdated($player));
    }
}
