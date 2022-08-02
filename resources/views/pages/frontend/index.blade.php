@extends('layouts.main')

@section('content')
    <div class="container clearfix">

        <div class="row col-mb-50 mb-0">
            <div class="col-sm-6 col-md-4">
                <div class="feature-box fbox-plain">
                    <div class="fbox-icon" data-animate="bounceIn">
                        <a href="#"><i class="icon-medical-i-cardiology"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Intensive Care</h3>
                        <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="feature-box fbox-plain">
                    <div class="fbox-icon" data-animate="bounceIn" data-delay="200">
                        <a href="#"><i class="icon-medical-i-social-services"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Family Planning</h3>
                        <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="feature-box fbox-plain">
                    <div class="fbox-icon" data-animate="bounceIn" data-delay="400">
                        <a href="#"><i class="icon-medical-i-neurology"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3>Expert Consultation</h3>
                        <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @php($home = \DB::table('master_home_cares')->select('id','type','name','price')->get())
    @php($baby = \DB::table('master_baby_spas')->select('id','type','name','price')->get())
    <div class="section row p-0 align-items-stretch dark topmargin-sm">
        <div class="col-lg-12 p-0">
            <div class="row bg-color">
                <div class="col md-6 p-0">
                    <div class="form-widget col-padding">
                        <h2>List Harga Home Care</h2>
                        <div class="time-table-wrap clearfix">
                            @forelse($home as $item)
                                <div class="row time-table">
                                    <h5 class="col-lg-5">{{$item->name}}</h5>
                                    <span class="col-lg-7">Rp. {{rupiah($item->price)}}</span>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col md-6 p-0">
                    <div class="form-widget col-padding">
                        <h2>List Harga Baby SPA</h2>
                        <div class="time-table-wrap clearfix">
                            @forelse($baby as $item)
                                <div class="row time-table">
                                    <h5 class="col-lg-5">{{$item->name}}</h5>
                                    <span class="col-lg-7">Rp. {{rupiah($item->price)}}</span>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
