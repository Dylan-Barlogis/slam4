<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //
    public function convocation()
    {
    	return $this->hasMany('App\Convocation');
    }
    public function users()
    {
    	return $this->hasOne('App\User');
    }
}
