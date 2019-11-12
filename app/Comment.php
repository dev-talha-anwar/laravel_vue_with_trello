<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function admins(){
    	return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
