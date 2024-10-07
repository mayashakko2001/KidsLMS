<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_answer extends Model
{
    use HasFactory;
    protected $table = 'student_answers';
    protected $fillable = [
        'student_id','quiz_id','question_number','answer'];

    public function student(){
      return $this->belongsTo(Student::class);
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class);
}

}
