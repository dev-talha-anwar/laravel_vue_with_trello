<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public function getSocialLinksAttribute($value){
    	return json_decode($value);
    }
}
