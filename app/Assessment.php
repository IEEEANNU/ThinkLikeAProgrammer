<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['grade'];
    
    public function submission() {
        return $this->belongsTo('App\Submission');
    }
    
    public function grader() {
        return $this->belongsTo('App\User', 'grader_id');
    }
    
    /**
    * Calculates final grade by multiplying the percentage by the question grade
    * and accounting for the hint penalty.
    * 
    */
    public function updateFinalGrade(){
        // Calculate grade without penalty
        // TODO improve performance somehow...
        $grade = ($this->grade * $this->submission->question->level->mark);
        
        // Checks if there's a penalty
        if (!empty($this->submission->hint_used)) {
            $grade = $grade * (1.0 - $this->submission->question->hint_penalty);
        }
        
        $this->final_grade = $grade;
        return $this->save();
    }
    
}
