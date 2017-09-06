<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'real_name', 'hit_points', 'max_hit_points', 'defence'];

    public function getBgColor()
    {
        if (($this->hit_points/$this->max_hit_points) < 0.26) {
            return 'bg-danger';
        }
        if (($this->hit_points/$this->max_hit_points) < 0.51) {
            return 'bg-warning';
        }
        return 'bg-success';
    }
}
