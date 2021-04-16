<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    //
    public function convocation()
	{
		return $this->belongsToMany('App\Convocation');
	}
}
