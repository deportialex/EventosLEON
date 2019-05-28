<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryEvent extends Model
{
    protected $fillable = ['client_id', 'user', 'total', 'additional_hour', 'additional_people', 'date_start', 'date_end', 'discount', 'status', 'people'];
}
