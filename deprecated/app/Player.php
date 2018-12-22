<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{

    public function getPlayers(string $teamId)
    {
        /**
         * @todo Make team role Id dynamic
         */
        return DB::table('team_member')
            ->where('team_id', $teamId)
            ->where('team_role_id', 1)
            ->orderBy('gender', 'desc')
            ->get();
    }

}
