<?php

namespace App\Http\Controllers;

use App\Encounter;
use App\Player;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('name')->get();
        $encounter = Encounter::where('casting', 1)->first();
        return view('screen', compact('players', 'encounter'));
    }

    public function players()
    {
        $players = Player::orderBy('name')->get();
        return [
            'html' => view('screen.players', compact('players'))->render()
        ];
    }

    public function encounter()
    {
        $encounter = Encounter::where('casting', 1)->first();
        return [
            'html' => view('screen.encounter', compact('encounter'))->render()
        ];
    }
}
