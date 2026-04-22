@extends('layouts.base')

@section('title', 'Hire '.$bike->name)

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <nav class="mb-6 text-sm">
            <a href="{{ route('home.bikes.show', $bike->slug) }}" class="text-blue-600 hover:underline dark:text-blue-400">← Back to {{ $bike->name }}</a>
        </nav>

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Hire — {{ $bike->name }}</h1>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 dark:bg-red-900/30">
                <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300">
                    @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 dark:bg-red-900/30">
                <p class="text-sm text-red-700 dark:text-red-300">{{ session('error') }}</p>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/40 border-b dark:border-gray-700">
                <div class="flex items-center gap-4">
                    <img src="{{ $bike->image_url }}" alt="{{ $bike->name }}" class="w-20 h-20 object-cover rounded-md">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $bike->name }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">₦{{ number_format($bike->daily_rate, 2) }} per day</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('home.bikes.hire.store', $bike->slug) }}" enctype="multipart/form-data" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Date</label>
                        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" min="{{ \Carbon\Carbon::today()->toDateString() }}" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Date</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" min="{{ \Carbon\Carbon::today()->toDateString() }}" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                </div>

                <!-- Live quote box -->
                <div id="quote-box" class="hidden rounded-md p-4 border"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                        <input type="text" name="guest_name" value="{{ old('guest_name') }}" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="guest_email" value="{{ old('guest_email') }}" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                        <input type="text" name="guest_phone" value="{{ old('guest_phone') }}" required
                               class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Payment Method</label>
                        <select name="payment_method" required
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                            <option value="">— select —</option>
                            @foreach($dmethods as $m)
                                <option value="{{ $m->name }}" {{ old('payment_method') == $m->name ? 'selected' : '' }}>{{ $m->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pickup Address (optional)</label>
                    <textarea name="pickup_address" rows="2"
                              class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">{{ old('pickup_address') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Upload Payment Proof</label>
                    <input type="file" name="proof" accept="image/*" required class="w-full text-sm text-gray-700 dark:text-gray-300">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Screenshot of transfer. JPG / PNG, max 4MB.</p>
                </div>

                <button type="submit" id="submit-btn" class="w-full inline-flex justify-center items-center px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md font-medium transition disabled:opacity-50 disabled:cursor-not-allowed">
                    Confirm Hire
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    (function () {
        const start = document.getElementById('start_date');
        const end   = document.getElementById('end_date');
        const box   = document.getElementById('quote-box');
        const btn   = document.getElementById('submit-btn');
        const url   = "{{ route('home.bikes.hire.quote', $bike->slug) }}";
        const token = "{{ csrf_token() }}";

        async function quote() {
            if (!start.value || !end.value) { box.classList.add('hidden'); return; }
            if (new Date(end.value) < new Date(start.value)) { box.classList.add('hidden'); return; }

            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
                    body: JSON.stringify({ start_date: start.value, end_date: end.value })
                });
                const data = await res.json();
                box.classList.remove('hidden');

                if (!data.available) {
                    box.className = 'rounded-md p-4 border border-red-300 bg-red-50 text-red-800 dark:bg-red-900/30 dark:text-red-300 dark:border-red-700';
                    box.innerHTML = '<strong>Not available.</strong> This bike is already booked for some of those dates.';
                    btn.disabled = true;
                } else {
                    box.className = 'rounded-md p-4 border border-green-300 bg-green-50 text-green-900 dark:bg-green-900/30 dark:text-green-300 dark:border-green-700';
                    box.innerHTML = `<div class="flex justify-between text-sm"><span>${data.total_days} day${data.total_days>1?'s':''} × ₦${Number(data.daily_rate).toLocaleString('en-NG',{minimumFractionDigits:2})}</span><span class="font-bold text-lg">₦${Number(data.total_amount).toLocaleString('en-NG',{minimumFractionDigits:2})}</span></div>`;
                    btn.disabled = false;
                }
            } catch (e) {
                box.classList.add('hidden');
            }
        }
        start.addEventListener('change', quote);
        end.addEventListener('change', quote);
        if (start.value && end.value) quote();
    })();
</script>
@endsection