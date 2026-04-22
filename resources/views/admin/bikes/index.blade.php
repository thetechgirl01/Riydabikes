@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Manage Bikes</h1>
                    <a href="{{ route('admin.bikes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Bike</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Daily Rate</th>
                                    <th>Stock</th>
                                    <th>Active</th>
                                    <th>Hireable</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bikes as $bike)
                                    <tr>
                                        <td><img src="{{ $bike->image_url }}" alt="" style="width:60px;height:60px;object-fit:cover;border-radius:6px;"></td>
                                        <td>
                                            <strong>{{ $bike->name }}</strong><br>
                                            <small class="text-muted">{{ $bike->brand }}</small>
                                        </td>
                                        <td>₦{{ number_format($bike->price, 2) }}</td>
                                        <td>₦{{ number_format($bike->daily_rate, 2) }}</td>
                                        <td>{{ $bike->stock }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.bikes.toggle-active', $bike->id) }}" style="display:inline;">
                                                @csrf
                                                <button class="btn btn-sm {{ $bike->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    {{ $bike->is_active ? 'Active' : 'Hidden' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.bikes.toggle-hire', $bike->id) }}" style="display:inline;">
                                                @csrf
                                                <button class="btn btn-sm {{ $bike->available_for_hire ? 'btn-info' : 'btn-secondary' }}">
                                                    {{ $bike->available_for_hire ? 'ON' : 'OFF' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.bikes.edit', $bike->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('admin.bikes.destroy', $bike->id) }}" style="display:inline;"
                                                  onsubmit="return confirm('Delete this bike?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" class="text-center py-4">No bikes yet. Click "Add Bike" to get started.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $bikes->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection