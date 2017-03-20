<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_sso extends Model
{
    protected $fillable = [
        'sso_id', 'user_id'
    ];
    protected $table = 'user_sso';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
