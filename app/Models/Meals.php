<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
        protected $fillable = ['date','user_id','mess_id','break_fast','lunch','dinner','perday_meal','user_name'];


            public function user(){


    	return $this->belongsTo(Users::class,'user_id','id');
    }

}
