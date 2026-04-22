@php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
@endphp
@extends('layouts.app')
@section('content')
@include('admin.topmenu')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content card">
        <div class="page-inner card-body">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-{{ $text }} text-center">Create New Shipment</h1>
            </div>
            <x-danger-alert />
            <x-success-alert />

            <div class="mb-5 row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card p-2 shadow">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.shipments.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <h2 class="text-{{ $text }}">Sender Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Sender Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="sname" name="sname" value="{{ old('sname') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Sender Email</h6>
                                        <input type="email" class="form-control bg-{{ $bg }} text-{{ $text }}" id="sender_email" name="sender_email" value="{{ old('sender_email') }}">
                                        <small class="text-muted">Optional: For sending shipment notifications to sender</small>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Sender Address (country, city, address) <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" id="saddress" name="saddress" rows="3" required>{{ old('saddress') }}</textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Origin Location (country, city, address)<span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="take_off_point" name="take_off_point" value="{{ old('take_off_point') }}" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h2 class="text-{{ $text }}">Receiver Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Receiver Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="name" name="name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Receiver Email <span class="text-danger">*</span></h6>
                                        <input type="email" class="form-control bg-{{ $bg }} text-{{ $text }}" id="email" name="email" value="{{ old('email') }}" required>
                                        <small class="text-muted">Required for shipment notifications</small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Receiver Phone <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Destination Location(country ,city, address) <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="final_destination" name="final_destination" value="{{ old('final_destination') }}" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Receiver Address (city, country) for map read it correctly, you can leave it as Destination Location <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h2 class="text-{{ $text }}">Shipment Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Quantity <span class="text-danger">*</span></h6>
                                        <input type="number" class="form-control bg-{{ $bg }} text-{{ $text }}" id="qty" name="qty" min="1" value="{{ old('qty', 1) }}" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Weight (kg)</h6>
                                        <input type="number" step="0.01" class="form-control bg-{{ $bg }} text-{{ $text }}" id="weight" name="weight" value="{{ old('weight') }}">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">freight_type</h6>
                                        
                                        
                                         <select type="text" class="form-control  bg-{{$bg}}  text-{{ $text }}"
                                                                name="freight_type"  required>
                                             
                                                                <option value="Air Freight">Air Freight</option> 
                                                                <option value="Sea Freight">Sea Freight</option> 
                                                                <option value="Road Freight">Road Freight</option> 
                                                                <option value="Rail Freight">Rail Freight</option> 
                                                               
                                                        </select>
                                       
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Upload Shipment Photo</h6>
                                        <input type="file" class="form-control bg-{{ $bg }} text-{{ $text }}" name="photo">
                                        <small class="text-muted">Optional: Upload an image of the shipment package</small>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Payment Method</h6>
                                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" id="payment_method" name="payment_method">
                                            <option value="To Pay" {{ old('payment_method') == 'To Pay' ? 'selected' : '' }}>To Pay (Receiver Pays)</option>
                                            <option value="Prepaid" {{ old('payment_method') == 'Prepaid' ? 'selected' : '' }}>Prepaid (Sender Pays)</option>
                                            <option value="Third Party" {{ old('payment_method') == 'Third Party' ? 'selected' : '' }}>Third Party</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Package Description <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                        <small class="text-muted">Provide a detailed description of the shipment contents</small>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h2 class="text-{{ $text }} text-danger">Cost Information:</h2>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }} text-danger">Shipping Cost <span class="text-danger">*</span></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-{{ $bg }} text-{{ $text }}">{{ $settings->s_currency }}</span>
                                            </div>
                                            <input type="number" step="0.01" class="form-control bg-{{ $bg }} text-{{ $text }}" id="cost" name="cost" value="{{ old('cost', 0) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }} text-danger">Clearance Cost <span class="text-danger">*</span></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-{{ $bg }} text-{{ $text }}">{{ $settings->s_currency }}</span>
                                            </div>
                                            <input type="number" step="0.01" class="form-control bg-{{ $bg }} text-{{ $text }}" id="clearance_cost" name="clearance_cost" value="{{ old('clearance_cost', 0) }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }} text-danger">Total Cost</h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-{{ $bg }} text-{{ $text }}">{{ $settings->s_currency }}</span>
                                            </div>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="total_cost" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Date Shipped</h6>
                                        <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" name="date_shipped" value="{{ old('date_shipped') }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Expected Delivery Date</h6>
                                        <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" name="expected_delivery" value="{{ old('expected_delivery') }}" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Shipment Status</h6>
                                        <select type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="status" required>
                                            <option value="Order Confirmed" {{ old('status') == 'Order Confirmed' ? 'selected' : '' }}>Order Confirmed</option>
                                            <option value="Picked by Courier" {{ old('status') == 'Picked by Courier' ? 'selected' : '' }}>Picked by Courier</option>
                                            <option value="Security Checking" {{ old('status') == 'Security Checking' ? 'selected' : '' }}>Security Checking</option>
                                            <option value="Border Check" {{ old('status') == 'Border Check' ? 'selected' : '' }}>Border Check</option>
                                            <option value="Missing Document" {{ old('status') == 'Missing Document' ? 'selected' : '' }}>Missing Document</option>
                                            <option value="On The Way" {{ old('status') == 'On The Way' ? 'selected' : '' }}>On The Way</option>
                                            <option value="Custom Hold" {{ old('status') == 'Custom Hold' ? 'selected' : '' }}>Custom Hold</option>
                                            <option value="Pending Payment" {{ old('status') == 'Pending Payment' ? 'selected' : '' }}>Pending Payment</option>
                                            <option value="Payment Received" {{ old('status') == 'Payment Received' ? 'selected' : '' }}>Payment Received</option>
                                            <option value="Additional Fee Applied" {{ old('status') == 'Additional Fee Applied' ? 'selected' : '' }}>Additional Fee Applied</option>
                                            <option value="Money Laundering" {{ old('status') == 'Money Laundering' ? 'selected' : '' }}>Money Laundering</option>
                                            <option value="Delivered" {{ old('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }} text-danger">Payment Status</h6>
                                        <select type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="payment_status" required>
                                            <option value="Paid" {{ old('payment_status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="Unpaid" {{ old('payment_status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }} text-danger">Delivery Percentage Completed</h6>
                                        <input type="number" class="form-control bg-{{ $bg }} text-{{ $text }}" name="percentage_complete" value="{{ old('percentage_complete', 0) }}" min="0" max="100" placeholder="Enter Delivery Percentage Completed">
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Shipment Video <small class="text-muted">(Optional)</small></h6>
                                        <input type="file" class="form-control bg-{{ $bg }} text-{{ $text }}" name="video" accept="video/mp4,video/mpeg,video/quicktime,video/x-msvideo,video/webm">
                                        <small class="form-text text-muted">Upload a video for this shipment (Max: 20MB). Supported formats: MP4, MPEG, MOV, AVI, WEBM</small>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-2"></i> Create Shipment
                                        </button>
                                        <a href="{{ route('admin.shipments') }}" class="btn btn-secondary ml-2">
                                            <i class="fas fa-times mr-2"></i> Cancel
                                        </a>
                                    </div>
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

@section('scripts')
<script>
    $(document).ready(function() {
        // Calculate total cost when shipping cost or clearance cost changes
        $('#cost, #clearance_cost').on('input', function() {
            calculateTotal();
        });
        
        // Initial calculation
        calculateTotal();
        
        function calculateTotal() {
            var shippingCost = parseFloat($('#cost').val()) || 0;
            var clearanceCost = parseFloat($('#clearance_cost').val()) || 0;
            var total = shippingCost + clearanceCost;
            
            $('#total_cost').val(total.toFixed(2));
        }
    });
</script>
@endsection
