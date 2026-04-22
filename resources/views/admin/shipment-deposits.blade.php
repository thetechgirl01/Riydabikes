@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1">Manage Shipment Deposits</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <div class="mb-5 row">
                    <div class="col-12 card shadow p-4">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="ShipTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Client name</th>
                                        <th>Client email</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Date created</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposits as $deposit)
                                        <tr>
                                            <td>
                                                @if($deposit->user > 0)
                                                    {{ $deposit->name ?? 'N/A' }}
                                                @else
                                                    {{ $deposit->guest_name ?? 'Guest User' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($deposit->user > 0)
                                                    {{ $deposit->email ?? 'N/A' }}
                                                @else
                                                    {{ $deposit->guest_email ?? 'N/A' }}
                                                @endif
                                            </td>
                                            <td>{{ $settings->currency ?? '$' }}{{ number_format($deposit->amount) }}</td>
                                            <td>{{ $deposit->payment_mode }}</td>
                                            <td>
                                                @if ($deposit->status == 'Processed')
                                                    <span class="badge badge-success">{{ $deposit->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $deposit->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ date('M d, Y H:i:s', strtotime($deposit->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.view.deposit', $deposit->id) }}"
                                                    class="btn btn-primary btn-sm m-1" title="View deposit details">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                @if($deposit->proof)
                                                    <a href="{{ route('admin.view.depositimage', $deposit->id) }}"
                                                        class="btn btn-info btn-sm m-1" title="View payment screenshot">
                                                        <i class="fa fa-image"></i>
                                                    </a>
                                                @endif
                                                
                                                <a href="{{ route('admin.delete.deposit', $deposit->id) }}"
                                                    class="m-1 btn btn-danger btn-sm">Delete</a>

                                                @if ($deposit->status != 'Processed')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('admin.process.deposit', $deposit->id) }}">Process</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize ShipTable
        $('#ShipTable').DataTable({
            responsive: true,
            ordering: true,
            paging: true,
            searching: true,
            info: true,
            "language": {
                "emptyTable": "No deposits found",
                "zeroRecords": "No matching deposits found"
            }
        });
    });
</script>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize datepicker for date range
        $('#datepicker-range').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        
        // Initialize datatable
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
            "order": [[ 0, "desc" ]],
            "pageLength": 25,
            "language": {
                "paginate": {
                    "previous": "<i class='mdi mdi-chevron-left'>",
                    "next": "<i class='mdi mdi-chevron-right'>"
                }
            },
            "drawCallback": function () {
                $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                
                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            }
        });
        
        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        
        // Counter animation
        $('.counter-value').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-target');
            
            $({ countNum: 0 }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'swing',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    });
</script>
@endsection