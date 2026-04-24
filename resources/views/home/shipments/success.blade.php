@extends('layouts.base')

@section('title', 'Booking Confirmed')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center">
                <i class="fas fa-check text-green-600 text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Booking Confirmed!</h1>
            <p class="text-gray-600 mb-6">Save your tracking number — you'll need it to check your delivery status.</p>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                <p class="text-sm text-blue-700 mb-1">Your Tracking Number</p>
                <p class="text-2xl font-bold text-blue-900 tracking-wider">{{ $shipment->trackingnumber }}</p>
            </div>

            <div class="text-left bg-gray-50 rounded-lg p-4 mb-6 space-y-2 text-sm">
                <div class="flex justify-between"><span class="text-gray-600">From:</span><span class="font-medium">{{ $shipment->take_off_point }}</span></div>
                <div class="flex justify-between"><span class="text-gray-600">To:</span><span class="font-medium">{{ $shipment->final_destination }}</span></div>
                <div class="flex justify-between"><span class="text-gray-600">Service:</span><span class="font-medium">{{ $shipment->freight_type }} {{ $shipment->shipment_type }}</span></div>
                <div class="flex justify-between"><span class="text-gray-600">Amount:</span><span class="font-medium">₦{{ number_format($shipment->cost, 2) }}</span></div>
                <div class="flex justify-between"><span class="text-gray-600">Payment:</span><span class="font-medium">{{ $shipment->payment_method }} ({{ $shipment->payment_status }})</span></div>
                <div class="flex justify-between"><span class="text-gray-600">Status:</span><span class="font-medium text-blue-700">{{ $shipment->status }}</span></div>
            </div>

            <p class="text-sm text-gray-600 mb-6">
                We've sent a confirmation to <strong>{{ $shipment->username ?: $shipment->email }}</strong>.
                Our team is verifying your payment and will update you shortly.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('home.shipments.my-orders') }}" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium">
                    View My Orders
                </a>
                <a href="{{ url('/') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    // Save this tracking ID to localStorage so the My Orders page can show it
    try {
        const key = 'shyp_orders';
        const tn  = "{{ $shipment->trackingnumber }}";
        let arr = JSON.parse(localStorage.getItem(key) || '[]');
        if (!arr.includes(tn)) {
            arr.unshift(tn);
            arr = arr.slice(0, 50); // cap
            localStorage.setItem(key, JSON.stringify(arr));
        }
    } catch (e) {}
})();
</script>
@endsection