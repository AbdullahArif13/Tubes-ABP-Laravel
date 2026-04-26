<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    // Berdasarkan pembayaran_model.js
    protected $fillable = [
        'animalName',
        'animalBreed',
        'animalImage',
        'price',
        'paymentMethod', // qris, mandiri, gopay, dana
        'userName',
        'userAvatar',
        'timeInText',
    ];
}