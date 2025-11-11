<?php

namespace App\Services;

use App\Models\Advertisement;
use Illuminate\Support\Collection;

class AdvertisementService
{
    /**
     * Get active advertisements for a specific position
     */
    public function getActiveAdvertisements(string $position): Collection
    {
        return Advertisement::active()
            ->position($position)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get a single active advertisement for a position
     */
    public function getActiveAdvertisement(string $position): ?Advertisement
    {
        return Advertisement::active()
            ->position($position)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * Get all active advertisements grouped by position
     */
    public function getAllActiveAdvertisements(): Collection
    {
        return Advertisement::active()
            ->orderBy('position')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('position');
    }

    /**
     * Check if there are active advertisements for a position
     */
    public function hasActiveAdvertisements(string $position): bool
    {
        return Advertisement::active()
            ->position($position)
            ->exists();
    }

    /**
     * Get advertisement statistics
     */
    public function getStatistics(): array
    {
        $total = Advertisement::count();
        $active = Advertisement::where('status', 'active')->count();
        $inactive = Advertisement::where('status', 'inactive')->count();
        $currentlyActive = Advertisement::active()->count();

        return [
            'total' => $total,
            'active' => $active,
            'inactive' => $inactive,
            'currently_active' => $currentlyActive,
            'positions' => Advertisement::getPositions()
        ];
    }

    /**
     * Render advertisement HTML for a specific position
     */
    public function renderAdvertisement(string $position, array $attributes = []): string
    {
        $advertisement = $this->getActiveAdvertisement($position);
        
        if (!$advertisement) {
            return '';
        }

        $defaultAttributes = [
            'class' => 'advertisement-' . $position,
            'data-position' => $position,
            'data-ad-id' => $advertisement->id
        ];

        $attributes = array_merge($defaultAttributes, $attributes);
        $attributeString = $this->buildAttributeString($attributes);

        // Return the ad code wrapped in a div with attributes
        return "<div {$attributeString}>" . $advertisement->ad_code . "</div>";
    }

    /**
     * Build HTML attribute string from array
     */
    private function buildAttributeString(array $attributes): string
    {
        $attributePairs = [];
        
        foreach ($attributes as $key => $value) {
            $attributePairs[] = $key . '="' . htmlspecialchars($value) . '"';
        }
        
        return implode(' ', $attributePairs);
    }
}
