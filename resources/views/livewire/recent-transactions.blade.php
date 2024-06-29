<div>
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Transactions</h4>
            <div class="flex-shrink-0">
                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link @if($status == 'all') active @endif" wire:click.prevent="setStatus('all')" href="#">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($status == 'processing') active @endif" wire:click.prevent="setStatus('processing')" href="#">Processing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($status == 'collected') active @endif" wire:click.prevent="setStatus('collected')" href="#">Collected</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($status == 'success') active @endif" wire:click.prevent="setStatus('success')" href="#">Success</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($status == 'failed') active @endif" wire:click.prevent="setStatus('failed')" href="#">Failed</a>
                    </li>
                </ul>
            </div>
        </div><!-- end card header -->

        <div class="card-body px-0">
            <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                <table class="table align-middle table-nowrap table-striped">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Sender Amount</th>
                        <th>Receiver Amount</th>
                        <th>Transaction ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td style="width: 50px;">
                                <div class="font-size-22
                                    @if($transaction->status_id == 1) text-warning
                                    @elseif($transaction->status_id == 2) text-success
                                    @elseif($transaction->status_id == 3) text-info
                                    @elseif($transaction->status_id == 4) text-danger
                                    @endif">
                                    <i class="bx
                                        @if($transaction->status_id == 1) bx-time-five
                                        @elseif($transaction->status_id == 2) bx-check-circle
                                        @elseif($transaction->status_id == 3) bx-check-circle
                                        @elseif($transaction->status_id == 4) bx-x-circle
                                        @endif d-block"></i>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">{{ $transaction->sender_amount }}</h5>
                                    <p class="text-muted mb-0 font-size-12">{{ $transaction->trxId }}</p>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">{{ $transaction->receiver_amount }}</h5>
                                    <p class="text-muted mb-0 font-size-12">{{ $transaction->created_at }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="text-end">
                                    <h5 class="font-size-14 mb-0">{{ $transaction->sender_channel_country }}</h5>
                                    <p class="text-muted mb-0 font-size-12">{{ $transaction->status }}</p>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No transactions found based on your filter.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div>
