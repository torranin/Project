<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    protected $fillable = array(
        'groupID',
        'deviceID',
        'nameTitle',
        'detailData',
        'codeId',
        'status',
        'created_at'
    );
}
