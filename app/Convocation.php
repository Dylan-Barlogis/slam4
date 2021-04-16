<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    //
	public function eleve()
	{
		return $this->belongsTo('App\Eleve');
	}

	public function motifs()
	{
		return $this->belongsToMany('App\Motif');
	}
}
