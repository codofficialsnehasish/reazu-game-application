<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactAction extends Model
{
    protected $fillable = [
        'title',
        'icon_image',
        'link',
        'type',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Accessor for icon image URL
    public function getIconImageUrlAttribute()
    {
        return $this->icon_image ? asset('storage/'.$this->icon_image) : null;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
