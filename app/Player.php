<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'real_name', 'hit_points'];

    public function getBgColor()
    {
        if ($this->hit_points < 1) {
            return 'bg-dark text-secondary';
        }
        if ($this->hit_points < 11) {
            return 'bg-danger text-light';
        }
        if ($this->hit_points < 21) {
            return 'bg-warning text-light';
        }
    }
}
