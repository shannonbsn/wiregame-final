<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['username', 'password'];

    public static function checkPassword($username, $password)
    {
        $player = self::where('username', $username)->first();
        return $player && $player->password === $password;
    }

}
