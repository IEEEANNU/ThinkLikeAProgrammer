<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function submissions() {
        return $this->hasMany('App\Submission');
    }
    
    /**
    * #return Assessments graded by this user
    * 
    */
    public function assessmentsGraded() {
        return $this->hasMany('App\Assessment', 'grader_id');
    }
    
    public function isSuperAdmin() {
        return $this->id == 1; // TODO this is no good
    }
    
    public function assessments() {
        return $this->hasManyThrough('\App\Assessment', '\App\Submission');
    }
    
    /**
    * Calculates and updates the total score of a user.
    * 
    */
    public function updateTotalScore() {
        $this->total_score = $this->submissions()
            ->groupBy('question_id')
            ->select(\DB::raw('sum(`score`) as level_score'))
            ->get()->sum('level_score');
        
        return $this->save();
    }
}
