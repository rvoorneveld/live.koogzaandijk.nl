<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * @var string
     */
    protected $table = 'scores';

    /**
     * @var string
     */
    protected $primaryKey = 'scoresId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matchId',
        'playerId',
        'scoreTypeId',
        'scoreHome',
        'scoreAway',
    ];

}
