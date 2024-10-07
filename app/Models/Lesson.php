<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $table = 'lessons';
    protected $fillable = [
        'path','name','description','admin_id','level_id','name_file'];

      public function level(){
      return $this->belongsTo(Level::class);}

      public function user(){
        return $this->belongsTo(User::class);}
    use HasFactory;
}
