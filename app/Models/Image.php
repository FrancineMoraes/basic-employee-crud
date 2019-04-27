<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
