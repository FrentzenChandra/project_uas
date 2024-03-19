<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'last_name',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'status',
        'tracking_number',
        'total_price',
        'snap_token'
    ];



    
}


