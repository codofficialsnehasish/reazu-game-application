<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'about_content',
        'our_story',
        'founders',
    ];

    protected $casts = [
        'founders' => 'array',
        'last_updated_at' => 'datetime',
    ];

    public static function getContent()
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'about_content' => '<p>Default about us content...</p>',
                'our_story' => '<p>Default our story content...</p>',
                'founders' => json_encode([])
            ]
        );
    }
}
