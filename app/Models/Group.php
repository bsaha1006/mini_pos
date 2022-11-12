<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable=['title'];
    public $timestamps=['created_at','updated_at'];
       
    public static function dropDownList(){
        $arr=[];
        $groups=Self::all();
        foreach($groups as $group){
            $arr[$group->id]=$group->title;
        }
        return $arr;
    }
    
    public function users(){
        return $this->hasMany(User::class);
    }
}
