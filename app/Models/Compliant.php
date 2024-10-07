<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliant extends Model
{
    protected $table = 'compliants';
    protected $fillable = [
      'description','student_id'];
    public function student(){
        return $this->belongsTo(Student::class);}
    use HasFactory;
}
