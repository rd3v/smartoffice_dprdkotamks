@extends('template.v1.temp')

@section('title_bar')
 {{ config('app.name') }}
@endsection

@section('css')
  <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
@endsection

@section('konten')

<style>

</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2') }}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ strtoupper($user->name) }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li class="active"><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <form role="search" class="app-search hidden-xs pull-right">
                            <input type="text" placeholder="Cari..." class="form-control">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Grafik Perjalanan Dinas</h3>
                            <ul class="list-inline text-center m-t-40">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #444b4c;"></i>Selesai</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Belum Selesai</h5>
                                </li>
                            </ul>
                            <div id="extra-area-chart"></div>
                        </div>
                    </div>
                </div>                              
               
            </div>
            <!-- /.container-fluid -->  
            <!-- footer here -->
@stop

@section('js')
    <script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/morrisjs/morris.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
@stop

@section('myscript')
<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'SELAMAT DATANG',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,

            stack: 6
        });
        $('.vcarousel').carousel({
            interval: 3000
        });

    Morris.Area({
        element: 'extra-area-chart',
        data: [{
                    period: '2010',
                    iphone: 0,
                    ipad: 0,
                    itouch: 0
                }, {
                    period: '2011',
                    iphone: 50,
                    ipad: 15,
                    itouch: 5
                }, {
                    period: '2012',
                    iphone: 20,
                    ipad: 50,
                    itouch: 65
                }, {
                    period: '2013',
                    iphone: 60,
                    ipad: 12,
                    itouch: 7
                }, {
                    period: '2014',
                    iphone: 30,
                    ipad: 20,
                    itouch: 120
                }, {
                    period: '2015',
                    iphone: 25,
                    ipad: 80,
                    itouch: 40
                }, {
                    period: '2016',
                    iphone: 10,
                    ipad: 10,
                    itouch: 10
                }


                ],
                lineColors: ['#fb9678', '#01c0c8'],
                xkey: 'period',
                ykeys: ['iphone', 'ipad'],
                labels: ['Selesai', 'Belum Selesai'],
                pointSize: 0,
                lineWidth: 0,
                resize:true,
                fillOpacity: 0.8,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto',
                xLabels:'month'
        });

    });


    $("#lihome").addClass("active");
</script>
@stop
