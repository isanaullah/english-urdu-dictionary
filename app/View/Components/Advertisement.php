<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\AdvertisementService;

class Advertisement extends Component
{
    public string $position;
    public $advertisement;

    /**
     * Create a new component instance.
     */
    public function __construct(string $position)
    {
        $this->position = $position;
        
        $advertisementService = new AdvertisementService();
        $this->advertisement = $advertisementService->getActiveAdvertisement($position);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.advertisement');
    }

    /**
     * Determine if the component should be rendered.
     */
    public function shouldRender(): bool
    {
        return $this->advertisement !== null;
    }
}
