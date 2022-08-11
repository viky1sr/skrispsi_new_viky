<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Title -->
    <title>Viera Mom & Baby Spa</title>
    <!-- CSS Vendor -->
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/mdb.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/swiper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lading_page/assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cork/plugins/select2/select2.min.css')}}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset('logo_viera.png')}}" type="image/x-icon">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<header class="header-nav-area sticky-on">
    <!-- header-nav -->
    <div class="container">
        <div class="row flexbox-center">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="#"><img src="{{asset('logo_viera.png')}}" style="width: 60px" alt="..."></a>
                </div>
            </div>
            <!-- col-lg-4 -->
            <div class="col-lg-8">
                <nav class="header-nav">
                    <div class="cssmenu" data-title="Menu">
                        <ul class="menu list-inline">
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#listresevation">List Resevation</a></li>
{{--                            <li><a href="#resevation">Resevation</a></li>--}}
                            @if(\Auth::check() == false)
                            <li><a href="{{url('/register')}}">Register</a></li>
                            <li><a href="{{url('/login')}}">Login</a></li>
                                @else
                                <li><a href="{{route('to_home')}}">Dashboard Panel</a></li>
                                <li><a href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif
                        </ul>
                    </div>
                    <!-- #header-menu-wrap -->
                </nav>
                <!-- .header-nav -->
            </div>
            <!-- col-lg-7 -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</header>

<div class="header-area"  id="home">
    <div class="container">
        <div class="heade-slider-content">
            <div class="row">
                <div class="col-lg-7">
                    <div class="header-content">
                        <h1><span>Viera Mom</span> & Baby SPA</h1>
                        <p>Ayo manjakan si buah hati tersayang dengan Treatment massage dan SPA husus yang dapat
                            meningkatkan kesehatan dan perkembangan bayi.
                        </p>
                        <p>Sayangilah dirimu, rawatlah kesehatan dan kekuatan jiwa raganya.</p>
                        <ul class="app-button list-inline w-100">
                            <!-- app-button -->
                            <li>
                                <a class="waves-effect waves-light" href="https://api.whatsapp.com/send?phone=+6281319599677">
                                    <i class="fa fa-whatsapp"></i>
                                    <p><span>Message on</span>WhatsApp</p>
                                </a>
                            </li>
                            <li>
                                <a class="waves-effect waves-light" href="https://www.instagram.com/vieramomandbabyspa/">
                                    <i class="fa fa-instagram"></i>
                                    <p><span>Follow Us on</span>Instagram</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- col-lg-7 -->
{{--                <div class="col-lg-4 offset-lg-1">--}}
{{--                    <div class="heade-slider-thumbnail">--}}
{{--                        <img src="{{asset('lading_page/assets/images/intro-mobile.png')}}" alt="...">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <!-- row -->
        </div>
    </div>
    <!-- container -->
</div>

<div class="contact-area" id="listresevation">
    <div class="container">
        <div class="section-title text-center">
            <h2>List Resevation</h2>
        </div>
        <div class="shape"></div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5 mb-md-0 mb-5">
                <h4 class="text-center mb-4">Home Care</h4>
                @foreach($home as $item)
                    <div class="row text-center">
                        <p class="col-md-5">{{$item->name}}</p>
                        <span class="col-md-7 text-success">Rp. {{rupiah($item->price)}}</span>
                    </div>
                @endforeach

            </div>
            <div class="col-md-5 mb-md-0 mb-5">
                <h4 class="text-center mb-4">Baby Spa</h4>
                @foreach($baby as $item)
                    <div class="row text-center">
                        <p class="col-md-5">{{$item->name}}</p>
                        <span class="col-md-7 text-success">Rp. {{rupiah($item->price)}}</span>
                    </div>
                @endforeach
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

{{--<div class="contact-area" id="resevation">--}}
{{--    <div class="container">--}}
{{--        <div class="section-title text-center">--}}
{{--            <h2>Resevation</h2>--}}
{{--        </div>--}}
{{--        <div class="shape"></div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-8 mb-md-0 mb-5">--}}
{{--                <form id="contact-form" name="contact-form" action="mail.php" method="POST">--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="text" id="name" name="full_name" class="form-control">--}}
{{--                                <label for="name" class="">Full Name</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="text" id="email" name="email" class="form-control">--}}
{{--                                <label for="email" class="">Email</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="text" id="phone" name="number_phone" class="form-control">--}}
{{--                                <label for="phone" class="">Phone Number</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="text" id="wa" name="wa" class="form-control">--}}
{{--                                <label for="wa" class="">WhatsApp</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="date" id="date_reservation" name="date_reservation" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <select id="hour_reservation" name="hour_reservation" class="form-control">--}}
{{--                                    <option value="">-- Select Jam --</option>--}}
{{--                                    <option value="08.00am-09.00am">08.00am - 09.00am</option>--}}
{{--                                    <option value="10.00am-11.00am">10.00am - 11.00am</option>--}}
{{--                                    <option value="12.00am-01.00pm">12.00am - 01.00pm</option>--}}
{{--                                    <option value="02.00pm-03.00pm">02.00pm - 03.00pm</option>--}}
{{--                                    <option value="04.00pm-05.00pm">04.00pm - 05.00am</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="text" id="city" name="city" class="form-control">--}}
{{--                                <label for="city" class="">Kecamatan</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <input type="text" id="village" name="village" class="form-control">--}}
{{--                                <label for="village" class="">Kelurahan</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <select id="isService" name="type_reservation" class="form-control select2">--}}
{{--                                    <option value="">-- Select Services --</option>--}}
{{--                                    <option value="1">Home Care</option>--}}
{{--                                    <option value="2">Baby SPA</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6 d-none" id="noneService">--}}
{{--                            <div class="md-form mb-0">--}}
{{--                                <select name="name_reservation" class="form-control selectMaster">--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="md-form">--}}
{{--                                <textarea id="message" name="address" rows="2" class="form-control md-textarea"></textarea>--}}
{{--                                <label for="message">Alamat</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="text-center text-md-left">--}}
{{--                        <button type="button" class="btn btn-md btn-pink waves-effect waves-light">Send Resevation</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <div class="status"></div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4 text-center">--}}
{{--                <div class="mb-2">--}}
{{--                    <h4>Jadwal Home Care & Baby SPA</h4>--}}
{{--                </div>--}}
{{--                <div class="list-unstyled mb-0">--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Senin</h5>--}}
{{--                        <span class="col-lg-7">8:00am - 05:00pm</span>--}}
{{--                    </div>--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Selasa</h5>--}}
{{--                        <span class="col-lg-7">8:00am - 05:00pm</span>--}}
{{--                    </div>--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Rabu</h5>--}}
{{--                        <span class="col-lg-7">8:00am - 05:00pm</span>--}}
{{--                    </div>--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Kamis</h5>--}}
{{--                        <span class="col-lg-7">8:00am - 05:00pm</span>--}}
{{--                    </div>--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Jumaat</h5>--}}
{{--                        <span class="col-lg-7">8:00am - 05:00pm</span>--}}
{{--                    </div>--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Sabtu</h5>--}}
{{--                        <span class="col-lg-7">8:00am - 05:00pm</span>--}}
{{--                    </div>--}}
{{--                    <div class="row time-table">--}}
{{--                        <h5 class="col-lg-5">Minggu</h5>--}}
{{--                        <span class="col-lg-7 text-warning">Closed</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<footer>
    <div class="footer-area">
        <div class="container">
            <div class="footer-contact">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-contact-info">
                            <div class="footer-contact-icon"><i class="fa fa-phone white-text fa-2x"></i></div>
                            <div class="footer-contact-content">
                                <h5>Phone</h5>
                                <p>Phone / WhatsApp:   (+62) 81 319599677</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="footer-contact-info">
                            <div class="footer-contact-icon"><i class="fa fa-map-marker white-text fa-2x"></i></div>
                            <div class="footer-contact-content">
                                <h5>Address</h5>
                                <p>Kp. Babakan, Jl. Busidin, RT.003/RW.002, </p>
                                <p>Kel.Mustikasari, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157,</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="footer-contact-info">
                            <div class="footer-contact-icon"><i class="fa fa-envelope white-text fa-2x"></i></div>
                            <div class="footer-contact-content">
                                <h5>Email</h5>
                                <p>vieramomandbabyspa@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 -->
                </div>
                <!-- row -->
            </div>
            <!-- contact  -->
            <!-- row -->
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <p class="copyright">Copyright&copy; 2022  - <a href="https://github.com/viky1sr">Skripsi Viky </a></p>
                </div>
                <div class="col-lg-3  offset-lg-3 col-md-4  text-lg-right">
                    <ul class="list-inline social-icon">
                        <li><a href="https://www.instagram.com/vieramomandbabyspa/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+6281319599677"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>
</footer>

<script src="{{asset('lading_page/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('lading_page/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('lading_page/assets/js/mdb.min.js')}}"></script>
<script src="{{asset('lading_page/assets/js/swiper.min.js')}}"></script>
<script src="{{asset('lading_page/assets/js/plugins.js')}}"></script>
<script src="{{asset('lading_page/assets/js/menu.js')}}"></script>
<script src="{{asset('lading_page/assets/js/main.js')}}"></script>
<script src="{{asset('cork/plugins/select2/select2.min.js')}}"></script>

<script>
    $(".select2").select2({
        placeholder: "Make a Selection",
        allowClear: true
    });

    $('#isService').change( function(){
        let val = $(this).val();
        let apiUrl = (val == 1) ? '/api/general/list/homecare' : '/api/general/list/babyspa';
        if(val == '1'){
            $('#noneService').removeClass('d-none')
            $('.isLabel').html('<label for="template-contactform-service ">List Harga Home Care</label>')
        } else if(val == '2'){
            $('#noneService').removeClass('d-none')
            $('.isLabel').html('<label for="template-contactform-service ">List Harga Baby SPA</label>')
        } else {
            $('#noneService').addClass('d-none')
        }

        $('.selectMaster').select2({
            ajax: {
                url: apiUrl,
                type: "get",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        filter: params.term, // search term
                        limit: 15,
                    };
                },
                processResults: function (response) {
                    console.log('vikyy',response)
                    return {
                        results: response.data
                    };
                },
                cache: true
            },
            templateResult: function (dataRow) {
                return dataRow.name || dataRow.text;
            },
            templateSelection: function (dataRow) {
                return dataRow.name || dataRow.text;
            }
        })
    });
</script>
</body>
</html>
