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
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Deposit Details</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.shipment.deposits') }}">Shipment Deposits</a></li>
                                    <li class="breadcrumb-item active">Deposit Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Messages -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Deposit Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex mb-3">
                                        <div>
                                            <p class="text-muted mb-1">Deposit Status</p>
                                            @if($deposit->status == 'Processed')
                                                <h5 class="mb-0"><span class="badge bg-success">Processed</span></h5>
                                            @elseif($deposit->status == 'Pending')
                                                <h5 class="mb-0"><span class="badge bg-warning">Pending</span></h5>
                                            @else
                                                <h5 class="mb-0"><span class="badge bg-danger">Cancelled</span></h5>
                                            @endif
                                        </div>
                                        
                                        @if($deposit->status == 'Pending')
                                            <div class="ms-3">
                                                <a href="{{ route('admin.process.deposit', $deposit->id) }}" class="btn btn-sm btn-success">
                                                    <i class="mdi mdi-check me-1"></i> Mark as Processed
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <p class="text-muted mb-1">Transaction Date</p>
                                        <h5 class="mb-0">{{ \Carbon\Carbon::parse($deposit->created_at)->format('M d, Y h:i A') }}</h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <h5 class="font-size-15">Deposit Details</h5>
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-sm mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Deposit ID</th>
                                                            <td>{{ $deposit->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Amount</th>
                                                            <td>{{ $settings->s_currency }} {{ number_format($deposit->amount, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Payment Method</th>
                                                            <td>{{ $deposit->payment_mode }}</td>
                                                        </tr>
                                                        @if($deposit->transaction_id)
                                                        <tr>
                                                            <th scope="row">Transaction ID</th>
                                                            <td>{{ $deposit->transaction_id }}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <th scope="row">Payment Proof</th>
                                                            <td>
                                                                @if($deposit->proof)
                                                                    <a href="{{ route('admin.view.depositimage', $deposit->id) }}" class="btn btn-sm btn-info">
                                                                        <i class="mdi mdi-file-image me-1"></i> View Proof
                                                                    </a>
                                                                @else
                                                                    <span class="text-muted">No proof uploaded</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <h5 class="font-size-15">Delivery information</h5>
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-sm mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Tracking Number</th>
                                                            <td>
                                                                <a href="{{ route('admin.shipments.view', $deposit->user) }}" class="text-primary">
                                                                    {{ $deposit->trackingnumber }}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Customer Name</th>
                                                            <td>{{ $deposit->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td>{{ $deposit->email }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($deposit->payment_details)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <h5 class="font-size-15">Payment Details</h5>
                                            <div class="border rounded p-3 bg-light">
                                                {{ $deposit->payment_details }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('admin.shipment.deposits') }}" class="btn btn-secondary">
                                        <i class="mdi mdi-arrow-left me-1"></i> Back to Deposits
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="mdi mdi-trash-can me-1"></i> Delete Deposit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this deposit record? This action cannot be undone.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ route('admin.delete.deposit', $deposit->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->
    </div> <!-- main-content -->
    
    @include('admin.footer')
@endsection
