<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    public function getStatusAttribute() {
        $current = time();
        $start = strtotime($this->attributes['start'] . ' 00:00:00');
        $end = strtotime($this->attributes['end'] . ' 23:59:59');
        if ($current < $start) {
            return -1;
        } elseif ($current > $end) {
            return 1;
        } else {
            return 0;
        }
    }

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    public function summaries()
    {
        return $this->hasMany('\App\Models\Summary', 'task_id', 'id');
    }
}
