<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'username',
        'password'
    ];

    protected $attributes = [
        'phone_number' => '08123',
        'email' => 'nouser@mail.com',
        'username' => 'default_username',
        'password' => 'default_password',
    ];

    public function Order()
    {
        return $this->hasOne(Order::class,'id_customer','id');
    }
}
