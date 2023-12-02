<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'id',
        'id_admin',
        'name',
        'desc',
        'image_path',
        'number_available',
        'number_sale',
        'favorite',
        'food_type',
        'price_food',
        'discount'
    ];

    public function Admin()
    {
        return $this->HasOne(Admin::class);
    }

    public function MenuOrder()
    {
        return $this->belongsTo(MenuOrder::class,'id_menu','id');
    }
}
