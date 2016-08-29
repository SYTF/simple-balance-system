<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    //
    protected $table = 'rewardRecords';
    protected $fillable = ['item', 'amount', 'type', 'recordDate'];
}
