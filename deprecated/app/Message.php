<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message_type_id', 'message_foreign_key', 'message_name', 'message_title', 'message_content', 'message_media', 'message_link', 'approved_at'
    ];

    protected $table = 'message';

    protected $primaryKey = 'message_id';

}
