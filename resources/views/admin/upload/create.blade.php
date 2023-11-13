@extends('layouts.app')

@section('title')
    {{ __('Upload Data') }} | {{ config('app.name') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload Data</h4>
                    <form action="/customer/upload" method="POST" enctype="multipart/form-data" class="forms-sample">
                        {{-- @method('PUT') --}}
                        @csrf
                        <div class="form-group">
                            <label>Campaign</label>
                            <div class="input-group col-xs-12">
                                <select class="js-example-basic-single w-100 select2-hidden-accessible" data-select2-id="1"
                                    tabindex="-1" aria-hidden="true" required>
                                    @foreach ($campaigns as $campaign)
                                        <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="file" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload File">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                        <a href="{{ route('customer.index') }}"  class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
