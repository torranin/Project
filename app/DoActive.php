<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoActive extends Model
{
    protected $fillable = array(
        'groupID',
        'deviceId',
        'problemsDetail',
        'cause',
        'editing',
        'urgency',
        'status'
    );
}
