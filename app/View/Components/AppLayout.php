<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }

    private function registerLucideIcons()
    {
        $icons = ['Bird']; // Add more icon names as needed

        foreach ($icons as $icon) {
            Blade::component("lucide-{$icon}", "App\\View\\Components\\Lucide{$icon}");
        }
    }
}
