<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{

    protected $guarded = [];

    public function path()
    {
        return "/club/{$this->id}";
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

}
