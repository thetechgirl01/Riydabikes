@extends('layouts.base')

@section('title', 'Payment Receipt')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Hero Section with Wave Divider -->
    <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 py-10 px-4 sm:px-6 lg:px-8 text-white">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Payment Receipt</h1>
            <p class="text-xl opacity-90">Thank you for your payment</p>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden rotate-180" style="transform: translateY(1px);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50 dark:fill-gray-900"></path>
            </svg>
        </div>
    </div>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Success Message Banner -->
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-8 dark:bg-green-900/30 dark:border-green-500">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 dark:text-green-300">
                        Your payment proof has been submitted successfully. Please wait for confirmation.
                    </p>
                </div>
            </div>
        </div>

        <!-- Receipt Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Payment Details</h2>
            </div>
            
            <div class="px-6 py-4">
                <!-- Status Badge -->
                <div class="flex items-center mb-6">
                    <span class="text-sm bg-yellow-100 text-yellow-800 py-1 px-3 rounded-full font-medium dark:bg-yellow-900/50 dark:text-yellow-300">
                        Status: Pending
                    </span>
                    <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">
                        Your payment is being verified
                    </span>
                </div>
                
                <!-- Receipt Information -->
                <div class="space-y-4 text-gray-700 dark:text-gray-300">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Transaction ID</p>
                            <p class="font-medium">{{ $deposit->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Date</p>
                            <p class="font-medium">{{ $deposit->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Payment Method</p>
                            <p class="font-medium">{{ $payment_method_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Amount</p>
                            <p class="font-medium text-lg">{{ $settings->currency }}{{ number_format($deposit->amount, 2) }}</p>
                        </div>
                    </div>
                    
                    @if(isset($tracking_number) && $tracking_number)
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tracking Number</p>
                        <p class="font-medium">{{ $tracking_number }}</p>
                    </div>
                    @endif
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Recipient</p>
                        <p class="font-medium">{{ $deposit->guest_name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                        <p class="font-medium">{{ $deposit->guest_email }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- What happens next -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">What Happens Next?</h2>
            </div>
            
            <div class="px-6 py-4 space-y-4 text-gray-700 dark:text-gray-300">
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300 mr-3">
                        <span class="text-sm font-medium">1</span>
                    </div>
                    <p>Our team will verify your payment proof (usually within 24 hours)</p>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300 mr-3">
                        <span class="text-sm font-medium">2</span>
                    </div>
                    <p>Once confirmed, your shipment clearance process will begin</p>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 flex items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300 mr-3">
                        <span class="text-sm font-medium">3</span>
                    </div>
                    <p>You'll receive an email notification with updates on your shipment status</p>
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-sm">
                        For any questions about your payment, please contact our support team at 
                        <a href="mailto:{{ $settings->contact_email }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            {{ $settings->contact_email }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('track-order') }}" class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Track Another Shipment
            </a>
            
            <a href="{{ url('/') }}" class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Return to Homepage
            </a>
        </div>
    </div>
</div>
@endsection
