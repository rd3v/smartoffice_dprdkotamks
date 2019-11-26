@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS
@endsection

@section('css')
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Laporan Perjalanan Dinas</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="#">Laporan Perjalanan Dinas</a></li>
                            <li class="active">Data Kelengkapan</li>
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

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">DATA KELENGKAPAN</h3>
                            <p class="text-muted m-b-30 font-13"> </p>

                            @if(count($kelengkapan->tiket_perjalanan)>0)
                            	<h3><u>Tiket Perjalanan</u></h3>
                                @foreach($kelengkapan->tiket_perjalanan as $key => $tiketperjalanan)
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">File {{ ($key+1) }}</label>
                                        <div class="col-10">
                                            <a class="btn btn-info" href="{{ asset($storage_tiketperjalanan.$tiketperjalanan->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
    							@endforeach
                            @endif
                            <br>

                            @if(count($kelengkapan->invoice_hotel) > 0)
                                <h3><u>Invoice Hotel</u></h3>
                                @foreach($kelengkapan->invoice_hotel as $key => $invoice_hotel)
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">File {{ ($key+1) }}</label>
                                        <div class="col-10">
                                            <a class="btn btn-info" href="{{ asset($storage_invoicehotel.$invoice_hotel->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <br>
                            
                            @if(count($kelengkapan->foto_kegiatan)>0)

                                <h3><u>Foto Kegiatan</u></h3>
                                @foreach($kelengkapan->foto_kegiatan as $key => $foto_kegiatan)
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">File {{ ($key+1) }}</label>
                                        <div class="col-10">
                                            <a class="btn btn-info" href="{{ asset($storage_fotokegiatan.$foto_kegiatan->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
                                @endforeach

                            @endif

                            

                        </div>
                    </div>
                </div>
                <!-- /.row -->				

			</div>
		</div>
@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
@endsection

@section('myscript')

@endsection