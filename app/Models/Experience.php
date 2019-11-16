<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['description', 'started', 'finished'];

    public function employees() {
        return $this->belongsToMany('App\Models\Employee', 'employees_has_experiences', 'experiences_id', 'employees_id');
    }
}
