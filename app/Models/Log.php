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

    public function init($member, $action, $description = '')
    {
        $this->operator()->associate(\Auth::user());
        $this->member()->associate($member);
        $this->action = $action;
        $this->description = $description;
    }

    public function getOperatedAtAttribute()
    {
        if ($this->attributes['operated_at']) {
            return $this->attributes['operated_at'];
        } else {
            return $this->attributes['created_at'];
        }
    }

    public function operator()
    {
        return $this->belongsTo('\App\Models\Member', 'operator_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo('\App\Models\Member', 'member_id', 'id');
    }
}
