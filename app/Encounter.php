<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $fillable = [
        'name', 'casting', 'character_id'
    ];

    public function characters()
    {
        return $this->hasMany(Character::class)->orderByDesc('initiative');
    }
}
