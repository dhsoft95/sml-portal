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
        .stat-percentage {
            font-size: 1rem;
            font-weight: 600;
            color: #343a40;
            margin-left: auto;
        }
        .stat-change {
            font-size: 0.8rem;
        }
        .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
        }
    </style>

    <div class="row g-4">
        @php
            $totalUsers = $userCount;
            $stats = [
                'Registered users' => ['userCount', 'fas fa-users', 'bg-primary-subtle text-primary'],
                'Verified Users' => ['verifiedCount', 'fas fa-user-check', 'bg-success-subtle text-success'],
                'Unverified Users' => ['unverifiedCount', 'fas fa-user-times', 'bg-warning-subtle text-warning'],
                'Male Users' => ['maleCount', 'fas fa-male', 'bg-primary-subtle text-primary'],
                'Female Users' => ['femaleCount', 'fas fa-female', 'bg-info-subtle text-info'],
                'Other Users' => ['otherCount', 'fas fa-user-plus', 'bg-success-subtle text-success']
            ];
        @endphp

        @foreach ($stats as $label => $info)
            @php
                $count = ${$info[0]};
                $percentage = $totalUsers > 0 ? round(($count / $totalUsers) * 100, 2) : 0;
            @endphp
            <div class="col-xl-4 col-md-6">
                <div class="card stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="stat-icon {{ $info[2] }}">
                                    <i class="{{ $info[1] }}"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="stat-value mb-1">{{ $count }}</h4>
                                <p class="stat-label mb-0">{{ $label }}</p>
                            </div>
                            <p class="stat-percentage mb-0">{{ $percentage }}%</p>
                        </div>
                        <div class="stat-change">
                            <span class="badge bg-soft-success text-success">
                                <i class="fas fa-arrow-up me-1"></i>2.5%
                            </span>
                            <span class="ms-1 text-muted">from last week</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div wire:poll.1s="refreshStats"> </div>
</div>
