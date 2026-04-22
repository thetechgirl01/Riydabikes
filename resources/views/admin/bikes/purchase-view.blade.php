@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Purchase {{ $purchase->order_no }}</h1>
                    <a href="{{ route('admin.bikes.purchases') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card p-4 mb-3">
                            <h4>Order Details</h4>
                            <table class="table">
                                <tr><th>Bike</th><td>{{ $purchase->bike->name ?? '—' }}</td></tr>
                                <tr><th>Quantity</th><td>{{ $purchase->quantity }}</td></tr>
                                <tr><th>Unit Price</th><td>₦{{ number_format($purchase->unit_price, 2) }}</td></tr>
                                <tr><th>Total</th><td><strong>₦{{ number_format($purchase->total_amount, 2) }}</strong></td></tr>
                                <tr><th>Payment Method</th><td>{{ $purchase->payment_method }}</td></tr>
                                <tr><th>Paid At</th><td>{{ $purchase->paid_at ? $purchase->paid_at->format('M d, Y h:i A') : '—' }}</td></tr>
                                <tr><th>Ordered At</th><td>{{ $purchase->created_at->format('M d, Y h:i A') }}</td></tr>
                            </table>
                        </div>

                        <div class="card p-4 mb-3">
                            <h4>Customer</h4>
                            <p><strong>{{ $purchase->guest_name }}</strong><br>
                            {{ $purchase->guest_email }}<br>
                            {{ $purchase->guest_phone }}</p>
                            <p><strong>Shipping Address:</strong><br>
                            {{ $purchase->shipping_address }}<br>
                            {{ $purchase->city }}, {{ $purchase->state }}</p>
                        </div>

                        @if($purchase->proof)
                            <div class="card p-4 mb-3">
                                <h4>Payment Proof</h4>
                                <a href="{{ asset('storage/app/public/'.$purchase->proof) }}" target="_blank">
                                    <img src="{{ asset('storage/app/public/'.$purchase->proof) }}" style="max-width:100%;max-height:400px;border-radius:6px;">
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-4">
                            <h4>Update Status</h4>
                            <form method="POST" action="{{ route('admin.bikes.purchase.status', $purchase->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        @foreach(['Pending','Approved','Rejected','Cancelled'] as $s)
                                            <option value="{{ $s }}" {{ $purchase->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Admin Note</label>
                                    <textarea name="admin_note" class="form-control" rows="3">{{ $purchase->admin_note }}</textarea>
                                </div>
                                <button class="btn btn-primary w-100">Update</button>
                            </form>
                            <small class="text-muted mt-2 d-block">Approving will decrement bike stock by the quantity ordered.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection