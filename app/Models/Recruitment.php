<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = 'recruitment';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }
}
