<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'real_name', 'hit_points', 'max_hit_points', 'defence'];

    public function getBgColor()
    {
        if ($this->hit_points < 1) {
            return 'bg-dark';
        }
        if ($this->hit_points < 11) {
            return 'bg-danger';
        }
        if ($this->hit_points < 21) {
            return 'bg-warning';
        }
        return 'bg-success';
    }
}
