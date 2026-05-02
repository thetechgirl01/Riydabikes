@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Add Pricing Rule</h1>
                    <a href="{{ route('admin.pricing.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-4">
                    <form method="POST" action="{{ route('admin.pricing.store') }}">
                        @csrf
                        @include('admin.pricing._form', ['states' => $states])
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Save Rule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection