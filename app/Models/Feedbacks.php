<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
       protected $fillable = ['first_name','last_name','email','comment'];

    protected $table = 'feedback';
}
