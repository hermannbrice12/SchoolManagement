<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;

    //count teacher and class already in database or not

    static function countAlready($user_id,$class_id){

        return self::select('teacher_classes.*')->where('user_id','=',$user_id)->where('classe_id','=',$class_id)->first();
    }

}
