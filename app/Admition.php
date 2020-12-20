<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admition extends Model
{
    //
    protected $fillable = ['enterdate', 'user_id', 'reseaon_id', 'section_id', 'insurance_id', 'cominsurance_id', 'exitdate', 'dischargedate' ];
    protected $with = ['user','reseaon','section','insurance','cominsurance'];
    

    public function Person()
    {
        return $this->belongsTo('App\Person');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function reseaon()
    {
        return  $this->belongsTo('App\Reseaon');
    }    

    public function section()
    {
        return  $this->belongsTo('App\Section');
    }  

    public function insurance()
    {
        return  $this->belongsTo('App\Insurance');
    } 
    public function cominsurance()
    {
        return  $this->belongsTo('App\Cominsurance');
    } 
    
    


}
