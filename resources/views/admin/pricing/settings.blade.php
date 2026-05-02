@php
    $theme = $theme ?? (\App\Models\Settings::find(1)->website_theme ?? 'green.css');
@endphp

@extends('layouts.app')
@section('content')
   
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Pricing Settings</h1>
                    <a href="{{ route('admin.pricing.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back to Rules</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <form method="POST" action="{{ route('admin.pricing.settings.update') }}">
                    @csrf

                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><i class="fa fa-money-bill"></i> Base Pricing</h4>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6>Minimum Fee (₦)</h6>
                                <input type="number" step="0.01" min="0" name="minimum_fee" class="form-control" value="{{ $settings->minimum_fee }}" required>
                                <small class="text-muted">No quote will go below this.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Default Fare When No Rule (₦)</h6>
                                <input type="number" step="0.01" min="0" name="default_fare_when_no_rule" class="form-control" value="{{ $settings->default_fare_when_no_rule }}" required>
                                <small class="text-muted">Used when an origin/destination pair has no rule.</small>
                            </div>
                        </div>
                    </div>

                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><i class="fa fa-weight-hanging"></i> Weight Pricing</h4>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <h6>Free Weight (kg)</h6>
                                <input type="number" step="0.01" min="0" name="free_weight_kg" class="form-control" value="{{ $settings->free_weight_kg }}" required>
                                <small class="text-muted">Weight up to this is included; surcharge applies above it.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Per-kg Rate (₦)</h6>
                                <input type="number" step="0.01" min="0" name="per_kg_rate" class="form-control" value="{{ $settings->per_kg_rate }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="card p-4 mb-3">
                        <h4 class="mb-3"><i class="fa fa-tachometer-alt"></i> Delivery Speed Multipliers</h4>
                        <p class="text-muted small">1.0 = base price; 2.0 = double; etc. Uncheck to hide an option from customers.</p>
                        <div class="form-row">
                            @foreach([
                                'standard' => 'Standard',
                                'next_day' => 'Next Day',
                                'same_day' => 'Same Day',
                                'express'  => 'Express',
                            ] as $key => $label)
                                <div class="form-group col-md-6">
                                    <h6>{{ $label }}</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <input type="hidden" name="enable_{{ $key }}" value="0">
                                                <input type="checkbox" name="enable_{{ $key }}" value="1" {{ $settings->{'enable_'.$key} ? 'checked' : '' }}>
                                            </span>
                                        </div>
                                        <input type="number" step="0.01" min="0.1" max="10" name="speed_{{ $key }}" class="form-control" value="{{ $settings->{'speed_'.$key} }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">×</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save Settings</button>
                </form>
            </div>
        </div>
    </div>
@endsection