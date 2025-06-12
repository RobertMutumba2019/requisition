<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class RequestForm extends Model
{
    //
    protected $table = 'request';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     * 
     * Adjust these to the columns you want to allow mass assignment on.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        // 'password', // if you plan to create/update with mass assignment
    ];

    /**
     * The attributes that should be hidden for arrays / JSON.
     * 
     * Typically, you hide passwords.
     */
    protected $hidden = [
        'password',
    ];
    public function setPasswordAttribute($value)
    {
        // Only hash if not already hashed (you may adjust logic as needed)
        if ($value && !\Illuminate\Support\Str::startsWith($value, '$2y$')) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    
}
