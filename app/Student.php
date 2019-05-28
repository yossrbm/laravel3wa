<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Student extends Authenticatable
{
    //
    use SoftDeletes;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'name','password','classroom_id',
    ];

    protected $table = 'student'; // on est obligé pour l'ecrire car on a pas mis la table a la fin s
    

    public function classroom()

    {        
    	return $this->hasOne('App\Classroom', 'id', 'classroom_id');    
	}

    public function getRememberToken()

    {
      return null; // not supported
    } 

    public function setRememberToken($value)

    {
      // not supported
    } 

    public function getRememberTokenName()

    {
      return null; // not supported
    }

}
