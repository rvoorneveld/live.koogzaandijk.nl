<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{

    public function getTeam(int $id)
    {
        return DB::table('teams')
            ->where('id', $id)->first();
    }

}
