@extends('layouts.default')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/custom_dt_custom.css')}}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Data Master Baby Spa</h3>
            </div>
        </div>

        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive mb-4 style-1">
                            <table id="style-1" class="table style-1 table-hover non-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
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
@endsection

@section('script')
    <script src="{{asset('cork/plugins/table/datatable/datatables.js')}}"></script>
    @include('pages.master_data.baby_spa.component.script_js')
@endsection
