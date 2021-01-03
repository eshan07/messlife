<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bazaar_Schedules extends Model
{
    protected $fillable = ['mess_id','dates','user_id','manager_id'];

    protected $table = 'bazaar_schedule';

    public function user(){

    	return $this->belongsTo(Users::class);
    }



    
}
