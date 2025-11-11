<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Advertisement extends Model
{
    protected $fillable = [
        'name',
        'position',
        'ad_code',
        'status'
    ];

    // Scope for active advertisements
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope for specific position
    public function scopePosition($query, $position)
    {
        return $query->where('position', $position);
    }

    // Check if advertisement is currently active
    public function isActive()
    {
        return $this->status === 'active';
    }

    // Get available positions
    public static function getPositions()
    {
        return [
            'homepage_banner' => 'Homepage Banner',
            'sidebar_ad' => 'Sidebar Advertisement',
            'footer_ad' => 'Footer Advertisement',
            'header_ad' => 'Header Advertisement',
            'content_top' => 'Content Top',
            'content_bottom' => 'Content Bottom',
            'popup_ad' => 'Popup Advertisement'
        ];
    }
}
