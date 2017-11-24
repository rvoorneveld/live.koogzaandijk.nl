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

	public function getThisWeeksMatches()
	{
		return DB::table('matches')
			->select('matches.*')
			->where('year', Carbon::now()->year)
			->where('week', Carbon::now()->weekOfYear)
			->orderBy('date', 'asc')
			->orderBy('time', 'asc')
			->get();
	}

}
