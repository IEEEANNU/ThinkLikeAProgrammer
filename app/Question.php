<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    public function level() {
        return $this->belongsTo('App\Level');
    }
    
    public function submissions() {
        return $this->hasMany('App\Submission');
    }
}
