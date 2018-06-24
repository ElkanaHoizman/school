<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studeents extends Model
{
     
    // Table Name
    protected $table = 'studeents';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps =true;

     public function courses(){
        return $this->belongsToMany('App\courses', 'courses_students', 'students_id','corses_id');
 }

//     public function user(){
//         return $this->balongsTO('App\user');
//  }
}
