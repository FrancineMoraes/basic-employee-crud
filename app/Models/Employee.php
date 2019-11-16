<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'area', 'bith_date'];

    public function address()
    {
        return $this->hasOne('App\Models\Address', 'employee_id');
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }

    public function experiences() {
        return $this->belongsToMany('App\Models\Experience', 'employees_has_experiences', 'employees_id', 'experiences_id');
    }
}
