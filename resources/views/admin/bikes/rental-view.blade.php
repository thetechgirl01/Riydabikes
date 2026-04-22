@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Rental {{ $rental->rental_no }}</h1>
                    <a href="{{ route('admin.bikes.rentals') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card p-4 mb-3">
                            <h4>Booking Details</h4>
                            <table class="table">
                                <tr><th>Bike</th><td>{{ $rental->bike->name ?? '—' }}</td></tr>
                                <tr><th>Start</th><td>{{ $rental->start_date->format('M d, Y') }}</td></tr>
                                <tr><th>End</th><td>{{ $rental->end_date->format('M d, Y') }}</td></tr>
                                <tr><th>Days</th><td>{{ $rental->total_days }}</td></tr>
                                <tr><th>Daily Rate</th><td>₦{{ number_format($rental->daily_rate, 2) }}</td></tr>
                                <tr><th>Total</th><td><strong>₦{{ number_format($rental->total_amount, 2) }}</strong></td></tr>
                                <tr><th>Payment Method</th><td>{{ $rental->payment_method }}</td></tr>
                                <tr><th>Paid At</th><td>{{ $rental->paid_at ? $rental->paid_at->format('M d, Y h:i A') : '—' }}</td></tr>
                                <tr><th>Booked At</th><td>{{ $rental->created_at->format('M d, Y h:i A') }}</td></tr>
                            </table>
                        </div>

                        <div class="card p-4 mb-3">
                            <h4>Customer</h4>
                            <p><strong>{{ $rental->guest_name }}</strong><br>
                            {{ $rental->guest_email }}<br>
                            {{ $rental->guest_phone }}</p>
                            @if($rental->pickup_address)
                                <p><strong>Pickup Address:</strong><br>{{ $rental->pickup_address }}</p>
                            @endif
                        </div>

                        @if($rental->proof)
                            <div class="card p-4 mb-3">
                                <h4>Payment Proof</h4>
                                <a href="{{ asset('storage/'.$rental->proof) }}" target="_blank">
                                    <img src="{{ asset('storage/'.$rental->proof) }}" style="max-width:100%;max-height:400px;border-radius:6px;">
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-4">
                            <h4>Update Status</h4>
                            <form method="POST" action="{{ route('admin.bikes.rental.status', $rental->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        @foreach(['Pending','Approved','Active','Completed','Rejected','Cancelled'] as $s)
                                            <option value="{{ $s }}" {{ $rental->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Admin Note</label>
                                    <textarea name="admin_note" class="form-control" rows="3">{{ $rental->admin_note }}</textarea>
                                </div>
                                <button class="btn btn-primary w-100">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection