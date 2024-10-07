<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game3 extends Model
{
    use HasFactory;
    protected $table = 'games3';
    public $timestamps = false;
    protected $fillable = [
        'name','value1','value2','type'];

}
