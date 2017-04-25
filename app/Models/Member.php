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

    public function role()
    {
        return $this->belongsTo('\App\Models\Role', 'role_id', 'id');
    }

    public function is(...$roles)
    {
        return $this->role && is_array($this->role->alias, $roles);
    }
}
