<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costs extends Model
{
        protected $fillable= ['user_id','meal_id','mess_id','net_cost','maid_cost','room_rent','others_cost','total_due','total_paid','total_cost'];
    protected $table = 'costs';



        public function mealcost(){

    	return $this->belongsTo(Meal_Cost::class,'user_id','id');
    }


    public function user(){

    	return $this->belongsTo(Users::class,'user_id','id');
    }
}
