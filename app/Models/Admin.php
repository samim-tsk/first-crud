<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillalbe  = [
        'name',
        'email',
        'password',
        'image_path'
    ];

    public function getImage()
    {
        if($this->image_path) {
            return asset('storage/'.$this->image_path);
        }
        return asset('profile/person.png');
    }

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];
}
