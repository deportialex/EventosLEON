<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_contact extends Model
{
    protected $fillable = ['name','lastname','phone1', 'phone2', 'email'];
}
