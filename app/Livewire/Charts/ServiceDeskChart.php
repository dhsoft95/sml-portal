<?php

namespace App\Livewire\Charts;

use Livewire\Component;

class ServiceDeskChart extends Component
{
    public $reportReasons = [
        'Login Issues' => 150,
        'Payment Errors' => 100,
        'Account Setup' => 75,
        'Technical Glitches' => 50,
    ];

    public function render()
    {
        return view('livewire.charts.service-desk-chart');
    }
    public function updatedReportReasons()
    {
        $this->dispatchBrowserEvent('reportReasonsUpdated');
    }
}
