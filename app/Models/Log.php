<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }
}
