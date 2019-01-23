<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoveDevice extends Model
{
    protected $fillable = array(
        'dataDeviceId',
        'groupIdOld',
        'groupIdNew',
        'date'
    );
}
