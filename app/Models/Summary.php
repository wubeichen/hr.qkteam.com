<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'summary';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }

    public function task()
    {
        return $this->belongsTo('\App\Models\Task', 'task_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo('\App\Models\Member', 'member_id', 'id');
    }

    // public function scopeMember($query, $member)
    // {
    //     return $query->where('member', $member);
    // }
}
