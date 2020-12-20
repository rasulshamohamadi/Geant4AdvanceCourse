<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable = ['nationalcode','first_name','last_name','father_name','birthplace','birthdate'];


    public function Admition()
    {
        return $this->hasMany('App\Admition');
    }

    public function PersonService()
    {
        return $this->hasMany('App\PersonService');
    }


   
}
