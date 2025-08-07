<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalContent extends Model
{
    protected $fillable = [
        'terms_condition',
        'privacy_policy'
    ];

    protected $casts = [
        'last_updated_at' => 'datetime',
    ];

    public static function getContent()
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'terms_condition' => '<p>Default Terms & Conditions content...</p>',
                'privacy_policy' => '<p>Default Privacy Policy content...</p>'
            ]
        );
    }
}
