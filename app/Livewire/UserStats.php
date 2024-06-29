<?php

namespace App\Livewire;

use App\Models\AppUser;
use Livewire\Component;

class UserStats extends Component
{
    public $userCount;
    public $verifiedCount;
    public $unverifiedCount;
    public $dailyActiveUsersCount;
    public $monthlyActiveUsersCount;
    public $yearlyActiveUsersCount;
    public $maleCount;
    public $femaleCount;
    public $otherCount;

    protected $listeners = ['refreshUserStats' => '$refresh'];

    public function mount()
    {
        $this->refreshStats();
    }

    public function refreshStats()
    {
        $this->userCount = AppUser::count();
        $this->verifiedCount = AppUser::where('status', 'verified')->count();
        $this->unverifiedCount = AppUser::where('status', 'unverified')->count();
        $this->dailyActiveUsersCount = AppUser::where('created_at', '>=', now()->subDay())->count();
        $this->monthlyActiveUsersCount = AppUser::where('created_at', '>=', now()->subMonth())->count();
        $this->yearlyActiveUsersCount = AppUser::where('created_at', '>=', now()->subYear())->count();
        $this->maleCount = AppUser::where('gender', 'male')->count();
        $this->femaleCount = AppUser::where('gender', 'female')->count();
        $this->otherCount = AppUser::where('gender', 'other')->count();
    }

    public function emitRefreshEvent()
    {
        $this->emit('refreshUserStats');
    }

    public function render()
    {
        return view('livewire.user-stats');
    }
}
