<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['title'];
    public $timestamps=['created_at','updated_at'];

    public static function dropDownList(){
        $arr=[];
        $categories=Self::all();
        foreach($categories as $category){
            $arr[$category->id]=$category->title;
        }
        return $arr;
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
