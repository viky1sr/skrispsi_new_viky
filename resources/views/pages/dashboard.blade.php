@extends('layouts.default')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <div class="widget-heading">
                    <h6 class="">Statistics {{Carbon\Carbon::now()->format('Y')}}</h6>
                </div>
                <div class="w-chart">
                    <div class="w-chart-section">
                        <div class="w-detail">
                            <p class="w-title">Total Reservation</p>
                            <p class="w-stats">423,964</p>
                        </div>
                        <div class="w-chart-render-one">
                            <div id="totalReservation"></div>
                        </div>
                    </div>

                    <div class="w-chart-section">
                        <div class="w-detail">
                            <p class="w-title">Home Care</p>
                            <p class="w-stats">7,929</p>
                        </div>
                        <div class="w-chart-render-one">
                            <div id="homeCare"></div>
                        </div>
                    </div>

                    <div class="w-chart-section">
                        <div class="w-detail">
                            <p class="w-title">Baby SPA</p>
                            <p class="w-stats">7,929</p>
                        </div>
                        <div class="w-chart-render-one">
                            <div id="babySpa"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h6 class="value">$ 45,141</h6>
                            <p class="">Total Paid</p>
                        </div>
                        <div class="">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </div>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-three">
                <div class="widget-heading">
                    <div class="">
                        <h5 class="">Promo Reservation <span class="text-info" id="timer"></span></h5>
                    </div>
                </div>

                <div class="widget-content layout-spacing">
                   <div class="row ml-1 mr-1">
                       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 mt-3 layout-spacing">
                           <div class="widget widget-card-one">
                               <div class="widget-content">

                                   <div class="media">
                                       <div id="">
                                       </div>
                                       <div class="media-body">
                                           <h6>Baby Spa</h6>
                                           <p class="meta-date-time">Monday, Nov 18</p>
                                       </div>
                                   </div>

                                   <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

                                   <div class="w-action">
                                       <div class="card-like">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                           <span>10 Promo</span>
                                       </div>
                                   </div>
                               </div>
                           </div>

                       </div>
                       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 mt-3 layout-spacing">
                           <div class="widget widget-card-one">
                               <div class="widget-content">

                                   <div class="media">
                                       <div id="">
                                       </div>
                                       <div class="media-body">
                                           <h6>Baby Spa</h6>
                                           <p class="meta-date-time">Monday, Nov 18</p>
                                       </div>
                                   </div>

                                   <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

                                   <div class="w-action">
                                       <div class="card-like">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                           <span>10 Promo</span>
                                       </div>
                                   </div>
                               </div>
                           </div>

                       </div>
                       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 mt-3 layout-spacing">
                           <div class="widget widget-card-one">
                               <div class="widget-content">

                                   <div class="media">
                                       <div id="">
                                       </div>
                                       <div class="media-body">
                                           <h6>Baby Spa</h6>
                                           <p class="meta-date-time">Monday, Nov 18</p>
                                       </div>
                                   </div>

                                   <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>

                                   <div class="w-action">
                                       <div class="card-like">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                           <span>10 Promo</span>
                                       </div>
                                   </div>
                               </div>
                           </div>

                       </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-activity-three">

                <div class="widget-heading">
                    <h5 class="">Notifications</h5>
                </div>

                <div class="widget-content">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Reservation</h5>
                                        <span class="">27 Feb, 2020</span>
                                    </div>
                                    <p><span>Success</span> Reservation</p>
                                </div>
                            </div>

                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Reservation</h5>
                                        <span class="">27 Feb, 2020</span>
                                    </div>
                                    <p><span>Reject</span> Reservation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script src="{{asset(config('sentence.apex_charts_js'))}}"></script>
    <script type="text/javascript">
        const Reservation = {
            chart: {
                id: 'totalReservation',
                group: 'groupJob',
                type: 'line',
                height: 80,
                sparkline: {
                    enabled: true
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#133afa',
                    opacity: 0.7,
                }
            },
            series: [{
                data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25]
            }],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            markers: {
                size: 0
            },
            grid: {
                padding: {
                    top: 35,
                    bottom: 0,
                    left: 40
                }
            },
            colors: ['#133afa'],
            tooltip: {
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return '';
                        }
                    }
                }
            },
            responsive: [{
                breakpoint: 1351,
                options: {
                    chart: {
                        height: 95,
                    },
                    grid: {
                        padding: {
                            top: 35,
                            bottom: 0,
                            left: 0
                        }
                    },
                },
            },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40
                            }
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0
                            }
                        },
                    },
                }

            ]
        }
        dReservation = new ApexCharts(document.querySelector("#totalReservation"), Reservation);
        dReservation.render();

        const HomeCare = {
            chart: {
                id: 'homeCare',
                group: 'groupJob',
                type: 'line',
                height: 80,
                sparkline: {
                    enabled: true
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#32fa13',
                    opacity: 0.7,
                }
            },
            series: [{
                data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25]
            }],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            markers: {
                size: 0
            },
            grid: {
                padding: {
                    top: 35,
                    bottom: 0,
                    left: 40
                }
            },
            colors: ['#32fa13'],
            tooltip: {
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return '';
                        }
                    }
                }
            },
            responsive: [{
                breakpoint: 1351,
                options: {
                    chart: {
                        height: 95,
                    },
                    grid: {
                        padding: {
                            top: 35,
                            bottom: 0,
                            left: 0
                        }
                    },
                },
            },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40
                            }
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0
                            }
                        },
                    },
                }

            ]
        }
        dHomeCare = new ApexCharts(document.querySelector("#homeCare"), HomeCare);
        dHomeCare.render();

        const BabySpa = {
            chart: {
                id: 'babySpa',
                group: 'groupJob',
                type: 'line',
                height: 80,
                sparkline: {
                    enabled: true
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#f0ff08',
                    opacity: 0.7,
                }
            },
            series: [{
                data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25]
            }],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            markers: {
                size: 0
            },
            grid: {
                padding: {
                    top: 35,
                    bottom: 0,
                    left: 40
                }
            },
            colors: ['#f0ff08'],
            tooltip: {
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return '';
                        }
                    }
                }
            },
            responsive: [{
                breakpoint: 1351,
                options: {
                    chart: {
                        height: 95,
                    },
                    grid: {
                        padding: {
                            top: 35,
                            bottom: 0,
                            left: 0
                        }
                    },
                },
            },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40
                            }
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0
                            }
                        },
                    },
                }

            ]
        }
        dBabySpa = new ApexCharts(document.querySelector("#babySpa"), BabySpa);
        dBabySpa.render();
    </script>

    <script type="text/javascript">
        // Set the date we're counting down to
        var getYear = new Date().getFullYear();
        var countDownDate = new Date("Dec 5, "+ getYear +" 15:37:25").getTime();

        // Update the count down every 1 second
        var countdownfunction = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("timer").innerHTML = '<span class="count">' + days + '</span> <span class="text">Days </span>' +
                '<span class="count">'+ hours +'</span> <span class="text">Hours </span>' +
                '<span class="count">'+ minutes +'</span> <span class="text">Mins </span>' +
                '<span class="count">'+ seconds +'</span> <span class="text">Secs</span>';

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(countdownfunction);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@stop
