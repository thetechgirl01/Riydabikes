@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Delivery Pricing Rules</h1>
                    <div>
                        <a href="{{ route('admin.pricing.settings') }}" class="btn btn-secondary"><i class="fa fa-cog"></i> Settings</a>
                        <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Rule</a>
                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-3 mb-3">
                    <small class="text-muted">
                        Rules below define the <strong>base fare</strong> for each origin → destination pair.
                        Weight surcharge (₦{{ number_format($settings->per_kg_rate, 2) }}/kg above {{ $settings->free_weight_kg }}kg)
                        and speed multipliers are applied on top automatically. Minimum fee: ₦{{ number_format($settings->minimum_fee, 2) }}.
                        Pairs without a rule fall back to ₦{{ number_format($settings->default_fare_when_no_rule, 2) }}.
                    </small>
                </div>

                <div class="card p-3">
                    <form method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search states..." value="{{ request('search') }}">
                        <button class="btn btn-primary">Filter</button>
                        @if(request('search'))
                            <a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary ml-2">Clear</a>
                        @endif
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Base Fare</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rules as $rule)
                                    <tr>
                                        <td><strong>{{ $rule->origin_state }}</strong></td>
                                        <td>{{ $rule->destination_state }}</td>
                                        <td>₦{{ number_format($rule->base_fare, 2) }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.pricing.toggle', $rule->id) }}" style="display:inline;">
                                                @csrf
                                                <button class="btn btn-sm {{ $rule->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    {{ $rule->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td><small class="text-muted">{{ Str::limit($rule->notes, 40) }}</small></td>
                                        <td>
                                            <a href="{{ route('admin.pricing.edit', $rule->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('admin.pricing.destroy', $rule->id) }}" style="display:inline;" onsubmit="return confirm('Delete this rule?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center py-4">No pricing rules yet. Click "Add Rule" to get started.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $rules->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection