<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MenuOrder extends Model
{
    use HasFactory;
    protected $table = 'menu_order';
    protected $fillable = [
        'id_menu',
        'id_order',
        'quantity',
        'price_food',
        'discount',
        'subtotal',
        'menu_note'
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class,'id_order');
    }

    public function Menu()
    {
        return $this->hasOne(Menu::class,'id_menu');
    }
}
