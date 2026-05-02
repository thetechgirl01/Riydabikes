<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <x-danger-alert />
                <x-success-alert />
                <!-- Beginning of  Dashboard Stats  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-3 card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <h1>Tracking Number: {{ $user->trackingnumber }}</h1>
                                        <h3 class="d-inline text-primary">Details of delivery from {{ $user->sname }} to {{ $user->name }}</h3><span></span>
                                        <div class="d-inline">
                                            <div class="float-right btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('manageusers') }}"> <i
                                                        class="fa fa-arrow-left"></i> back</a> &nbsp;
                                                <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                                    data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-lg-right">
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('loginactivity', $user->id) }}">Login Activity</a>
                                                    @if ($user->status == null || $user->status == 'blocked')
                                                        <a class="dropdown-item"
                                                            href="{{ url('admin/dashboard/uunblock') }}/{{ $user->id }}">Unblock</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ url('admin/dashboard/uublock') }}/{{ $user->id }}">Block</a>
                                                    @endif --}}
                                                    {{-- @if ($user->trade_mode == 'on')
                                                        <a class="dropdown-item"
                                                            href="{{ url('admin/dashboard/usertrademode') }}/{{ $user->id }}/off">Turn
                                                            off trade</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            href="{{ url('admin/dashboard/usertrademode') }}/{{ $user->id }}/on">Turn
                                                            on trade</a>
                                                    @endif --}}
                                                    {{-- @if ($user->email_verified_at)
                                                    @else
                                                        <a href="{{ url('admin/dashboard/email-verify') }}/{{ $user->id }}"
                                                            class="dropdown-item">Verify Email</a>
                                                    @endif --}}
                                                    {{-- <a href="#" data-toggle="modal" data-target="#topupModal"
                                                        class="dropdown-item">Credit/Debit</a> --}}
                                                        
                                                        {{-- <a href="#" data-toggle="modal" data-target="#Upgradeaccount"
                                            class="dropdown-item">Add Shipment Update
                                        </a> --}}
                                                         {{-- <a href="#" data-toggle="modal" data-target="#userTax"
                                                        class="dropdown-item">On/Off Tax </a> --}}
                                                        
                                                        
                                                     {{-- <a href="#" data-toggle="modal" data-target="#resetpswdModal"
                                                        class="dropdown-item">Reset Password</a>
                                                    <a href="#" data-toggle="modal" data-target="#clearacctModal"
                                                        class="dropdown-item">Clear Account</a> --}}
                                                    <a href="#" data-toggle="modal" data-target="#TradingModal"
                                                        class="dropdown-item">Add Delivery Update/History</a>
                                                    <a href="#" data-toggle="modal" data-target="#edituser"
                                                        class="dropdown-item">Edit Delivery</a>
                                                        <a href="{{ route('printnow', $user->id) }}"
                                                            class="dropdown-item">Print Invoice</a>
                                                
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#sendmailtooneuserModal" class="dropdown-item">Send
                                                        Email</a>
                                                    {{-- <a href="#" data-toggle="modal" data-target="#switchuserModal"
                                                        class="dropdown-item text-success">Login as {{ $user->name }}</a>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                        class="dropdown-item text-danger">Delete {{ $user->name }}</a> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 mt-4 border rounded row ">
                                    <div class="col-md-3">
                                        <h5 class="text-bold">Reciver's Name</h5>
                                        <h6  class='badge badge-secondary'>{{ $user->name }}
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Reciver's Email</h5>
                                        <h6  class='badge badge-secondary'>{{ $user->email }}</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Reciver's Address</h5>
                                        <h6  class='badge badge-secondary'>{{ $user->address }}</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Reciver's  Country</h5>
                                        <h6  class='badge badge-secondary'>{{ $user->country }}</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Delivery Type</h5>
                                       <p class='badge badge-secondary'> {{ $user->shipment_type }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5> Current Location</h5>
                                        <h6  class='badge badge-secondary'>{{ $user->location }}</h6>

                                    </div>
                                    <div class="col-md-3">
                                        <h5>Status</h5>
                                        @if ($user->status == 'Delivered')
                                                            <span class='badge badge-success'>{{ $user->status }}</span>
                                                        @elseif($user->status == 'Cancelled')
                                                            <span class='badge badge-danger'>{{ $user->status }}</span>
                                                            @else
                                                            <span class='badge badge-warning'>{{ $user->status }}</span>
                                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <h5> Delivery Date</h5>
                                        <h6 class='badge badge-secondary'>{{ \Carbon\Carbon::parse($user->expected_delivery)->toDayDateTimeString() }}</h6>
                                    </div>
                                </div>
                                <div class="mt-3 row ">
                                    <div class="col-md-12">
                                        <h1 text='text-primary'>Updated Tracking Information</h1>
                                    </div>
                                </div>



                     
                                <div class="card-body">
                                    <div class="table-responsive" data-example-id="hoverable-table">
                                        <table class="table table-hover themes/purposeTheme/assets/">
                                            <thead>
                                                <tr>
                                                    
                                                    
                                                    <th>Time updated</th>
                                                    <th>Current Location</th>
                                                    <th>Status</th>
                                                    <th>Comment</th>
                                                    <th>Delete History</th>
                                                </tr>
                                            </thead>
                                            <tbody id="userslisttbl">
    
                                                @forelse ($trackings as $tracking)
                                                    <tr>
                                                        
                                                        <td>
                                                            {{ $tracking->created_at->diffForHumans() }}
                                                        </td>
                                                       
                                                        <td>{{ $tracking->country }}|{{ $tracking->city}}</td>
                                                       
                                                        
                                                        <td>
                                                            @if ($tracking->status == 'Delivered')
                                                                <span class='badge badge-success'>{{ $tracking->status }}</span>
                                                            @elseif($tracking->status == 'Cancelled')
                                                                <span class='badge badge-danger'>{{ $tracking->status }}</span>
                                                                @else
                                                                <span class='badge badge-warning'>{{ $tracking->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $tracking->comment }}</td>
                                                        <td>
                                                            <a class='btn btn-danger btn-sm'
                                                                href="{{ route('delhistory', $tracking->id) }}" role='button'>
                                                               Delete
                                                           
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td colspan="9">
                                                        No  Updated History Shipment Available
                                                    </td>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           
                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>                   
        @include('admin.Users.users_actions')

    
    @endsection
