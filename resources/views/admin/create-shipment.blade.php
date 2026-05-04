@php
    if (Auth('admin')->User()->dashboard_style == 'light') {
        $text = 'dark'; $bg = 'light';
    } else {
        $text = 'light'; $bg = 'dark';
    }

    // Pull state list and pricing speed options the same way the user form does
    $states        = \App\Support\NigerianStates::all();
    $pricing       = \App\Models\DeliveryPricingSettings::current();
    $speedOptions  = $pricing->enabledSpeedOptions();
@endphp

@extends('layouts.app')

@section('content')
@include('admin.topmenu')
@include('admin.sidebar')

<div class="main-panel">
    <div class="content card">
        <div class="page-inner card-body">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-{{ $text }} text-center">Create New Delivery</h1>
            </div>
            <x-danger-alert />
            <x-success-alert />

            <div class="mb-5 row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card p-2 shadow">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="adminDeliveryForm" method="POST" action="{{ route('admin.shipments.store') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Hidden, server-required fields --}}
                                <input type="hidden" name="trackingnumber" value="{{ $trackingnumber ?? '' }}">
                                <input type="hidden" name="clearance_cost" value="0">

                                <div class="form-row">

                                    {{-- ---------- Sender ---------- --}}
                                    <div class="form-group col-md-12">
                                        <h2 class="text-{{ $text }}">Sender Information</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Sender Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="sname" value="{{ old('sname') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Sender Email</h6>
                                        <input type="email" class="form-control bg-{{ $bg }} text-{{ $text }}" name="sender_email" value="{{ old('sender_email') }}">
                                        <small class="text-muted">Optional. Used for sender notifications.</small>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Pickup Address <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" name="saddress" rows="2" required>{{ old('saddress') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Pickup State <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" id="origin_state" name="take_off_point" required>
                                            <option value="">— Select state —</option>
                                            @foreach($states as $st)
                                                <option value="{{ $st }}" {{ old('take_off_point') == $st ? 'selected' : '' }}>{{ $st }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- ---------- Receiver ---------- --}}
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-{{ $text }}">Receiver Information</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Receiver Name <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Receiver Email <span class="text-danger">*</span></h6>
                                        <input type="email" class="form-control bg-{{ $bg }} text-{{ $text }}" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Receiver Phone <span class="text-danger">*</span></h6>
                                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Delivery State <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" id="destination_state" name="final_destination" required>
                                            <option value="">— Select state —</option>
                                            @foreach($states as $st)
                                                <option value="{{ $st }}" {{ old('final_destination') == $st ? 'selected' : '' }}>{{ $st }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Delivery Address <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" name="address" rows="2" required>{{ old('address') }}</textarea>
                                    </div>

                                    {{-- ---------- Package ---------- --}}
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-{{ $text }}">Package Details</h2>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Description <span class="text-danger">*</span></h6>
                                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" name="description" rows="2" required>{{ old('description') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="text-{{ $text }}">Quantity <span class="text-danger">*</span></h6>
                                        <input type="number" min="1" class="form-control bg-{{ $bg }} text-{{ $text }}" name="qty" value="{{ old('qty', 1) }}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="text-{{ $text }}">Weight (kg)</h6>
                                        <input type="number" step="0.1" min="0" id="weight_kg" class="form-control bg-{{ $bg }} text-{{ $text }}" name="weight" value="{{ old('weight', 0) }}">
                                        <small class="text-muted">First {{ $pricing->free_weight_kg }}kg free, then ₦{{ number_format($pricing->per_kg_rate, 0) }}/kg.</small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h6 class="text-{{ $text }}">Package Photo</h6>
                                        <input type="file" class="form-control bg-{{ $bg }} text-{{ $text }}" name="photo" accept="image/*">
                                    </div>

                                    {{-- ---------- Service ---------- --}}
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-{{ $text }}">Service & Schedule</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Delivery Speed <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" id="freight_type" name="freight_type" required>
                                            <option value="">— Select —</option>
                                            @foreach($speedOptions as $name => $multiplier)
                                                <option value="{{ $name }}" {{ old('freight_type') == $name ? 'selected' : '' }}>
                                                    {{ $name }}@if($multiplier != 1) (×{{ rtrim(rtrim(number_format($multiplier, 2), '0'), '.') }})@endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Pickup Date <span class="text-danger">*</span></h6>
                                        <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" name="date_shipped" value="{{ old('date_shipped') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Expected Delivery Date <span class="text-danger">*</span></h6>
                                        <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" name="expected_delivery" value="{{ old('expected_delivery') }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }}">Status</h6>
                                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" name="status" required>
                                            @foreach(['Delivery Created','Pickup Scheduled','Rider Assigned','Picked Up','In Transit','Arrived at Hub','Out for Delivery','Delivered','Delivery Delayed','Delivery Failed','Returned','Pending Payment','Payment Received'] as $st)
                                                <option value="{{ $st }}" {{ old('status', 'Delivery Created') == $st ? 'selected' : '' }}>{{ $st }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- ---------- Pricing ---------- --}}
                                    <div class="form-group col-md-12 mt-3">
                                        <h2 class="text-{{ $text }}">Pricing</h2>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div id="quote-box" class="p-3 rounded" style="background:#f0f9ff; border:1px solid #bae6fd;">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:#64748b;">Auto-calculated Quote</div>
                                                    <div id="quote-total" style="font-size:24px; font-weight:bold; color:#0369a1;">— —</div>
                                                    <div id="quote-breakdown" style="font-size:12px; color:#64748b; display:none;"></div>
                                                </div>
                                                <button type="button" id="applyQuoteBtn" class="btn btn-sm btn-info" disabled>
                                                    <i class="fa fa-magic"></i> Use this price
                                                </button>
                                            </div>
                                            <div id="quote-hint" class="mt-2" style="font-size:12px; color:#64748b;">
                                                Pick pickup state, delivery state and delivery speed to see the price.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="overrideToggle">
                                            <label class="custom-control-label text-{{ $text }}" for="overrideToggle">
                                                <strong>Override price manually</strong>
                                                <small class="text-muted d-block">Check this to type a custom delivery fee instead of using the auto-calculated quote.</small>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }} text-danger">Delivery Fee <span class="text-danger">*</span></h6>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-{{ $bg }} text-{{ $text }}">{{ $settings->s_currency ?? '₦' }}</span>
                                            </div>
                                            <input type="number" step="0.01" min="0" class="form-control bg-{{ $bg }} text-{{ $text }}" id="cost" name="cost" value="{{ old('cost', 0) }}" required readonly>
                                        </div>
                                        <small class="text-muted" id="cost-help">Filled automatically. Tick "Override" to edit.</small>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h6 class="text-{{ $text }} text-danger">Payment Status <span class="text-danger">*</span></h6>
                                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" name="payment_status" required>
                                            <option value="Unpaid" {{ old('payment_status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                            <option value="Paid" {{ old('payment_status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <h6 class="text-{{ $text }}">Delivery Progress (%)</h6>
                                        <input type="number" min="0" max="100" class="form-control bg-{{ $bg }} text-{{ $text }}" name="percentage_complete" value="{{ old('percentage_complete', 0) }}">
                                    </div>

                                    <div class="form-group col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save mr-1"></i> Create Delivery
                                        </button>
                                        <a href="{{ route('admin.shipments') }}" class="btn btn-secondary ml-2">
                                            <i class="fas fa-times mr-1"></i> Cancel
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
$(document).ready(function () {
    const origin    = document.getElementById('origin_state');
    const dest      = document.getElementById('destination_state');
    const weight    = document.getElementById('weight_kg');
    const speed     = document.getElementById('freight_type');
    const cost      = document.getElementById('cost');
    const costHelp  = document.getElementById('cost-help');
    const totalEl   = document.getElementById('quote-total');
    const hintEl    = document.getElementById('quote-hint');
    const breakdown = document.getElementById('quote-breakdown');
    const applyBtn  = document.getElementById('applyQuoteBtn');
    const override  = document.getElementById('overrideToggle');

    let lastQuote = null;
    let quoteTimer;

    const fmt = n => '₦' + Number(n).toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    async function fetchQuote() {
        if (!origin.value || !dest.value || !speed.value) {
            totalEl.textContent = '— —';
            hintEl.style.display = 'block';
            breakdown.style.display = 'none';
            applyBtn.disabled = true;
            lastQuote = null;
            return;
        }
        try {
            const res = await fetch("{{ route('home.shipments.quote') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    take_off_point: origin.value,
                    final_destination: dest.value,
                    weight_kg: parseFloat(weight.value || 0),
                    freight_type: speed.value,
                }),
            });
            const q = await res.json();

            lastQuote = q.total;
            totalEl.textContent = fmt(q.total);
            hintEl.style.display = 'none';
            breakdown.style.display = 'block';
            const parts = [];
            parts.push('Base ' + fmt(q.base_fare));
            if (q.weight_charge > 0) parts.push('+ ' + fmt(q.weight_charge) + ' weight');
            if (q.multiplier !== 1) parts.push('× ' + q.multiplier + ' (' + q.speed + ')');
            breakdown.textContent = parts.join(' · ');
            applyBtn.disabled = false;

            // If admin hasn't overridden, auto-fill cost
            if (!override.checked) {
                cost.value = q.total;
            }
        } catch (e) {
            totalEl.textContent = 'Error';
            hintEl.textContent = 'Could not fetch quote.';
            hintEl.style.display = 'block';
            applyBtn.disabled = true;
        }
    }

    function debouncedQuote() {
        clearTimeout(quoteTimer);
        quoteTimer = setTimeout(fetchQuote, 250);
    }

    [origin, dest, speed].forEach(el => el.addEventListener('change', fetchQuote));
    weight.addEventListener('input', debouncedQuote);

    // Apply quote button — copies the quoted total into the cost field
    applyBtn.addEventListener('click', function () {
        if (lastQuote !== null) {
            cost.value = lastQuote;
            // visual flash
            cost.style.background = '#d1fae5';
            setTimeout(() => cost.style.background = '', 600);
        }
    });

    // Override toggle — unlocks the cost field
    override.addEventListener('change', function () {
        if (override.checked) {
            cost.removeAttribute('readonly');
            cost.focus();
            costHelp.textContent = 'Editing manually — auto-quote changes won\'t update this.';
            costHelp.style.color = '#dc2626';
        } else {
            cost.setAttribute('readonly', 'readonly');
            costHelp.textContent = 'Filled automatically. Tick "Override" to edit.';
            costHelp.style.color = '';
            // Re-fill from latest quote
            if (lastQuote !== null) cost.value = lastQuote;
        }
    });

    // Initial quote attempt (fires if old() values populated all inputs)
    fetchQuote();
});
</script>
@endsection