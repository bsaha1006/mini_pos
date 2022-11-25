<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable=['name','admin_id','group_id','email','phone','address'];
    public $timestamps=['created_at','updated_at'];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function sales(){
        return $this->hasMany(SaleInvoice::class);
    }

    public function purchases(){
        return $this->hasMany(PurchaseInvoice::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    
    public function receipts(){
        return $this->hasMany(Receipt::class);
    }
    
}
