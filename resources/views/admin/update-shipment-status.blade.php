@php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
@endphp
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content card">
            <div class="page-inner card-body">
                <div class="mt-2 mb-4">
                    <h1 class="title1 text-{{ $text }} text-center">Update Shipment Status</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card p-2 shadow">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="row">
                                    <!-- Shipment Information -->
                                    <div class="col-md-4">
                                        <div class="card shadow">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">Shipment Information</h5>
                                            </div>
                                            <div class="card-body bg-{{ $bg }} text-{{ $text }}">
                                                <div class="mb-3 text-center">
                                                    <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $shipment->trackingnumber }}&code=Code128" alt="{{ $shipment->trackingnumber }}" class="img-fluid">
                                                    <div class="mt-2 font-weight-bold">{{ $shipment->trackingnumber }}</div>
                                                </div>

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th class="text-{{ $text }}">Status</th>
                                                        <td>
                                                            @if ($shipment->status == 'Delivered')
                                                                <span class="badge badge-success">{{ $shipment->status }}</span>
                                                            @elseif ($shipment->status == 'Custom Hold')
                                                                <span class="badge badge-warning">{{ $shipment->status }}</span>
                                                            @else
                                                                <span class="badge badge-info">{{ $shipment->status }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-{{ $text }}">Sender</th>
                                                        <td class="text-{{ $text }}">{{ $shipment->sname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-{{ $text }}">Receiver</th>
                                                        <td class="text-{{ $text }}">{{ $shipment->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-{{ $text }}">Origin</th>
                                                        <td class="text-{{ $text }}">{{ $shipment->take_off_point }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-{{ $text }}">Destination</th>
                                                        <td class="text-{{ $text }}">{{ $shipment->final_destination }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-{{ $text }}">Created</th>
                                                        <td class="text-{{ $text }}">{{ \Carbon\Carbon::parse($shipment->created_at)->toDayDateTimeString() }}</td>
                                                    </tr>
                                                </table>

                                                <div class="mt-3">
                                                    <a href="{{ route('admin.shipments.view', $shipment->id) }}" class="btn btn-info btn-block">
                                                        <i class="fa fa-eye mr-1"></i> View Complete Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <!-- Update Status Form -->
                        <div class="col-md-8">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Update Status</h5>
                                </div>
                                <div class="card-body bg-{{ $bg }} text-{{ $text }}">
                                    <form method="POST" action="{{ route('admin.shipments.update-status') }}">
                                        @csrf
                                        <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">

                                        <div class="form-group mb-4">
                                            <h6 class="text-{{ $text }}">New Status <span class="text-danger">*</span></h6>
                                            <select class="form-control bg-{{ $bg }} text-{{ $text }}" id="status" name="status" required>
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="Order Confirmed" {{ old('status') == 'Order Confirmed' ? 'selected' : '' }}>Order Confirmed</option>
                                                <option value="Picked by Courier" {{ old('status') == 'Picked by Courier' ? 'selected' : '' }}>Picked by Courier</option>
                                                <option value="Security Checking" {{ old('status') == 'Security Checking' ? 'selected' : '' }}>Security Checking</option>
                                                <option value="Border Check" {{ old('status') == 'Border Check' ? 'selected' : '' }}>Border Check</option>
                                                <option value="Missing Document" {{ old('status') == 'Missing Document' ? 'selected' : '' }}>Missing Document</option>
                                                <option value="On The Way" {{ old('status') == 'On The Way' ? 'selected' : '' }}>On The Way</option>
                                                <option value="Custom Hold" {{ old('status') == 'Custom Hold' ? 'selected' : '' }}>Custom Hold</option>
                                                <option value="Pending Payment" {{ old('status') == 'Pending Payment' ? 'selected' : '' }}>Pending Payment</option>
                                                <option value="Payment Received" {{ old('status') == 'Payment Received' ? 'selected' : '' }}>Payment Received</option>
                                                <option value="Additional Fee Applied" {{ old('status') == 'Additional Fee Applied' ? 'selected' : '' }}>Additional Fee Applied</option>
                                                <option value="Money Laundering" {{ old('status') == 'Money Laundering' ? 'selected' : '' }}>Money Laundering</option>
                                                <option value="Delivered" {{ old('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-4">
                                            <h6 class="text-{{ $text }}">Current Location <span class="text-danger">*</span></h6>
                                            <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="location" name="location" value="{{ old('location') }}" required>
                                            <small class="text-muted">Enter the current location of the shipment</small>
                                        </div>

                                        <div class="form-group mb-4">
                                            <h6 class="text-{{ $text }}">Comment/Details <span class="text-danger">*</span></h6>
                                            <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" id="comment" name="comment" rows="4" required>{{ old('comment') }}</textarea>
                                            <small class="text-muted">Provide details about the status update (will be visible to the customer)</small>
                                        </div>

                                        <div class="form-group mb-4">
                                            <h6 class="text-{{ $text }}">Status Update Date & Time</h6>
                                            <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" id="status_datetime" name="status_datetime" value="{{ old('status_datetime', now()->format('Y-m-d\TH:i')) }}">
                                            <small class="text-muted">Leave blank to use current date/time, or select a past date to backdate this status update</small>
                                        </div>

                                        <div class="custom-control custom-checkbox mb-4">
                                            <input type="checkbox" class="custom-control-input" id="notify_customer" name="notify_customer" value="1" checked>
                                            <label class="custom-control-label text-{{ $text }}" for="notify_customer">Send email notification to customer</label>
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-paper-plane mr-1"></i> Update Status
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Status History -->
                            <div class="card shadow mt-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Status History</h5>
                                </div>
                                <div class="card-body p-0 bg-{{ $bg }} text-{{ $text }}">
                                    <div class="timeline">
                                        @forelse($tracks as $track)
                                            <div class="timeline-item" id="track-{{ $track->id }}">
                                                <div class="timeline-marker bg-{{
                                                    $track->status == 'Delivered' ? 'success' :
                                                    ($track->status == 'Custom Hold' ? 'warning' : 'info')
                                                }}"></div>
                                                <div class="timeline-content">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h5 class="text-{{ $text }}">{{ $track->status }}</h5>
                                                            <p class="text-muted mb-2">
                                                                <i class="fa fa-map-marker-alt mr-1"></i> {{ $track->address }}
                                                                <span class="ml-3">
                                                                    <i class="fa fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($track->created_at)->format('M d, Y - h:i A') }}
                                                                </span>
                                                            </p>
                                                            <p class="text-{{ $text }}">{{ $track->comment }}</p>
                                                        </div>
                                                        <div class="track-actions">
                                                            <button type="button" class="btn btn-sm btn-info mr-1" onclick="editTrack({{ $track->id }}, {{ json_encode($track->status) }}, {{ json_encode($track->address) }}, {{ json_encode($track->comment) }}, {{ json_encode($track->created_at) }})">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleteTrack({{ $track->id }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center p-4">
                                                <p class="text-{{ $text }}">No status updates yet</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 20px;
    }

    .timeline-marker {
        position: absolute;
        left: 0;
        top: 0;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }

    .timeline-content {
        position: relative;
        padding-bottom: 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .timeline-item:last-child .timeline-content {
        border-bottom: none;
    }

    .track-actions {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .timeline-item:hover .track-actions {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .track-actions {
            opacity: 1;
        }
    }
</style>

<!-- Edit Track Modal -->
<div class="modal fade" id="editTrackModal" tabindex="-1" role="dialog" aria-labelledby="editTrackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-{{ $bg }}">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editTrackModalLabel">Edit Track Record</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editTrackForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_status" class="text-{{ $text }}">Status <span class="text-danger">*</span></label>
                        <select class="form-control bg-{{ $bg }} text-{{ $text }}" id="edit_status" name="status" required>
                            <option value="Order Confirmed">Order Confirmed</option>
                            <option value="Picked by Courier">Picked by Courier</option>
                            <option value="Security Checking">Security Checking</option>
                            <option value="Border Check">Border Check</option>
                            <option value="Missing Document">Missing Document</option>
                            <option value="On The Way">On The Way</option>
                            <option value="Custom Hold">Custom Hold</option>
                            <option value="Pending Payment">Pending Payment</option>
                            <option value="Payment Received">Payment Received</option>
                            <option value="Additional Fee Applied">Additional Fee Applied</option>
                            <option value="Money Laundering">Money Laundering</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_address" class="text-{{ $text }}">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-{{ $bg }} text-{{ $text }}" id="edit_address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_comment" class="text-{{ $text }}">Comment <span class="text-danger">*</span></label>
                        <textarea class="form-control bg-{{ $bg }} text-{{ $text }}" id="edit_comment" name="comment" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_track_datetime" class="text-{{ $text }}">Date & Time</label>
                        <input type="datetime-local" class="form-control bg-{{ $bg }} text-{{ $text }}" id="edit_track_datetime" name="track_datetime">
                        <small class="text-muted">Leave blank to keep current date/time</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save mr-1"></i> Update Track Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let currentTrackId = null;

// Set up CSRF token for AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function editTrack(id, status, address, comment, createdAt) {
    currentTrackId = id;

    // Populate the form
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_address').value = address;
    document.getElementById('edit_comment').value = comment;

    // Convert created_at to datetime-local format
    if (createdAt) {
        const date = new Date(createdAt);
        const localDateTime = new Date(date.getTime() - (date.getTimezoneOffset() * 60000)).toISOString().slice(0, 16);
        document.getElementById('edit_track_datetime').value = localDateTime;
    }

    // Show the modal
    $('#editTrackModal').modal('show');
}

function deleteTrack(id) {
    if (confirm('Are you sure you want to delete this track record? This action cannot be undone.')) {
        $.ajax({
            url: `/admin/shipments/track/${id}`,
            type: 'DELETE',
            success: function(response) {
                if (response.success) {
                    // Remove the track item from the DOM
                    $(`#track-${id}`).fadeOut(300, function() {
                        $(this).remove();

                        // Check if this was the last track item
                        if ($('.timeline-item').length === 0) {
                            $('.timeline').html('<div class="text-center p-4"><p class="text-{{ $text }}">No status updates yet</p></div>');
                        }
                    });

                    // Show success message
                    showAlert('success', response.message);
                } else {
                    showAlert('error', response.message);
                }
            },
            error: function(xhr) {
                const response = JSON.parse(xhr.responseText);
                showAlert('error', response.message || 'Error deleting track record');
            }
        });
    }
}

// Handle edit form submission
document.getElementById('editTrackForm').addEventListener('submit', function(e) {
    e.preventDefault();

    if (!currentTrackId) return;

    const formData = new FormData(this);

    $.ajax({
        url: `/admin/shipments/track/${currentTrackId}`,
        type: 'PUT',
        data: Object.fromEntries(formData),
        success: function(response) {
            if (response.success) {
                // Close the modal
                $('#editTrackModal').modal('hide');

                // Show success message and reload page to reflect changes
                showAlert('success', response.message);

                // Reload the page after a short delay
                setTimeout(function() {
                    window.location.reload();
                }, 1500);
            } else {
                showAlert('error', response.message);
            }
        },
        error: function(xhr) {
            let response;
            try {
                response = JSON.parse(xhr.responseText);
            } catch(e) {
                response = {message: 'An error occurred'};
            }

            if (xhr.status === 422 && response.errors) {
                let errorMessages = [];
                for (let field in response.errors) {
                    errorMessages.push(...response.errors[field]);
                }
                showAlert('error', errorMessages.join('<br>'));
            } else {
                showAlert('error', response.message || 'Error updating track record');
            }
        }
    });
});

function showAlert(type, message) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';

    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="fa ${icon} mr-2"></i>
            ${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

    // Remove existing alerts
    $('.alert').remove();

    // Add new alert at the top of the page
    $('.page-inner').prepend(alertHtml);

    // Auto-hide after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 5000);
}

// Clear the modal when it's hidden
$('#editTrackModal').on('hidden.bs.modal', function() {
    currentTrackId = null;
    document.getElementById('editTrackForm').reset();
});
</script>

@endsection
