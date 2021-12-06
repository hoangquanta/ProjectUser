<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, HasApiTokens;
    public $table = 'users';
    public $timestamps = false;
    
    public function admin(){
        return $this->belongsTo(User::class);
    }
    // public function parent()
    // {
    //     return $this->belongsTo('User', 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany('Post', 'parent_id');
    // }

}
