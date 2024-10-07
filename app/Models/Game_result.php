<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_result extends Model
{
    use HasFactory;
    protected $table = 'game_result';
    protected $fillable = [
    'first_game','second_game','third_game','fourth_game','level_id','student_id'];
    public function student(){
        return $this->belongsTo(Student::class);}

     public function level(){
      return $this->belongsTo(Level::class);}

}
