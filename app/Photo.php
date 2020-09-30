<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table = 'photoable';
    protected $fillable = [
        'filename'
    ];

    public function photoable()
    {
        return $this->morphTo('App\Photo');
    }
}
