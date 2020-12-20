<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonService extends Model
{
    //
    protected $fillable = [
        'person_id', 'user_id', 'enterdate', 'service_id', 'servicetype_id', 'number', 'price', 'totalprice', 'insuranprice', 'cominsuranprice', 'patientprice',
    ];
}
