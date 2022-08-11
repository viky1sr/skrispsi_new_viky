@extends('layouts.default')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/custom_dt_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/sweetalerts/sweetalert.css')}}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>List Pembayaran</h3>
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
                                    <th>Type</th>
                                    <th>Reservasi</th>
                                    <th>Harga</th>
                                    <th>Total Pertemuan</th>
                                    <th>Total Harga</th>
                                    <th>Nilai Pembayaran</th>
                                    <th>Tanggal Reservasi</th>
                                    <th class="text-center">Pembayaran Reservasi</th>
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


    <div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  id="updateStatusForm" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Pilih Status</label>
                                <select name="status_id" class="form-control select2 resRepeat">
                                    <option value="">-- Select Status --</option>
                                    <option value="0">Reject</option>
                                    <option value="2">On Progress</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary submitStatus">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('cork/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('cork/plugins/sweetalerts/sweetalert.js')}}"></script>
    @include('pages.payment.component.script_js')
@endsection
