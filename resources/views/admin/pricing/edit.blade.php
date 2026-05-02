@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Edit Pricing Rule</h1>
                    <a href="{{ route('admin.pricing.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-4">
                    <form method="POST" action="{{ route('admin.pricing.update', $rule->id) }}">
                        @csrf @method('PUT')
                        @include('admin.pricing._form', ['rule' => $rule, 'states' => $states])
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Update Rule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection