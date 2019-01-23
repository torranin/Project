<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendDevice extends Model
{
    protected $fillable = array(
        'dataDeviceId',
        'detail',
        'sendDate',
        'receiveDate'
    );
}
