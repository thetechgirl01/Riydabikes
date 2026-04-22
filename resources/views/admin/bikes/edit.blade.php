@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <h1 class="title1">Edit Bike — {{ $bike->name }}</h1>
                    <a href="{{ route('admin.bikes.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="card p-3">
                    <form method="POST" action="{{ route('admin.bikes.update', $bike->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.bikes._form', ['bike' => $bike])
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Update Bike</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection