<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    public function summaries()
    {
        return $this->hasMany('\App\Models\Summary', 'task_id', 'id');
    }
}
