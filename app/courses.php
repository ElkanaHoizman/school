<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    
    // Table Name
    protected $table = 'courses';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamps =true;


     public function Studeents(){
        return $this->belongsToMany('App\Studeents', 'courses_students', 'corses_id', 'students_id');
 }

    
//     public function user(){
//         return $this->balongsTO('App\user');
//  }
}