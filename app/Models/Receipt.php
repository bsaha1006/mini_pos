<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable=['date','amount','admin_id','user_id','note'];

    public $timestamps=['created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
