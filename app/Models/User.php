<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }
}
