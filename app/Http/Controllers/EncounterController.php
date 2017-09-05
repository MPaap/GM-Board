<?php

namespace App\Http\Controllers;

use App\Encounter;
use App\Events\EncounterUpdated;
use Illuminate\Http\Request;

class EncounterController extends Controller
{
    public function index()
    {
        $encounters = Encounter::with('characters')->orderBy('id', 'desc')->get();
        return view('encounter.index', compact('encounters'));
    }

    public function create(Encounter $encounter)
    {
        return view('encounter.create', compact('encounter'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($request->casting == 1) {
            Encounter::where('id', '>', 0)->update(['casting' => 0]);
        }

        $encounter = Encounter::create($request->only('name', 'casting'));

        for ($x = 0; $x <= count($request->input('character.name')); $x ++) {
            $name = $request->input("character.name.$x");
            $initiative = $request->input("character.initiative.$x");
            if ($name && $initiative) {
                $encounter->characters()->create([
                    'name' => $name,
                    'initiative' => $initiative
                ]);
            }
        }

        if ($request->casting == 1) {
            event(new EncounterUpdated($encounter));
        }

        return redirect(route('encounter.index'));
    }

    public function show(Encounter $encounter)
    {
        return view('encounter.show', compact('encounter'));
    }

    public function edit(Encounter $encounter)
    {
        return view('encounter.edit', compact('encounter'));
    }

    public function update(Request $request, Encounter $encounter)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        if ($encounter->casting != 1 && $request->casting == 1) {
            Encounter::where('id', '>', 0)->update(['casting' => 0]);
        }

        $encounter->update($request->only('name', 'casting'));

        $encounter->characters()->delete();

        for ($x = 0; $x <= count($request->input('character.name')); $x ++) {
            $name = $request->input("character.name.$x");
            $initiative = $request->input("character.initiative.$x");
            if ($name && $initiative) {
                $encounter->characters()->create([
                    'name' => $name,
                    'initiative' => $initiative
                ]);
            }
        }

        if ($request->casting == 1) {
            event(new EncounterUpdated($encounter));
        }

        return redirect(route('encounter.index'));
    }

    public function destroy(Encounter $encounter)
    {

    }

    public function nextCharacter(Encounter $encounter)
    {
        $character = null;
        if ($encounter->character_id > 0) {
            $next = false;
            foreach ($encounter->characters as $c) {
                if ($next) {
                    $character = $c;
                    break;
                }
                if ($c->id == $encounter->character_id) {
                    $next = true;
                }
            }
        }

        if (!$character) {
            $character = $encounter->characters()->first();
        }

        if ($character) {
            event(new EncounterUpdated($encounter));
            $encounter->update([
                'character_id' => $character->id
            ]);
        }
    }
}
