<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //protected $table = 'clients';
    public function data_contact()
    {
      return $this->belongsTo(data_contact::class);
    }
}
