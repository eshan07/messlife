<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bazaars extends Model
{
    protected $fillable= ['bazaar_date','schedule_id'];
    protected $table = 'schedule_details';



        public function schedule(){

    	return $this->belongsTo(Bazaar_Schedules::class);
    }

}
