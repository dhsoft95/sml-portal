<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadsChart extends Component
{


    public $downloads = [
        'iOS' => 50000,
        'Android' => 60006,
    ];

    public function render()
    {

        return view('livewire.downloads-chart');
    }

    // Add a method to handle updates to $downloads
    public function updatedDownloads()
    {
        $this->dispatchBrowserEvent('downloadsUpdated'); // Dispatch event to trigger chart update
    }
}
