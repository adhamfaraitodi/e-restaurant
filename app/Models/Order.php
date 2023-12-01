<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_customer',
        'date',
        'order_status',
        'total_price',
        'payment_status',
        'table_number'
    ];

    protected $attributes = [
        'payment_status' => 'unpaid'
    ];

    public function MenuOrder(){
        return $this->hasMany(MenuOrder::class,'id_order','id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'id_customer');
    }
}
