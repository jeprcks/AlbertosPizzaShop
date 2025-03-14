<?php

namespace App\Infrastructure\Persistence\Eloquent\User;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'full_name',
        'email',
        'address',
        'contact_number',
        'sex',
        'age',
        'isAdmin',
        'api_token',
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];
}
