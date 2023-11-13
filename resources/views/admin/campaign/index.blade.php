@extends('layouts.app')

@section('title')
    {{ __('Campaign') }} | {{ config('app.name') }}
@endsection

@section('style')
    <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('campaign.create') }}" type="button" class="btn btn-primary btn-icon-text mb-2">
                        <i class="ti-plus btn-icon-prepend"></i>
                        New Campaign
                    </a>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>Campaign Name</th>
                                            <th>Campaign Start</th>
                                            <th>Campaign Finish</th>
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouts.inc.modal.delete', ['object' => 'data'])
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/form/validation.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('campaign.index') }}",
                columns: [
                    // {
                    //     data: 'id',
                    //     name: 'id',
                    // },
                    {
                        data: 'campaign_name',
                        name: 'campaign_name',
                        orderable: false,
                    },
                    {
                        data: 'campaign_start',
                        name: 'campaign_start',
                        orderable: false,
                    },
                    {
                        data: 'campaign_finish',
                        name: 'campaign_finish',
                        orderable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
