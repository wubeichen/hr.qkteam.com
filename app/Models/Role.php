<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }
}
