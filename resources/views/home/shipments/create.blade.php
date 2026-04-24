@extends('layouts.base')

@section('title', 'Book a Delivery')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Book a Delivery</h1>
            <p class="text-gray-600 mt-2">Fill in the details below and we'll handle the rest.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4">
                <ul class="list-disc list-inside text-sm text-red-700">
                    @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4">
                <p class="text-sm text-red-700">{{ session('error') }}</p>
            </div>
        @endif
        @if(session('info'))
            <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 p-4">
                <p class="text-sm text-blue-700">{{ session('info') }}</p>
            </div>
        @endif

        <form id="bookingForm" method="POST" action="{{ route('home.shipments.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Sender -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user-tag text-primary-600 mr-2"></i> Sender Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input name="sname" value="{{ old('sname') }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input name="sender_phone" value="{{ old('sender_phone') }}" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="sender_email" value="{{ old('sender_email') }}" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pickup City/Office</label>
                        <input name="take_off_point" value="{{ old('take_off_point') }}" placeholder="e.g. Onitsha" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pickup Address</label>
                        <textarea name="saddress" rows="2" required class="w-full rounded-md border-gray-300 shadow-sm">{{ old('saddress') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Receiver -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user-friends text-primary-600 mr-2"></i> Receiver Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input name="name" value="{{ old('name') }}" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input name="phone" value="{{ old('phone') }}" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-gray-400">(optional)</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Delivery City/Office</label>
                        <input name="final_destination" value="{{ old('final_destination') }}" placeholder="e.g. Lagos" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Delivery Address</label>
                        <textarea name="address" rows="2" required class="w-full rounded-md border-gray-300 shadow-sm">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Package -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-box text-primary-600 mr-2"></i> Package Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="2" required placeholder="What's in the package?" class="w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                        <input type="number" name="qty" min="1" value="{{ old('qty', 1) }}" required class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Weight <span class="text-gray-400">(optional, e.g. 2kg)</span></label>
                        <input name="weight" value="{{ old('weight') }}" class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                        <select name="package_size" class="w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">— select —</option>
                            @foreach(['Small','Medium','Large','Extra Large'] as $sz)
                                <option value="{{ $sz }}" {{ old('package_size')==$sz?'selected':'' }}>{{ $sz }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Declared Value (₦) <span class="text-gray-400">(optional)</span></label>
                        <input type="number" step="0.01" name="package_value" value="{{ old('package_value') }}" class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Package Photo <span class="text-gray-400">(optional, JPG/PNG, max 4MB)</span></label>
                        <input type="file" name="photo" accept="image/*" class="w-full text-sm">
                    </div>
                </div>
            </div>

            <!-- Service -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-shipping-fast text-primary-600 mr-2"></i> Service Type
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Delivery Speed</label>
                        <select name="freight_type" required class="w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">— select —</option>
                            <option value="Standard" {{ old('freight_type')=='Standard'?'selected':'' }}>Standard</option>
                            <option value="Express" {{ old('freight_type')=='Express'?'selected':'' }}>Express</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="shipment_type" required class="w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">— select —</option>
                            <option value="Delivery" {{ old('shipment_type')=='Delivery'?'selected':'' }}>Local Delivery</option>
                            <option value="Shipment" {{ old('shipment_type')=='Shipment'?'selected':'' }}>Shipment (Inter-state/Long-haul)</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Special Instructions <span class="text-gray-400">(optional)</span></label>
                        <textarea name="delivery_notes" rows="2" placeholder="Anything we should know?" class="w-full rounded-md border-gray-300 shadow-sm">{{ old('delivery_notes') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Payment -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-credit-card text-primary-600 mr-2"></i> Payment
                </h2>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Total Amount (₦)</label>
                    <input type="number" step="0.01" name="cost" value="{{ old('cost') }}" required placeholder="Quoted price" class="w-full rounded-md border-gray-300 shadow-sm">
                    <p class="text-xs text-gray-500 mt-1">If you don't know the amount, contact us first for a quote.</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <label class="relative flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary-500">
                            <input type="radio" name="payment_method" value="Bank Transfer" {{ old('payment_method','Bank Transfer')=='Bank Transfer'?'checked':'' }} required class="payment-radio">
                            <div class="ml-3">
                                <span class="block font-medium">Bank Transfer</span>
                                <span class="block text-xs text-gray-500">Upload receipt</span>
                            </div>
                        </label>
                        <label class="relative flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary-500">
                            <input type="radio" name="payment_method" value="Paystack" {{ old('payment_method')=='Paystack'?'checked':'' }} class="payment-radio">
                            <div class="ml-3">
                                <span class="block font-medium">Paystack</span>
                                <span class="block text-xs text-yellow-600">Coming soon</span>
                            </div>
                        </label>
                        <label class="relative flex items-center p-4 border rounded-lg cursor-pointer hover:border-primary-500">
                            <input type="radio" name="payment_method" value="Flutterwave" {{ old('payment_method')=='Flutterwave'?'checked':'' }} class="payment-radio">
                            <div class="ml-3">
                                <span class="block font-medium">Flutterwave</span>
                                <span class="block text-xs text-yellow-600">Coming soon</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Bank transfer details -->
                <div id="bankDetails" class="bg-gray-50 rounded-lg p-4 mb-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Pay to:</h3>
                    @if($paymentMethods->isEmpty())
                        <p class="text-sm text-gray-600">Bank account details will be shared after submission. Or contact our support team.</p>
                    @else
                        @foreach($paymentMethods as $m)
                            <div class="mb-3 last:mb-0 pb-3 last:pb-0 border-b last:border-b-0">
                                <p class="font-medium">{{ $m->name }}</p>
                                @if(!empty($m->details))
                                    <pre class="text-sm text-gray-700 whitespace-pre-wrap font-sans">{{ $m->details }}</pre>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>

                <div id="proofField">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Payment Proof <span class="text-red-500">*</span></label>
                    <input type="file" name="proof" accept="image/*" class="w-full text-sm">
                    <p class="text-xs text-gray-500 mt-1">Screenshot of transfer. JPG / PNG, max 4MB.</p>
                </div>
            </div>

            <button type="submit" id="submitBtn" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-4 rounded-lg shadow-lg transition">
                <span id="submitText">Submit Booking</span>
                <span id="submitSpinner" class="hidden"><i class="fas fa-spinner fa-spin"></i> Submitting...</span>
            </button>
        </form>
    </div>
</div>

<script>
(function () {
    const radios   = document.querySelectorAll('.payment-radio');
    const bankBox  = document.getElementById('bankDetails');
    const proofBox = document.getElementById('proofField');

    function refresh() {
        const sel = document.querySelector('.payment-radio:checked');
        const isBank = sel && sel.value === 'Bank Transfer';
        bankBox.style.display  = isBank ? 'block' : 'none';
        proofBox.style.display = isBank ? 'block' : 'none';
    }
    radios.forEach(r => r.addEventListener('change', refresh));
    refresh();

    // Submit state
    document.getElementById('bookingForm').addEventListener('submit', function (e) {
        const btn = document.getElementById('submitBtn');
        document.getElementById('submitText').classList.add('hidden');
        document.getElementById('submitSpinner').classList.remove('hidden');
        btn.disabled = true;

        // Save tracking ID slot — we don't know the ID yet, so just record the timestamp.
        // The actual ID is captured on the success page.
    });
})();
</script>
@endsection