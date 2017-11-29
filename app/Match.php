<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Match extends Model
{
    /**
     * @var string
     */
    protected $table = 'matches';

    /**
     * @var string
     */
    protected $primaryKey = 'matches_id';

    public function getActiveMatches() {
        return DB::table('matches')
            ->where('date', Carbon::now()->toDateString())
            ->where('time', '>', Carbon::now()->subMinutes(5)->toTimeString())
            ->where('time', '<', Carbon::now()->addMinutes(60)->toTimeString())
            ->orderBy('time', 'desc')
            ->get();
    }

    public function getForThisWeek($excludeMatches = null)
    {
        $query = DB::table('matches')
            ->select('matches.*')
            ->where('year', Carbon::now()->year);

        if (null !== $excludeMatches && true === \is_array($matches = $excludeMatches->all()) && count($matches) > 0) {
            $query->whereRaw('matches_id NOT IN ('.implode(',', $matches).')');
        }

        $query->where('week', Carbon::now()->weekOfYear)
        ->orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->get();
    }

}
