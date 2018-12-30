<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{

    protected $guarded = [];

    public function path(): string
    {
        return "/team/{$this->id}";
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

}
