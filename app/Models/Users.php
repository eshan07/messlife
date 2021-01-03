<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    protected $fillable = ['name','email','password','mess_id','phone','role','image'];
    protected $table= 'users';

        public function mess(){

    	return $this->belongsTo(Mess::class);
    }


}
