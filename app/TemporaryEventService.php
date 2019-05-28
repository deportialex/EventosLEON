<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryEventService extends Model
{
    protected $fillable = ['service_id', 'event_id'];
}
