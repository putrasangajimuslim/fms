@extends('layouts.app')

@section('title')
    {{ __('Edit Customer') }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Customer</h4>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Customer Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $customer->name }}">
                                        @error('name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Address</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="address" id="address"
                                            value="{{ $customer->address }}" />
                                        @error('address')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Phone Number</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="phone_number" id="phone_number"
                                            value="{{ $customer->phone_number }}" />
                                        @error('phone_number')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <a href="{{ route('customer.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
