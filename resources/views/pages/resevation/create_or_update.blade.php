@extends('layouts.default')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/table/datatable/custom_dt_custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/select2/select2.min.css')}}">
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Create Resevation</h3>
            </div>
        </div>

        <div class="row layout-spacing">
            <div class="col-md-8">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="card-body">
                            <form id="formReservation" method="post" action="{{empty($id) ? route('reservation.create') : route('resevation.edit',$id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }} {{ method_field('POST') }}
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Phone Number</label>
                                        <input type="text" class="form-control" id="numberPhone" name="number_phone" placeholder="+62 21900800">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Service</label>
                                        <select name="type_reservation_id" id="isService" class="form-control select2">
                                            <option value="">-- Select One --</option>
                                            <option value="1">Home Care</option>
                                            <option value="2">Baby SPA</option>
                                        </select>
                                    </div>

                                    <div class="row d-none" id="noneService">
                                        <div class="form-group col-md-8">
                                            <div class="isLabel"></div>
                                            <select name="name_reservation_id" class="form-control selectMaster">
                                            </select>
                                        </div>

                                        <div class="n-chk col-md-4 mb-6">
                                            <p><span class="text-warning">*</span> silakan check jika jadwal lebih dari 1 bulan</p>
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input isJadwal">
                                                <span class="new-control-indicator"></span>Penjadwalan
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row d-none" id="runJadwal">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Lama Resevation</label>
                                            <select name="reservation_meet" class="form-control select2 resMeet">
                                                <option value="">-- Select Bulan --</option>
                                                <option value="1">1 Bulan</option>
                                                <option value="2">2 Bulan</option>
                                                <option value="3">3 Bulan</option>
                                                <option value="4">4 Bulan</option>
                                                <option value="5">5 Bulan</option>
                                                <option value="6">6 Bulan</option>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Pertemuan</label>
                                            <select name="reservation_repeat" class="form-control select2 resRepeat">
                                                <option value="">-- Select Bulan --</option>
                                                <option value="1_minggu">1x Per Bulan</option>
                                                <option value="2_minggu">2x Per Bulan</option>
                                                <option value="3_minggu">3x Per Bulan</option>
                                                <option value="4_minggu">4x Per Bulan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Tanggal Reservation</label>
                                        <input type="date" class="form-control" name="date_reservation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Jam Reservation</label>
                                        <select name="hour_reservation" class="form-control select2">
                                            <option value="08.00am-09.00am">08.00am - 09.00am</option>
                                            <option value="10.00am-11.00am">10.00am - 11.00am</option>
                                            <option value="12.00am-01.00pm">12.00am - 01.00pm</option>
                                            <option value="02.00pm-03.00pm">02.00pm - 03.00pm</option>
                                            <option value="04.00pm-05.00pm">04.00pm - 05.00am</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Kecamatan / Kota</label>
                                        <input type="text" class="form-control" name="city">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Kelurahan</label>
                                        <input type="text" class="form-control" name="village">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="inputPassword4">Alamat</label>
                                        <textarea class="form-control" name="address" rows="3"></textarea>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary mt-3 storeReservation">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="opening-table" style="background-color: #f5f5f5">
                            <div class="heading-block bottommargin-sm border-bottom-0 mb-4">
                                <h5>Jadwal Home Care &amp; Baby SPA</h5>
                                <p><span class="text-danger">*</span> Mohon pilih tanggal H+1 setelah resevation</p>
                            </div>
                            <div class="time-table-wrap clearfix">
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Senin</h5>
                                    <span class="col-lg-7">8:00am - 05:00pm</span>
                                </div>
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Selasa</h5>
                                    <span class="col-lg-7">8:00am - 05:00pm</span>
                                </div>
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Rabu</h5>
                                    <span class="col-lg-7">8:00am - 05:00pm</span>
                                </div>
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Kamis</h5>
                                    <span class="col-lg-7">8:00am - 05:00pm</span>
                                </div>
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Jumaat</h5>
                                    <span class="col-lg-7">8:00am - 05:00pm</span>
                                </div>
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Sabtu</h5>
                                    <span class="col-lg-7">8:00am - 05:00pm</span>
                                </div>
                                <div class="row time-table">
                                    <h5 class="col-lg-5">Minggu</h5>
                                    <span class="col-lg-7 text-danger">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('pages.resevation.component.script_create_or_update')
    <script src="{{asset('cork/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".select2").select2({
            placeholder: "Make a Selection",
            allowClear: true
        });

        $(document).ready(function(){
            $('.isJadwal').click(function(){
                if($(this).prop("checked") == true){
                    console.log("Checkbox is checked.");
                    $('#runJadwal').removeClass('d-none')
                }
                else if($(this).prop("checked") == false){
                    $('#runJadwal').addClass('d-none')
                    $('.resRepeat').val('').trigger('change')
                    $('.resMeet').val('').trigger('change')
                }
            });
        });
    </script>
@endsection
