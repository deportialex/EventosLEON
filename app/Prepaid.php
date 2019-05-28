<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prepaid extends Model
{
    public function event()
    {
      return $this->belongsTo(Event::class);
    }

    protected $fillable = ['event_id', 'date', 'total', 'status'];
}
