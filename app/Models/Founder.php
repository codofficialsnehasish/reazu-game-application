<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    protected $fillable = [
        'name',
        'image',
        'contact_number',
        'email',
        'order',
    ];
}
