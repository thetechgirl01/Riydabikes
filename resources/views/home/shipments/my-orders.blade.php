@extends('layouts.base')

@section('title', 'My Orders')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">My Orders</h1>
        <p class="text-gray-600 mb-6">Orders booked from this device.</p>

        <div id="loading" class="bg-white p-8 rounded-lg shadow text-center text-gray-500">
            <i class="fas fa-spinner fa-spin"></i> Loading your orders...
        </div>

        <div id="empty" class="hidden bg-white p-8 rounded-lg shadow text-center">
            <p class="text-gray-600 mb-4">You haven't booked any deliveries from this device yet.</p>
            <a href="{{ route('home.shipments.create') }}" class="inline-block px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium">
                Book Your First Delivery
            </a>
        </div>

        <div id="orderList" class="hidden space-y-4"></div>
    </div>
</div>

<script>
(async function () {
    const ids = JSON.parse(localStorage.getItem('shyp_orders') || '[]');
    const loading = document.getElementById('loading');
    const empty   = document.getElementById('empty');
    const list    = document.getElementById('orderList');

    if (!ids.length) {
        loading.classList.add('hidden');
        empty.classList.remove('hidden');
        return;
    }

    try {
        const res = await fetch("{{ route('home.shipments.lookup') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ tracking_ids: ids })
        });
        const data = await res.json();
        loading.classList.add('hidden');

        if (!data.shipments || !data.shipments.length) {
            empty.classList.remove('hidden');
            return;
        }

        list.classList.remove('hidden');
        const statusColor = {
            'Order Confirmed': 'bg-blue-100 text-blue-800',
            'Picked by Courier': 'bg-indigo-100 text-indigo-800',
            'On The Way': 'bg-cyan-100 text-cyan-800',
            'Delivered': 'bg-green-100 text-green-800',
            'Pending Payment': 'bg-yellow-100 text-yellow-800',
        };

        list.innerHTML = data.shipments.map(s => `
            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <p class="text-xs text-gray-500">Tracking</p>
                        <p class="font-bold text-gray-900">${s.trackingnumber}</p>
                    </div>
                    <span class="px-2 py-1 rounded-full text-xs font-semibold ${statusColor[s.status] || 'bg-gray-100 text-gray-800'}">${s.status || 'Pending'}</span>
                </div>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div><span class="text-gray-500">From:</span> ${s.take_off_point || '—'}</div>
                    <div><span class="text-gray-500">To:</span> ${s.final_destination || '—'}</div>
                    <div><span class="text-gray-500">Sender:</span> ${s.sname || '—'}</div>
                    <div><span class="text-gray-500">Receiver:</span> ${s.name || '—'}</div>
                    <div><span class="text-gray-500">Amount:</span> ₦${Number(s.cost || 0).toLocaleString('en-NG', {minimumFractionDigits: 2})}</div>
                    <div><span class="text-gray-500">Payment:</span> ${s.payment_status || '—'}</div>
                </div>
            </div>
        `).join('');
    } catch (e) {
        loading.innerHTML = '<p class="text-red-600">Could not load orders. Please refresh.</p>';
    }
})();
</script>
@endsection