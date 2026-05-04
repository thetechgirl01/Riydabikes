@extends('layouts.app1')
@section('content')

    <div class="mt-2 mb-4">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <x-page-title>
                    Welcome back, {{ Auth('admin')->User()->firstName }}
                    {{ Auth('admin')->User()->lastName }}!
                </x-page-title>
               
            </div>
            @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
                <div class="py-2 ml-md-auto py-md-0">
                    <a href="{{ route('admin.shipments.create') }}" class="mr-2 btn btn-success d-lg-inline">Create New Delivery</a>
                    <a href="{{ route('admin.shipments') }}" class="mr-2 btn btn-danger d-lg-inline">Manage Deliveries</a>
                    <a href="{{ route('admin.bikes.index') }}" class="btn btn-primary d-lg-inline">Manage Bikes</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Beginning of  Dashboard Stats  -->
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-success"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-12 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Deliveries</p>
                                <h4 class="card-title">{{ number_format($numberOfUsers) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bike stats cards -->
        <div class="col-sm-12 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-motorcycle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-12 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Bikes</p>
                                <h4 class="card-title">{{ number_format($totalBikes) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-12 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Bike Purchases</p>
                                <h4 class="card-title">
                                    {{ number_format($totalBikePurchases) }}
                                    @if($pendingBikePurchases > 0)
                                        <span class="badge badge-warning" style="font-size:11px;">{{ $pendingBikePurchases }} pending</span>
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-12 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Bike Rentals</p>
                                <h4 class="card-title">
                                    {{ number_format($totalBikeRentals) }}
                                    @if($pendingBikeRentals > 0)
                                        <span class="badge badge-warning" style="font-size:11px;">{{ $pendingBikeRentals }} pending</span>
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Dashboard Stats  -->

    <!-- Shipments row (existing) -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Shipments Statistics</div>
                    <div>
                        <p>{{ now()->format('Y') }}</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-mediumbold">Latest Deliveries</div>
                    <div class="card-list">
                        @forelse ($latestUsers as $user)
                            <a href="{{ route('viewuser', ['id' => $user->id]) }}">
                                <div class="item-list shadow-sm d-flex">
                                    <div class="info-user ml-3 text-decoration-none">
                                        <div class="username font-weight-bolder">{{ $user->trackingnumber }}</div>
                                        <div class="status">{{ $user->email }}</div>
                                    </div>
                                    <div>
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bike analytics row -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">Bike Activity ({{ now()->format('Y') }})</div>
                    <div>
                        <span class="mr-3"><i class="fa fa-circle" style="color:#1d7af3;"></i> Purchases</span>
                        <span><i class="fa fa-circle" style="color:#f3545d;"></i> Rentals</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 300px;">
                        <canvas id="bikeChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Revenue summary -->
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <p class="text-muted mb-1">Total Purchase Revenue (Approved)</p>
                            <h3 class="mb-0" style="color:#2ecc71;">
                                {{ $settings->currency ?? '₦' }}{{ number_format($bikePurchaseRevenue, 2) }}
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-1">Total Rental Revenue</p>
                            <h3 class="mb-0" style="color:#3498db;">
                                {{ $settings->currency ?? '₦' }}{{ number_format($bikeRentalRevenue, 2) }}
                            </h3>
                        </div>
                    </div>
                    @if($activeBikeRentals > 0)
                        <p class="mt-3 mb-0 text-muted">
                            <i class="fa fa-info-circle"></i>
                            {{ $activeBikeRentals }} rental{{ $activeBikeRentals > 1 ? 's' : '' }} currently approved/active.
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-mediumbold d-flex justify-content-between">
                        <span>Latest Bike Orders</span>
                        <a href="{{ route('admin.bikes.purchases') }}" class="text-primary" style="font-size:12px;">View all</a>
                    </div>
                    <div class="card-list">
                        @forelse ($latestBikePurchases as $p)
                            <a href="{{ route('admin.bikes.purchase.view', $p->id) }}">
                                <div class="item-list shadow-sm d-flex">
                                    <div class="info-user ml-3 text-decoration-none flex-grow-1">
                                        <div class="username font-weight-bolder">{{ $p->order_no }}</div>
                                        <div class="status">
                                            {{ $p->bike->name ?? '—' }} · {{ $settings->currency ?? '₦' }}{{ number_format($p->total_amount, 0) }}
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge badge-{{ ['Approved'=>'success','Rejected'=>'danger','Cancelled'=>'secondary','Pending'=>'warning'][$p->status] ?? 'secondary' }}">
                                            {{ $p->status }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted text-center py-3 mb-0">No purchases yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-title fw-mediumbold d-flex justify-content-between">
                        <span>Latest Bike Rentals</span>
                        <a href="{{ route('admin.bikes.rentals') }}" class="text-primary" style="font-size:12px;">View all</a>
                    </div>
                    <div class="card-list">
                        @forelse ($latestBikeRentals as $r)
                            <a href="{{ route('admin.bikes.rental.view', $r->id) }}">
                                <div class="item-list shadow-sm d-flex">
                                    <div class="info-user ml-3 text-decoration-none flex-grow-1">
                                        <div class="username font-weight-bolder">{{ $r->rental_no }}</div>
                                        <div class="status">
                                            {{ $r->bike->name ?? '—' }} · {{ $r->total_days }}d · {{ $settings->currency ?? '₦' }}{{ number_format($r->total_amount, 0) }}
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge badge-{{ ['Approved'=>'success','Active'=>'info','Completed'=>'primary','Rejected'=>'danger','Cancelled'=>'secondary','Pending'=>'warning'][$r->status] ?? 'secondary' }}">
                                            {{ $r->status }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted text-center py-3 mb-0">No rentals yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('dash/js/plugin/chart.js/chart.min.js') }}"></script>
    <script>
        var userStats = {{ Illuminate\Support\Js::from($usersData) }};

        var lineChart = document.getElementById('lineChart').getContext('2d');
        var myLineChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Deliveries Made",
                    borderColor: "#1d7af3",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#1d7af3",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    backgroundColor: 'transparent',
                    fill: true,
                    borderWidth: 2,
                    data: userStats
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 10,
                        fontColor: '#1d7af3',
                    }
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        });
    </script>

    <script>
        var bikePurchasesData = {{ Illuminate\Support\Js::from($bikePurchasesByMonth) }};
        var bikeRentalsData   = {{ Illuminate\Support\Js::from($bikeRentalsByMonth) }};

        var bikeCtx = document.getElementById('bikeChart').getContext('2d');
        var bikeChart = new Chart(bikeCtx, {
            type: 'line',
            data: {
                labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets: [
                    {
                        label: "Purchases",
                        borderColor: "#1d7af3",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#1d7af3",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointRadius: 4,
                        backgroundColor: 'rgba(29, 122, 243, 0.1)',
                        fill: true,
                        borderWidth: 2,
                        data: bikePurchasesData
                    },
                    {
                        label: "Rentals",
                        borderColor: "#f3545d",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#f3545d",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointRadius: 4,
                        backgroundColor: 'rgba(243, 84, 93, 0.1)',
                        fill: true,
                        borderWidth: 2,
                        data: bikeRentalsData
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: { display: false },
                layout: { padding: { left: 15, right: 15, top: 15, bottom: 15 } }
            }
        });
    </script>

    <script>
        // This chart is rendered only if a canvas with id="myChart" exists elsewhere on the page.
        // Kept from the original to preserve existing behaviour.
        var myChartEl = document.getElementById('myChart');
        if (myChartEl) {
            var ctx = myChartEl.getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Processed Deposit', 'Pending Deposit', 'Processed Withdrawal', 'Pending Withdrawal'],
                    datasets: [{
                        label: "# Transactions statistics in {{ $settings->currency ?? '' }}",
                        data: [
                            "{{ $total_deposited }}",
                            "{{ $chart_pendepsoit }}",
                            "{{ $total_withdrawn }}",
                            "{{ $chart_pendwithdraw }}",
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
@endpush