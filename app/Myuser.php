<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myuser extends Model
{
    protected $primayKey = 'myuser_id';
    protected $fillable = [
        'myuser_fname',
        'myuser_lname',
        'myuser_username',
        'myuser_password'
    ];
    
    public function userroles(){
        return $this->hasMany('UserRole::class','role_id');
    }
}
