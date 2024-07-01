<div>
    <style>
        .stat-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .stat-icon {
            font-size: 2.5rem;
            height: 60px;
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
        }
        .stat-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: #6c757d;
        }
        .stat-change {
            font-size: 0.8rem;
        }
    </style>

    <div class="row g-4">
        @php
            $stats = [
                'Total Interactions' => ['100', 'fas fa-exchange-alt', 'bg-primary-subtle text-primary'],
                'Charts' => ['20', 'fas fa-chart-bar', 'bg-info-subtle text-info'],
                'WhatsApp' => ['400', 'fab fa-whatsapp', 'bg-success-subtle text-success'],
                'Calls' => ['45', 'fas fa-phone', 'bg-warning-subtle text-warning'],
            ];
        @endphp

        @foreach ($stats as $label => $info)
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="stat-icon {{ $info[2] }}">
                                    <i class="{{ $info[1] }}"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="stat-value mb-1">{{ $info[0] }}</h4>
                                <p class="stat-label mb-0">{{ $label }}</p>
                            </div>
                        </div>
                        <div class="stat-change">
                            <span class="badge bg-soft-success text-success">
                                <i class="fas fa-arrow-up me-1"></i>5%
                            </span>
                            <span class="ms-1 text-muted">from last week</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
{{--    <div wire:poll.1s="refreshStats"></div>--}}
</div>
