@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <h1 class="title1 mt-2 mb-4">Bike Purchases</h1>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-3">
                    <form method="GET" class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search by order #, name, email" value="{{ request('search') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <select name="status" class="form-control">
                                <option value="">All statuses</option>
                                @foreach(['Pending','Approved','Rejected','Cancelled'] as $s)
                                    <option value="{{ $s }}" {{ request('status')==$s ? 'selected':'' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Order #</th><th>Bike</th><th>Customer</th><th>Qty</th><th>Total</th><th>Status</th><th>Date</th><th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($purchases as $p)
                                    <tr>
                                        <td>{{ $p->order_no }}</td>
                                        <td>{{ $p->bike->name ?? '—' }}</td>
                                        <td>{{ $p->guest_name }}<br><small>{{ $p->guest_email }}</small></td>
                                        <td>{{ $p->quantity }}</td>
                                        <td>₦{{ number_format($p->total_amount, 2) }}</td>
                                        <td><span class="badge bg-{{ ['Approved'=>'success','Rejected'=>'danger','Cancelled'=>'secondary','Pending'=>'warning'][$p->status] ?? 'secondary' }}">{{ $p->status }}</span></td>
                                        <td>{{ $p->created_at->format('M d, Y') }}</td>
                                        <td><a href="{{ route('admin.bikes.purchase.view', $p->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" class="text-center py-4">No purchases yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $purchases->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection