@extends('layouts.app')

@section('title')
    {{ __('Create Campaign') }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Campaign</h4>
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('campaign.store') }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Campaign Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="campaign_name" autocomplete="off">
                                        @error('campaign_name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Campaign Start</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy"
                                            name="campaign_start" />
                                        @error('campaign_start')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Campaign Finish</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="date" placeholder="dd/mm/yyyy"
                                            name="campaign_finish" />
                                        @error('campaign_finish')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <a href="{{ route('campaign.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
