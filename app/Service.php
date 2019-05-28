<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function provider()
    {
      return $this->belongsTo(Provider::class);
    }

    protected $fillable = ['name','description','cost', 'provider_id'];
}
