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
    
    public function observations() {
        return $this->hasMany('\App\QuestionObservation');
    }
    
    public function scopeActivated($q) {
        return $q->where('active', '=', true)
            ->whereExists(function ($query) {
                $query->select(\DB::raw(1))
                      ->from('levels')
                      ->whereRaw('levels.id = questions.level_id')
                      ->where('levels.active', '=', true);
            });
    }
}
