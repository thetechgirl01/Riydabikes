@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <h1 class="title1 mt-2 mb-4">Bike Rentals</h1>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-3">
                    <form method="GET" class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search by rental #, name, email" value="{{ request('search') }}">
                        </div>
                        <div class="form-group col-md-3">
                            <select name="status" class="form-control">
                                <option value="">All statuses</option>
                                @foreach(['Pending','Approved','Active','Completed','Rejected','Cancelled'] as $s)
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
                                    <th>Rental #</th><th>Bike</th><th>Customer</th><th>Dates</th><th>Days</th><th>Total</th><th>Status</th><th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rentals as $r)
                                    <tr>
                                        <td>{{ $r->rental_no }}</td>
                                        <td>{{ $r->bike->name ?? '—' }}</td>
                                        <td>{{ $r->guest_name }}<br><small>{{ $r->guest_email }}</small></td>
                                        <td>{{ $r->start_date->format('M d') }} → {{ $r->end_date->format('M d, Y') }}</td>
                                        <td>{{ $r->total_days }}</td>
                                        <td>₦{{ number_format($r->total_amount, 2) }}</td>
                                        <td><span class="badge bg-{{ ['Approved'=>'success','Active'=>'info','Completed'=>'primary','Rejected'=>'danger','Cancelled'=>'secondary','Pending'=>'warning'][$r->status] ?? 'secondary' }}">{{ $r->status }}</span></td>
                                        <td><a href="{{ route('admin.bikes.rental.view', $r->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" class="text-center py-4">No rentals yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $rentals->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection