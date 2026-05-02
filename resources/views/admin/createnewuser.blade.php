@php
if (Auth('admin')->User()->dashboard_style == 'light') { $text='dark'; $bg='light'; } else { $text='light'; $bg='dark'; }
@endphp
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content card">
            <div class="page-inner card-body">
                <div class="mt-2 mb-4">
                    <h1 class="title1 text-{{ $text }} text-center">Create A New Delivery</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card p-2 shadow">
                            <div class="card-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <h2 class="text-{{ $text }}">Receiver Information</h2>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Receiver's Full Name</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="name" placeholder="Receiver's full name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Receiver's Email</h6>
                                            <input type="email" class="form-control bg-{{ $bg }} text-{{ $text }}" name="email" placeholder="Receiver's email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Receiver's Phone</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="phone" placeholder="Receiver's phone" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Receiver's Delivery Address</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="address" placeholder="Full delivery address" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <h6 class="text-{{ $text }}">Destination City/State</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="final_destination" placeholder="e.g. Lagos, Abuja, Port Harcourt" required>
                                        </div>

                                        <div class="form-group col-md-12 mt-3">
                                            <h2 class="text-{{ $text }}">Sender Information</h2>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Sender's Full Name</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="sname" placeholder="Sender's full name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Sender's Email</h6>
                                            <input type="email" class="form-control bg-{{ $bg }} text-{{ $text }}" name="semail" placeholder="Sender's email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Sender's Phone</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="sphone" placeholder="Sender's phone" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Sender's Pickup Address</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="saddress" placeholder="Full pickup address" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <h6 class="text-{{ $text }}">Pickup City/State</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="take_off_point" placeholder="e.g. Lagos, Abuja, Port Harcourt" required>
                                        </div>

                                        <div class="form-group col-md-12 mt-3">
                                            <h2 class="text-{{ $text }}">Delivery Details</h2>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Delivery Speed</h6>
                                            <select class="form-control bg-{{ $bg }} text-{{ $text }}" name="freight_type" required>
                                                <option value="Express">Express</option>
                                                <option value="Same Day">Same Day</option>
                                                <option value="Next Day">Next Day</option>
                                                <option value="Standard">Standard</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Weight (e.g. 2kg)</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="weight" placeholder="Weight" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Quantity</h6>
                                            <input type="number" min="1" class="form-control bg-{{ $bg }} text-{{ $text }}" name="qty" value="1" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Status</h6>
                                            <select class="form-control bg-{{ $bg }} text-{{ $text }}" name="status" required>
                                                @foreach(['Delivery Created','Pickup Scheduled','Rider Assigned','Picked Up','In Transit','Arrived at Hub','Out for Delivery','Delivered','Delivery Delayed','Delivery Failed','Returned','Pending Payment','Payment Received'] as $st)
                                                    <option value="{{ $st }}">{{ $st }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <h6 class="text-{{ $text }}">Package Description</h6>
                                            <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" name="description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Pickup Date</h6>
                                            <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" name="date_shipped" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Expected Delivery Date</h6>
                                            <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" name="expected_delivery" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Tracking Number</h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="trackingnumber" value="{{ $trackingnumber }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }}">Package Photo</h6>
                                            <input type="file" class="form-control bg-{{ $bg }} text-{{ $text }}" name="photo">
                                        </div>

                                        <div class="form-group col-md-12 mt-3">
                                            <h2 class="text-{{ $text }}">Pricing & Payment</h2>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }} text-danger">Delivery Fee (₦)</h6>
                                            <input type="number" step="0.01" class="form-control bg-{{ $bg }} text-{{ $text }}" name="cost" placeholder="Total fee" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 class="text-{{ $text }} text-danger">Payment Status</h6>
                                            <select class="form-control bg-{{ $bg }} text-{{ $text }}" name="payment_status" required>
                                                <option value="Pending">Pending</option>
                                                <option value="Approved">Paid</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <h6 class="text-{{ $text }} text-danger">Delivery Progress (%)</h6>
                                            <input type="number" min="0" max="100" class="form-control bg-{{ $bg }} text-{{ $text }}" name="percentage_complete" placeholder="0-100" value="0">
                                        </div>

                                        <input type="hidden" name="clearance_cost" value="0">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Create Delivery</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection