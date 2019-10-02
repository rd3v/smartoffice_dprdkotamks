@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS {{ $komisi }}
@endsection

@section('css')
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

@endsection

@section('konten')

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Laporan Perjalanan Dinas {{ $komisi }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('keuangan/laporan-perjalanan-dinas') }}/{{ $kode }}">Laporan Perjalanan Dinas</a></li>
                            <li class="active">Validasi Laporan</li>
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
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Perjalanan Dinas Ke 1</h3>
                            <p class="text-muted m-b-30">Tujuan Perjalanan Dinas</p>
                            								                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                                <div class="panel-body">
                                    <form action="#">
                                        <div class="form-body">
                                            <h3 class="box-title">1. SPPD</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<embed src="{{ asset('public/perjalanandinas/PERWALI-No.9-2013.pdf') }}" width="900" height="800" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
 
                                                    </div>
                                                </div>
                                                <!--/span-->

                                            </div>
                                            <!--/row-->

                                            <h3 class="box-title m-t-40">2. Invoice Hotel</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                    	<a class="image-popup-no-margins" href="{{ asset('public/perjalanandinas/hotel-PDF-Invoice3-1.png') }}">
                    	                                    <img src="{{ asset('public/perjalanandinas/hotel-PDF-Invoice3-1.png') }}" alt="hotel-PDF-Invoice3-1.png" class="img-responsive" width="250px">
					                                    </a>
                                                    </div>
                                                </div>
                                            </div>


                                            <h3 class="box-title m-t-40">3. Tiket Perjalanan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <a class="image-popup-no-margins" href="{{ asset('public/perjalanandinas/lion_air.jpg') }}">
                    	                                    <img src="{{ asset('public/perjalanandinas/lion_air.jpg') }}" alt="hotel-PDF-Invoice3-1.png" class="img-responsive" width="250px">
					                                    </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="box-title m-t-40">4. Foto Kegiatan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
		         <div class="popup-gallery m-t-30">
                            <a href="{{ asset('public/perjalanandinas/rapat1.jpg') }}" title="Caption">
                                <img src="{{ asset('public/perjalanandinas/rapat1.jpg') }}" width="32.5%" />
                            </a>
                            <a href="{{ asset('public/perjalanandinas/rapat2.jpg') }}" title="Caption">
                                <img src="{{ asset('public/perjalanandinas/rapat2.jpg') }}" width="32.5%" />
                            </a>
                            <a href="{{ asset('public/perjalanandinas/rapat3.jpg') }}">
                                <img src="{{ asset('public/perjalanandinas/rapat3.jpg') }}" width="32.5%" />
                            </a>
                    </div> 
                   
           											 </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <h3 class="box-title m-t-40">5. Laporan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
<embed src="{{ asset('public/perjalanandinas/laporan.pdf') }}" width="900" height="800" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
                                                    </div>
                                                </div>
                                            </div>

											<div id="tolak" style="display: none">
												
                                            <h3 class="box-title m-t-40">Tuliskan Alasan Penolakan Laporan</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
														<textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
											</div>


                                        </div>
                                        <div class="form-actions">
                                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->

                        </div>
                    </div>
                </div>

        </div>
@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
<script src="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
	<script src="{{ asset('public/assets/v2') }}/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
@endsection

@section('myscript')
	<script>
        
        $(document).ready(function() {
               $('#example23').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

               $(".btntolak").click(function() {
               	  $("div#tolak").css("display","");
               });

        });
        
         (function() {

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });

        })();

	</script>
@endsection