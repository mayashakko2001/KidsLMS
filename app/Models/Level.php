<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    public $timestamps = false;
    protected $fillable = [
    'main_level_id','is_quiz'];
     public function quiz_result(){
        return $this ->hasMany(Quiz_result::class);
    }
     public function main_level(){
        return $this->belongsTo(Main_level::class);
    }

    public function archeivement(){
        return $this ->hasMany(Archeivement::class);
    }
    public function game_result(){
        return $this ->hasMany(Game_result::class);
    }
    public function lesson(){
        return $this ->hasOne(Lesson::class);
    }

    use HasFactory;
}
