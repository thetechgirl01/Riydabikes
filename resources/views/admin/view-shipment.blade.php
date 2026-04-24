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
                    <h1 class="title1">Shipment Details</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h4 class="card-title mb-3 mb-md-0">
                                            <i class="fa fa-box mr-2"></i> Shipment Information
                                        </h4>
                                    </div>
                                    <div class="col-md-6 text-center text-md-right">
                                        <div class="d-flex flex-wrap justify-content-center justify-content-md-end action-buttons">
                                            <a href="{{ route('admin.shipments') }}" class="btn btn-light m-1">
                                                <i class="fa fa-arrow-left mr-1"></i> <span>Back</span>
                                            </a>
                                            <a href="{{ route('admin.shipments.update-status-form', $shipment->id) }}" class="btn btn-info m-1">
                                                <i class="fa fa-truck-loading mr-1"></i> <span>Status</span>
                                            </a>
                                            <a href="{{ route('admin.shipments.edit', $shipment->id) }}" class="btn btn-warning m-1">
                                                <i class="fa fa-edit mr-1"></i> <span>Edit</span>
                                            </a>
                                            <a href="{{ route('admin.shipments.print', $shipment->id) }}" target="_blank" class="btn btn-secondary m-1">
                                                <i class="fa fa-print mr-1"></i> <span>Print</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Tracking Information -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="card shadow bg-light">
                                            <div class="card-body text-center">
                                                <div class="mb-3">
                                                    <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $shipment->trackingnumber }}&code=Code128" alt="{{ $shipment->trackingnumber }}" class="img-fluid">
                                                </div>
                                                <h5 class="tracking-number">{{ $shipment->trackingnumber }}</h5>
                                                <div class="badge badge-{{ 
                                                    $shipment->status == 'Delivered' ? 'success' : 
                                                    ($shipment->status == 'Custom Hold' ? 'warning' : 'info') 
                                                }} badge-lg">
                                                    {{ $shipment->status }}
                                                </div>
                                                <div class="mt-2 text-muted">
                                                    Created on {{ \Carbon\Carbon::parse($shipment->created_at)->format('F d, Y - h:i A') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Sender & Receiver Information -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Sender Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="30%">Name:</th>
                                                        <td>{{ $shipment->sname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>{{ $shipment->saddress }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Origin:</th>
                                                        <td>{{ $shipment->take_off_point }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="card shadow">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Receiver Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="30%">Name:</th>
                                                        <td>{{ $shipment->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>
                                                            <a href="mailto:{{ $shipment->email }}">{{ $shipment->email }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone:</th>
                                                        <td>
                                                            <a href="tel:{{ $shipment->phone }}">{{ $shipment->phone }}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>{{ $shipment->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Destination:</th>
                                                        <td>{{ $shipment->final_destination }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipment Details & Costs -->
                                    <div class="col-md-6">
                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Package Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="30%">Quantity:</th>
                                                        <td>{{ $shipment->qty }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description:</th>
                                                        <td>{{ $shipment->description }}</td>
                                                    </tr>
                                                    @if($shipment->photo)
                                                    <tr>
                                                        <th>Photo:</th>
                                                        <td>
                                                            <a href="{{ asset('public/' . $shipment->photo) }}" target="_blank">
                                                                <img src="{{ asset('public/' . $shipment->photo) }}" alt="Shipment Photo" class="img-thumbnail" style="max-height: 200px;">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Customer Payment Proof Section (after package photo) -->
                                        @if($shipment->shipment_source === 'public' && $shipment->payment_proof)
                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Customer Payment Proof</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <span class="badge badge-{{ $shipment->payment_status === 'Approved' ? 'success' : 'warning' }} badge-lg">
                                                        {{ $shipment->payment_status }}
                                                    </span>
                                                </div>
                                                <p><strong>Payment Method:</strong> {{ $shipment->payment_method }}</p>
                                                <div class="text-center">
                                                    <a href="{{ asset($shipment->payment_proof) }}" target="_blank">
                                                        <img src="{{ asset($shipment->payment_proof) }}" alt="Payment Proof" class="img-fluid rounded" style="max-height: 300px; object-fit: contain;">
                                                    </a>
                                                </div>
                                                
                                                @if($shipment->payment_status !== 'Approved')
                                                    <form method="POST" action="{{ route('admin.shipments.approve-payment', $shipment->id) }}" class="mt-3">
                                                        @csrf
                                                        <button class="btn btn-success btn-block">
                                                            <i class="fa fa-check"></i> Approve Payment
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        @endif

                                        <div class="card shadow mb-4">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Cost Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <th width="50%">Shipping Cost:</th>
                                                        <td>{{ $settings->s_currency }} {{ number_format($shipment->cost, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Clearance Cost:</th>
                                                        <td>{{ $settings->s_currency }} {{ number_format($shipment->clearance_cost, 2) }}</td>
                                                    </tr>
                                                    <tr class="table-active font-weight-bold">
                                                        <th>Total Cost:</th>
                                                        <td>{{ $settings->s_currency }} {{ number_format($shipment->cost + $shipment->clearance_cost, 2) }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tracking History -->
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Tracking History</h5>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="tracking-timeline">
                                                    @forelse($tracks as $track)
                                                        <div class="tracking-item">
                                                            <div class="tracking-icon bg-{{ 
                                                                $track->status == 'Delivered' ? 'success' : 
                                                                ($track->status == 'Custom Hold' ? 'warning' : 'info') 
                                                            }}">
                                                                <i class="fa fa-{{ 
                                                                    $track->status == 'Delivered' ? 'check' : 
                                                                    ($track->status == 'Custom Hold' ? 'exclamation' : 'truck') 
                                                                }}"></i>
                                                            </div>
                                                            <div class="tracking-content">
                                                                <div class="tracking-date">
                                                                    {{ \Carbon\Carbon::parse($track->created_at)->format('F d, Y - h:i A') }}
                                                                </div>
                                                                <div class="tracking-status">
                                                                    <span class="font-weight-bold">{{ $track->status }}</span>
                                                                    @if($track->address)
                                                                        <span class="ml-2 text-muted">
                                                                            <i class="fa fa-map-marker-alt"></i> {{ $track->address }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                <div class="tracking-text mt-2">
                                                                    {{ $track->comment }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="text-center p-4">
                                                            <p>No tracking history found</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .badge-lg {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
    
    .tracking-number {
        font-family: monospace;
        font-size: 1.2rem;
        font-weight: bold;
        letter-spacing: 1px;
    }
    
    .tracking-timeline {
        position: relative;
        padding: 30px;
    }
    
    .tracking-item {
        position: relative;
        padding-left: 60px;
        margin-bottom: 30px;
    }
    
    .tracking-item:last-child {
        margin-bottom: 0;
    }
    
    .tracking-icon {
        position: absolute;
        left: 0;
        top: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        color: white;
    }
    
    .tracking-content {
        position: relative;
        padding-bottom: 30px;
        border-bottom: 1px dashed #ddd;
    }
    
    .tracking-item:last-child .tracking-content {
        border-bottom: none;
    }
    
    .tracking-date {
        color: #777;
        font-size: 0.9rem;
        margin-bottom: 6px;
    }
    
    /* Responsive styles for action buttons */
    .action-buttons {
        width: 100%;
    }
    
    .action-buttons .btn {
        min-width: 100px;
        margin: 0.25rem !important;
        flex-grow: 1;
    }
    
    @media (max-width: 767px) {
        .action-buttons {
            margin-top: 1rem;
        }
        
        /* Make buttons more touch-friendly on mobile */
        .action-buttons .btn {
            padding: 0.6rem 0.75rem;
            font-size: 0.9rem;
        }
        
        /* Hide text and show only icons on very small screens */
        @media (max-width: 375px) {
            .action-buttons .btn i {
                margin-right: 0 !important;
            }
            
            .action-buttons .btn span {
                display: none;
            }
        }
    }
</style>
@endsection