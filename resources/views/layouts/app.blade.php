@extends('layouts.master')

@section('body')
    <body>
        <div class="container-scroller">
            @include('layouts.inc.navbar')
            <div class="container-fluid page-body-wrapper">
                @include('layouts.inc.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.
                                VADS <a href="https://www.bootstrapdash.com/" target="_blank">Admin</a> All rights
                                reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                                <i class="ti-heart text-danger ml-1"></i></span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        @include('layouts.inc.scripts')
    </body>
@endsection
