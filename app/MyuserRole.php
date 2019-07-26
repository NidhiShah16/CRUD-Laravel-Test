<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyuserRole extends Model
{
    protected $primaryKey = 'user_role_id';
    protected $fillable = [
        'myuser_id',
        'role_id'
    ];

    public function myusers(){
        return $thi->belongsto('Myuser::class');
    }
}

