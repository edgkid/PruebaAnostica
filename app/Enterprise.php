<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{

    protected $fillable = ['name', 'rif', 'telefono','email, direccion'];

    public function people()
    {
        return $this->hasMany('App\Person');
    }
}
