<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable=[

 
        'custId',
        'orderName',
        'orderPhone',
        'orderEmail',
        'orderAddress',
        'orderTotalPrice',
        'orderStatus',
        'paymentMethod',
        'trackingNo',


      
    ];
}


