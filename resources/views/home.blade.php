@extends('layouts.default')

@section('style-page')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="header line-e"></div>

    <div class="row">
        <div class="card card-custom card-stretch gutter-b bg-light-info col-xl-8">
            <div class="card-title py-5">
                <h3 class="card-label">
                    <span class="d-block text-dark font-weight-bolder">List Reservasi di Tahun {{Carbon\Carbon::now()->format('Y')}}</span>
                </h3>
            </div>

            <div class="card-body">
                <!--begin: Search Form-->
                <form class="mb-15">
                    <div class="row mb-3">
                        <div class="col-lg-3 mb-lg-0 mb-12">
                            <label>Type Reservasi:</label>
                            <input type="text" class="form-control datatable-input" id="intansi" name="intansi" placeholder="Event" data-col-index="1" />
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-12">
                            <label>Name Pasien:</label>
                            <input type="text" class="form-control datatable-input" name="name_pelaksanaan" id="name_pelaksanaan" placeholder="Pespustakaan" data-col-index="2" />
                        </div>
                        <div class="col-lg-6 mb-lg-0 mb-12">
                            <label>Tanggal Reservasi:</label>
                            <div class="input-daterange input-group" id="kt_datepicker">
                                <input type="text" class="form-control datatable-input start_year" name="start_year" placeholder="From" data-col-index="3" />
                                <div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-ellipsis-h"></i>
															</span>
                                </div>
                                <input type="text" class="form-control datatable-input end_year" name="end_year" placeholder="To" data-col-index="3" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-8">
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-primary--icon" type="button" id="filter">
													<span>
														<i class="la la-search"></i>
														<span>Search</span>
													</span>
                            </button>&#160;&#160;
                            <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
													<span>
														<i class="la la-close"></i>
														<span>Reset</span>
													</span>
                            </button></div>
                    </div>
                </form>
                <!--begin: Datatable-->
            </div>

            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="dataTable">
                    <thead>
                    <tr>
                        <th>Nama Pemesanan</th>
                        <th>Intansi</th>
                        <th>Tanggal Booking</th>
                        <th>Waktu Booking</th>
                        <th>Kode Booking</th>
                        <th>Status</th>
                        <th>Created By</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nama Pemesanan</th>
                        <th>Intansi</th>
                        <th>Tanggal Booking</th>
                        <th>Waktu Booking</th>
                        <th>Kode Booking</th>
                        <th>Status</th>
                        <th>Created By</th>
                    </tr>
                    </tfoot>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-custom bg-light-success gutter-b card-stretch card-shadowless">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-success">List Reservasi Hari ini</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Item-->
{{--                    @forelse($booking_now as $key => $item)--}}
{{--                        <div class="d-flex align-items-center mb-10">--}}
{{--                            <!--begin::Symbol-->--}}
{{--                            <div class="symbol symbol-40 symbol-light-white mr-5">--}}
{{--                                <div class="symbol-label">--}}
{{--                                    <img src="assets/media/svg/avatars/004-boy-1.svg" class="h-75 align-self-end" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Symbol-->--}}
{{--                            <!--begin::Text-->--}}
{{--                            <div class="d-flex flex-column font-weight-bold">--}}
{{--                                <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{$item->nama_pemesan}}</a>--}}
{{--                                <span class="text-muted">{{$item->instansi}}</span>--}}
{{--                            </div>--}}
{{--                            <!--end::Text-->--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                    @endforelse--}}
                    <!--end::Item-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection

@section('script-page')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script type="text/javascript">
        "use strict";
        var KTDatatablesSearchOptionsAdvancedSearch = function() {

            $.fn.dataTable.Api.register('column().title()', function() {
                return $(this.header()).text().trim();
            });

            $.fn.dataTable.ext.errMode = 'none';

            var initTable1 = function() {
                // begin first table
                var table = $('#dataTable').DataTable({
                    responsive: true,
                    // Pagination settings
                    dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                    // read more: https://datatables.net/examples/basic_init/dom.html

                    lengthMenu: [5, 10, 25, 50],

                    pageLength: 10,

                    language: {
                        'lengthMenu': 'Display _MENU_',
                    },

                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '',
                        type: 'GET',
                        data: function (d) {
                            d.nama_pemesan = $('#nama_pemesan').val();
                            d.instansi = $('#instansi').val();
                            d.kode_booking = $('#kode_booking').val();
                            d.status    = $('#status').val();
                            d.no_induk    = $('#no_induk').val();
                            d.waktu_booking_start    = $('.waktu_booking_start').val();
                            d.waktu_booking_end    = $('.waktu_booking_end').val();
                            d.jam_booking    = $('.jam_booking').val();
                            d.created_by    = $('.created_by').val();
                        }
                    },

                    columns: [
                        {data : 'nama_pemesan' , name: 'nama_pemesan'},
                        {data : 'instansi' , name: 'instansi'},
                        {data : 'tanggal_pemesanan' , name: 'tanggal_pemesanan'},
                        {data : 'waktu_booking' , name: 'waktu_booking'},
                        {data : 'kode_booking' , name: 'kode_booking'},
                        {data : 'status_name' , name: 'status_name'},
                        {data : 'full_name' , name: 'full_name'}
                    ],
                });

                $('#filter').click(function(){
                    $('#dataTable').DataTable().draw(true);
                });

                $('#kt_search').on('click', function(e) {
                    e.preventDefault();
                    var params = {};
                    $('.datatable-input').each(function() {
                        var i = $(this).data('col-index');
                        if (params[i]) {
                            params[i] += '|' + $(this).val();
                        }
                        else {
                            params[i] = $(this).val();
                        }
                    });
                    $.each(params, function(i, val) {
                        // apply search params to datatable
                        table.column(i).search(val ? val : '', false, false);
                    });
                    table.table().draw();
                });

                $('#kt_reset').on('click', function(e) {
                    e.preventDefault();
                    $('.datatable-input').each(function() {
                        $(this).val('');
                        table.column($(this).data('col-index')).search('', false, false);
                    });
                    table.table().draw();
                });

                $('#kt_datepicker').datepicker({
                    todayHighlight: true,
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>',
                    },
                });

            };

            return {

                //main function to initiate the module
                init: function() {
                    initTable1();
                },

            };

        }();

        jQuery(document).ready(function() {
            KTDatatablesSearchOptionsAdvancedSearch.init();
        });
    </script>

    <script type="text/javascript">

        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        var isStatus;
        var isDate;

        $('.testing').click( function (e) {
            var isTitle = document.getElementById('isTitle');
            isTitle.innerText = `Status ${$(this).val()}`;
            $('.isTitle').val($(this).val())
            e.preventDefault();
        })

        $('.testing_1').click( function (e) {
            var isTitleBulan = document.getElementById('isTitleBulan');
            isTitleBulan.innerText = `Data  ${$(this).val()}`;
            $('.isTitleBulan').val($(this).val())
            e.preventDefault();
        })

        $('#changeMonth').click( function (e) {

        });
        $('#changeWeek').click( function (e) {
            isDate = document.getElementById('isDate');
            isDate.innerText = 'week';
            e.preventDefault();
        });
        $('#changeDay').click( function (e) {
            isDate = document.getElementById('isDate');
            isDate.innerText = 'day';
            e.preventDefault();
        });

        $('#changePending').click( function (e) {
            isStatus = document.getElementById('isStatus');
            isStatus.innerText = 'Pending';
            e.preventDefault();
        });
        $('#changeSuccess').click( function (e) {
            isStatus = document.getElementById('isStatus');
            isStatus.innerText = 'Success';
            e.preventDefault();
        });
        $('#changeReject').click( function (e) {
            isStatus = document.getElementById('isStatus');
            isStatus.innerText = 'Reject';
            e.preventDefault();
        });

        var KTApexCharts = function () {
            var is_chat = function () {
                const apexChart = "#is_chart";
                var options = {
                    series: [
                        {
                            name: '',
                            data: []
                        },
                        {
                            name: '',
                            data: []
                        },
                        {
                            name: '',
                            data: []
                        },
                        {
                            name: '',
                            data: []
                        },  {
                            name: '',
                            data: []
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {

                    },
                    yaxis: {
                        title: {
                            text: `Pelaksanaan `
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return `* ${val} `
                            }
                        }
                    },
                    colors: [primary, success, warning, info, danger]
                };
                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            return {
                // public functions
                init: function () {
                    is_chat();
                }
            };
        }();

        $(document).ready(function () {
            KTApexCharts.init();
        });


    </script>
@stop
