@extends('layouts.app')

@section('title')
    {{ __('Sign In') }} | {{ config('app.name') }}
@endsection

@section('header')
    {{ __('Sign In to Account') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-2 mb-xl-0">
                <h3 class="font-weight-bold">Welcome Agent</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Open</p>
                        <p class="fs-30 mb-2">4006</p>
                        <p>10.00%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">On Progress</p>
                        <p class="fs-30 mb-2">61344</p>
                        <p>22.00%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Follow Up</p>
                        <p class="fs-30 mb-2">34040</p>
                        <p>2.00%</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Total</p>
                        <p class="fs-30 mb-2">47033</p>
                        <p>0.22%</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="map-default" class="map-canvas" data-lat="40.748817" data-lng="-73.985428"
            style="height: 600px;"></div>
    </div>
</div>
@endsection
