<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = array(
        'groupID',
        'problemsDetail',
        'cause',
        'date',
        'editing'
    );
}
