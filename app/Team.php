<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users(){
    	return $this->belongsToMany('App\User')->using('App\UserTeam');
    }
    public function boards(){
    	return $this->belongsToMany('App\Board')->using('App\BoardTeam');
    }
}
