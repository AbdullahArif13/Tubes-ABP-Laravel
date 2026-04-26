<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormStatus extends Model
{
    // Berdasarkan form_model.js
    protected $fillable = [
        'animalName',
        'animalBreed',
        'animalImage',
        'pdf',
        'userName',
        'userAvatar',
        'timeInText',
    ];
}