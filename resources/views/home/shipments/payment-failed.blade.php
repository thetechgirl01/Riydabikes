@extends('layouts.base')
@section('title', 'Payment Failed')
@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-2xl mx-auto px-4 text-center">
        <div class="bg-white rounded-2xl shadow-lg p-10 border border-red-100">
            <div class="w-20 h-20 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-times text-red-600 text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 mb-3">Payment Could Not Be Completed</h1>
            <p class="text-gray-600 mb-2">{{ $reason ?? 'Something went wrong with your payment.' }}</p>
            @if(! empty($shipment))
                <p class="text-sm text-gray-500 mb-6">Booking reference: <strong>{{ $shipment->trackingnumber }}</strong></p>
            @endif
            <p class="text-gray-600 mb-8 text-sm">Your booking is saved. You can try paying again or choose a different payment method.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('home.shipments.create') }}" class="px-6 py-3 bg-[#800020] text-white rounded-full font-semibold hover:bg-[#6b001a] transition-all">
                    <i class="fas fa-redo mr-2"></i> Try Again
                </a>
                <a href="{{ route('contact') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-full font-semibold hover:bg-gray-50 transition-all">
                    <i class="fas fa-headset mr-2"></i> Contact Support
                </a>
            </div>
        </div>
    </div>
</div>
@endsection