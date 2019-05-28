<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function data_contact()
    {
      return $this->belongsTo(data_contact::class);
    }
}
