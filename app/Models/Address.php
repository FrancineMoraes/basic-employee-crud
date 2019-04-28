<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['cep', 'street', 'number', 'district', 'city', 'state'];

    protected $table = 'addresses';

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
