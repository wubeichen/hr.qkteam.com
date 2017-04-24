<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $table = 'member';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }
}
