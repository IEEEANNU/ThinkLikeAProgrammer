<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['blocks', 'image', 'hint_used'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function assessments() {
        return $this->hasMany('App\Assessment');
    }
    
    public function question() {
        return $this->belongsTo('App\Question');
    }
    
    /**
    * Updates the submission's score depending on the latest assessment
    * 
    */
    public function updateScore() {
        $this->score = $this->assessments()->orderBy('created_at', 'desc')->first()->final_grade;
        return $this->save();
    }
}
