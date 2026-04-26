<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    // Properti yang bisa diisi (Fillable) berdasarkan animal_model.js
    protected $fillable = [
        'animalName',
        'animalBreed',
        'animalImage',
        'price',
        'status',
        'timeInText',
    ];

    /**
     * Helper untuk format harga ke Rupiah langsung di model
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}