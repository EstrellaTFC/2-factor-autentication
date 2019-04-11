<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['acc_num', 'acc_name', 'amount', 'initiator', 'phone', 'type'];
}
