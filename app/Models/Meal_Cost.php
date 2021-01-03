<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal_Cost extends Model
{
    protected $fillable = ['user_id','mess_id','total_meal','meal_cost','meal_balance','meal_due'];

    protected $table = 'meal_cost';


            public function user(){


    	return $this->belongsTo(Users::class,'user_id','id');
}
}