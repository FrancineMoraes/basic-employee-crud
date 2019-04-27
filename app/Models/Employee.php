<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nam', 'email', 'phone'];

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }
}
