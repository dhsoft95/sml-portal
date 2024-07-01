<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class UserLocationsChart extends Component
{
    public $userLocations = [
        ['Country', 'Code', 'Latitude', 'Longitude', 'Users'], // Modified header row
        ['Kenya', 'KE', -1.286389, 36.817223, 100], // Include country code
        ['Tanzania', 'TZ', -6.792354, 39.208328, 150], // Include country code
        ['Uganda', 'UG', 0.347596, 32.582520, 75], // Include country code
        ['Rwanda', 'RW', -1.953592, 30.060572, 50], // Include country code
    ];


    public function render()
    {
        return view('livewire.charts.user-locations-chart');
    }
    public function updatedUserLocations()
    {
        $this->dispatchBrowserEvent('userLocationsUpdated');
    }
}
