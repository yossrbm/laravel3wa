<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'photo',
    ];

    protected $table = 'classroom';
    

    public function students()

    {
        return $this->hasMany('App\Student', 'classroom_id', 'id');
    }



}
