<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{use SoftDeletes;
    protected $table = 'admins';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name','email','password','role_id'];
        public function role(){
            return $this->belongsTo('Role::class');

    }
    public function compliant(){
        return $this->hasMany('compliants::class');
    }

    use HasFactory;
}
