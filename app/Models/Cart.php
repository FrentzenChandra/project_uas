<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'user_id',
        'qty'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
