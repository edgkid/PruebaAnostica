<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $fillable = ['name', 'lastName', 'rif', 'telefono','email','password', 'enterprise_id',];

    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise');
    }

}
