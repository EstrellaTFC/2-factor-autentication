<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name', 'acc_no', 'email', 'phone', 'bvn', 'dob', 'type', 'chk'];
}
