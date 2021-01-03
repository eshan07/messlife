<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mess extends Model
{
    protected $fillable = ['mess_name'];
    protected $table = 'mess';
}
