@extends('layouts.main')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <h3>Reservasi Home Care & Baby SPA</h3>

                <div class="form-widget">

                    <div class="form-result"></div>

                    <form class="row mb-0" id="reservasiForm" action="{{route('frontend.booking.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 form-group">
                            <label for="template-contactform-name">Nama <small>*</small></label>
                            <input type="text" id="template-contactform-name" name="full_name" class="sm-form-control required" />
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-email">Email <small>*</small></label>
                            <input type="email" id="template-contactform-email" name="email" class="required email sm-form-control" />
                            <span>Jika anda di isi.</span>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-phone">Phone</label>
                            <input type="text" id="template-contactform-phone" name="number_phone" class="sm-form-control" required />
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-phone">WhatsApp</label>
                            <input type="text" id="template-contactform-phone" name="wa" class="sm-form-control" />
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-phone">Tanggal Reservasi</label>
                            <input type="date" id="template-contactform-phone" name="date_booking" class="sm-form-control" required/>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-phone">Jam Reservasi</label>
                            <input type="time" id="template-contactform-phone" name="hour_booking" class="sm-form-control" required />
                        </div>

                        <div class="w-100"></div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-service">Kecamatan</label>
                            <input type="text" id="template-contactform-phone" name="kecamatan" class="sm-form-control" required />
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-service">Kelurahan</label>
                            <input type="text" id="template-contactform-phone" name="kelurahan" class="sm-form-control" required />
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-service">Services</label>
                            <select id="isService" name="type_booking" class="sm-form-control" required>
                                <option value="">-- Select One --</option>
                                <option value="home_care">Home Care</option>
                                <option value="baby_spa">Baby SPA</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group d-none" id="noneService">
                            <div class="isLabel"></div>
                            <select name="list_service" class="sm-form-control isChangeSelected">
                                <option value="">-- Select One --</option>
                                @forelse($home as $i)
                                    <option class="d-none isHomeCare" value="{{$i->name.' - '}}{{'Rp. '.rupiah($i->price)}}">{{$i->name}} - {{'Rp. '.rupiah($i->price)}}</option>
                                @empty
                                @endforelse
                                @forelse($baby as $i)
                                    <option class="d-none isBabySpa" value="{{$i->name.' - '}}{{'Rp. '.rupiah($i->price)}}">{{$i->name}} - {{'Rp. '.rupiah($i->price)}}</option>
                                @empty
                                @endforelse
                            </select>
{{--                            <select  name="list_service" class="sm-form-control isBabySpa d-none">--}}
{{--                                <option class="selectValueT">-- Select One --</option>--}}
{{--                                @forelse($baby as $i)--}}
{{--                                    <option value="{{$i->name.' - '}}{{'Rp. '.rupiah($i->price)}}">{{$i->name}} - {{'Rp. '.rupiah($i->price)}}</option>--}}
{{--                                @empty--}}
{{--                                @endforelse--}}
{{--                            </select>--}}
                        </div>

                        <div class="w-100"></div>

                        <div class="col-12 form-group">
                            <label for="template-contactform-message">Alamat <small>*</small></label>
                            <textarea class="required sm-form-control" name="address" rows="6" cols="30"></textarea>
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d m-0 search" type="submit" value="submit">Send Reservasi</button>
                        </div>

                    </form>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="opening-table" style="background-color: #f5f5f5">
                    <div class="heading-block bottommargin-sm border-bottom-0">
                        <h4>Jadwal Home Care & Baby SPA</h4>
                        <span>Lorem ipsum dolor sit amet, consecte adipisicing elit molestiae non.</span>
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
                            <span class="col-lg-7 color font-weight-semibold">Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="clear"></div>

    <div class="row topmargin-lg footer-stick align-items-stretch">

        <div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: #1abc9c;">
            <div data-animate="fadeInLeft">
                <a href="#"><h3 class="text-uppercase" style="font-weight: 600;">Health Insurance</h3></a>
                <p style="line-height: 1.8;">Transform, agency working families thinkers who make change happen communities.&rarr;</p>
            </div>
            <i class="icon-medical-i-cardiology bgicon"></i>
        </div>

        <div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: #34495e;">
            <div data-animate="fadeInLeft" data-delay="200">
                <a href="#"><h3 class="text-uppercase" style="font-weight: 600;">Medical Records</h3></a>
                <p style="line-height: 1.8;">Frontline respond, visionary collaborative cities advancement overcome injustice.&rarr;</p>
            </div>
            <i class="icon-medical-i-administration bgicon"></i>
        </div>

        <div class="col-lg-4 dark col-padding overflow-hidden" style="background-color: #DE6262;">
            <div data-animate="fadeInLeft" data-delay="400">
                <a href="#"><h3 class="text-uppercase" style="font-weight: 600;">Online Bill Pay</h3></a>
                <p style="line-height: 1.8;">Sustainability involvement fundraising campaign connect carbon rights, collaborative cities.&rarr;</p>
            </div>
            <i class="icon-medical-i-billing bgicon"></i>
        </div>

        <div class="clear"></div>

    </div>
@stop

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#reservasiForm').on('submit', (e) => {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: $(this).attr("action"),
                    data: $(this).find('input,select,textarea').serialize(),
                    dataType: 'json',
                    success: (data) => {
                        if(data.status === "ok"){
                            $(".search").prop('disabled', true);
                            toastr["success"](data.message);
                            window.location.reload(true)
                        }
                    },
                    error: (data) => {
                        var data = data.responseJSON;
                        if(data.status == "fail"){
                            toastr["error"](data.message);
                        }
                    }
                });
            });

            $('#isService').change( function(){
                let val = $(this).val();
                if(val == 'home_care'){
                    $('#noneService').removeClass('d-none')
                    $('.isHomeCare').removeClass('d-none')
                    $('.isChangeSelected').val("")
                    $('.isBabySpa').addClass('d-none')
                    $('.isLabel').html('<label for="template-contactform-service ">List Harga Home Care</label>')
                } else if(val == 'baby_spa'){
                    $('#noneService').removeClass('d-none')
                    $('.isBabySpa').removeClass('d-none')
                    $('.isHomeCare').addClass('d-none')
                    $('.isChangeSelected').val("")
                    $('.isLabel').html('<label for="template-contactform-service ">List Harga Baby SPA</label>')
                } else {
                    $('#noneService').addClass('d-none')
                    $('.isHomeCare').addClass('d-none')
                    $('.isBabySpa').addClass('d-none')
                    $('.isLabel').html('');
                    $('.isChangeSelected').val("")
                }
            });

        });

    </script>

@stop
