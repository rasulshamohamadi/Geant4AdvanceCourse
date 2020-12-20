<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //peoples
    protected $fillable = ['nationalcode','first_name','last_name','father_name','email','mobile','address','other'];

}
