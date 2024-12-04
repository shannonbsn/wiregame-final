<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScannedWireframe extends Model
{
    protected $fillable = ['player_id', 'wireframe_id'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
