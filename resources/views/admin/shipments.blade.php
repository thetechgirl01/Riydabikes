<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1">Manage Shipments</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                
                <!-- Action Button -->
                <div class="mb-3 text-right">
                    <a href="{{ route('admin.shipments.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Create New Shipment
                    </a>
                </div>

                <!-- Search and Filter -->
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.shipments') }}" method="GET" class="form-inline">
                            <div class="input-group mr-2 mb-2">
                                <input type="text" name="search" class="form-control" placeholder="Search tracking/name/email..." value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <select name="status" class="form-control mr-2 mb-2">
                                <option value="">All Statuses</option>
                                <option value="Order Confirmed" {{ ($status ?? '') == 'Order Confirmed' ? 'selected' : '' }}>Order Confirmed</option>
                                <option value="Picked by Courier" {{ ($status ?? '') == 'Picked by Courier' ? 'selected' : '' }}>Picked by Courier</option>
                                <option value="Security Checking" {{ ($status ?? '') == 'Security Checking' ? 'selected' : '' }}>Security Checking</option>
                                <option value="Border Check" {{ ($status ?? '') == 'Border Check' ? 'selected' : '' }}>Border Check</option>
                                <option value="Missing Document" {{ ($status ?? '') == 'Missing Document' ? 'selected' : '' }}>Missing Document</option>
                                <option value="On The Way" {{ ($status ?? '') == 'On The Way' ? 'selected' : '' }}>On The Way</option>
                                <option value="Custom Hold" {{ ($status ?? '') == 'Custom Hold' ? 'selected' : '' }}>Custom Hold</option>
                                <option value="Pending Payment" {{ ($status ?? '') == 'Pending Payment' ? 'selected' : '' }}>Pending Payment</option>
                                <option value="Payment Received" {{ ($status ?? '') == 'Payment Received' ? 'selected' : '' }}>Payment Received</option>
                                <option value="Additional Fee Applied" {{ ($status ?? '') == 'Additional Fee Applied' ? 'selected' : '' }}>Additional Fee Applied</option>
                                <option value="Money Laundering" {{ ($status ?? '') == 'Money Laundering' ? 'selected' : '' }}>Money Laundering</option>
                                <option value="Delivered" {{ ($status ?? '') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                            
                            <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            
                            @if($search || $status)
                                <a href="{{ route('admin.shipments') }}" class="btn btn-secondary mb-2 ml-2">Clear</a>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="mb-5 row">
                    <div class="col card p-3 shadow">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tracking #</th>
                                        <th>Sender</th>
                                        <th>Receiver</th>
                                        <th>Origin → Destination</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($shipments as $shipment)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.shipments.view', $shipment->id) }}" class="font-weight-bold">
                                                    {{ $shipment->trackingnumber }}
                                                </a>

                                                @if($shipment->shipment_source === 'public')
                                                    <span class="badge badge-info ml-1" title="Booked online by customer">Online</span>
                                                @endif

                                                @if($shipment->payment_status && $shipment->shipment_source === 'public')
                                                    <span class="badge badge-{{ $shipment->payment_status === 'Approved' ? 'success' : 'warning' }} ml-1">
                                                        Payment: {{ $shipment->payment_status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $shipment->sname }}</td>
                                            <td>
                                                {{ $shipment->name }}
                                                <div class="small text-muted">
                                                    {{ $shipment->email }}<br>
                                                    {{ $shipment->phone }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-light">{{ $shipment->take_off_point }}</span>
                                                <i class="fa fa-long-arrow-alt-right mx-1"></i>
                                                <span class="badge badge-light">{{ $shipment->final_destination }}</span>
                                            </td>
                                            <td>
                                                @php
                                                    $statusColors = [
                                                        'Delivered' => 'success',
                                                        'Payment Received' => 'success',
                                                        'Custom Hold' => 'warning',
                                                        'Pending Payment' => 'warning',
                                                        'Additional Fee Applied' => 'danger',
                                                        'Money Laundering' => 'danger',
                                                        'Missing Document' => 'danger',
                                                        'Security Checking' => 'info',
                                                        'Border Check' => 'info',
                                                    ];
                                                    $badgeClass = $statusColors[$shipment->status] ?? 'info';
                                                @endphp
                                                <span class="badge badge-{{ $badgeClass }}">{{ $shipment->status }}</span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($shipment->created_at)->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="{{ route('admin.shipments.view', $shipment->id) }}" class="m-1 btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a href="{{ route('admin.shipments.update-status-form', $shipment->id) }}" class="m-1 btn btn-primary btn-sm">
                                                    <i class="fa fa-truck"></i> Update
                                                </a>
                                                <a href="{{ route('admin.shipments.print', $shipment->id) }}" target="_blank" class="m-1 btn btn-secondary btn-sm">
                                                    <i class="fa fa-print"></i> Print
                                                </a>
                                                
                                                <form action="{{ route('admin.shipments.delete', $shipment->id) }}" method="POST" style="display: inline-block;"
                                                      onsubmit="return confirm('Are you sure you want to delete shipment {{ $shipment->trackingnumber }}? This action cannot be undone.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="m-1 btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="py-3">
                                                    <i class="fa fa-box-open fa-3x text-muted mb-3"></i>
                                                    <p class="mt-3">No shipments found</p>
                                                    @if($search || $status)
                                                        <a href="{{ route('admin.shipments') }}" class="btn btn-outline-primary">Clear Filters</a>
                                                    @else
                                                        <a href="{{ route('admin.shipments.create') }}" class="btn btn-primary">
                                                            <i class="fa fa-plus-circle"></i> Create Shipment
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                            <!-- Pagination -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $shipments->appends(['search' => $search, 'status' => $status])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection