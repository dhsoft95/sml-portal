<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RecentTransactions extends Component
{
    public $transactions;
    public $status = 'all'; // default status
    protected $transactionLimit = 5;

    public function mount()
    {
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        $query = DB::table('tbl_transactions as tt')
            ->select([
                'tt.sender_amount',
                'tt.id as transaction_id',
                'tt.receiver_amount',
                DB::raw('DATE_FORMAT(tt.created_at, "%Y-%m-%d %H:%i:%s") as created_at'),
                'ts.name as status',
                'tt.trxId',
                'tt.sender_channel_country',
                'tt.sender_channel_id',
                'tt.receiver_channel_id',
                'tt.sender_channel_currency',
                'tt.receiver_channel_currency',
                'tt.status as status_id'  // Add this line to get the status ID
            ])
            ->join('tbl_status as ts', 'tt.status', '=', 'ts.id')
            ->orderBy('tt.created_at', 'desc');

        if ($this->status !== 'all') {
            $statusMap = [
                'processing' => 1,
                'collected' => 2,
                'success' => 3,
                'failed' => 4
            ];

            if (isset($statusMap[$this->status])) {
                $query->where('tt.status', $statusMap[$this->status]);
            }
        }

        $this->transactions = $query->limit($this->transactionLimit)->get();
    }

    public function setStatus($status)
    {
        if (!in_array($status, ['all', 'processing', 'collected', 'success', 'failed'])) {
            return;
        }

        $this->status = $status;
        $this->loadTransactions();
    }

    public function render()
    {
        return view('livewire.recent-transactions', ['transactions' => $this->transactions]);
    }
}
