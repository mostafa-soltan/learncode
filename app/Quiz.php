<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
