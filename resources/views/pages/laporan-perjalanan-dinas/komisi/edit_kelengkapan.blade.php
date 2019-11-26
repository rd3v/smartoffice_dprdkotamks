@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS {{ $komisi }}
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/assets/v2') }}/plugins/bower_components/dropify/dist/css/dropify.min.css">
    <style>
    .swal2-popup {
      font-size: 1.6rem !important;
      }
    </style>

@endsection

@section('konten')

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Hapus Kelengkapan</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('komisi/laporan-perjalanan-dinas') }}">Laporan Perjalanan Dinas</a></li>
                            <li class="active">Hapus Kelengkapan</li>
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
                            <h3 class="box-title m-b-0">Nomor Surat : {{ strtoupper($persuratan->SuratTugas->nomor) }}</h3>
                            <p class="text-muted m-b-30">{{ strtoupper($persuratan->SuratTugas->perihal) }}</p>
@if ($errors->any())
 @foreach ($errors->all() as $error)
     <h2 class="text-danger">{{$error}}</h2>
 @endforeach
@endif

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">DATA KELENGKAPAN</h3>
                            <p class="text-muted m-b-30 font-13"> </p>

                                @if(count($kelengkapan->tiket_perjalanan)>0)
                            <div class="row" style="background-color: gray;color:white">
                                <div class="col-md-12">
                                    
                                <h3 style="color:white"><u>Tiket Perjalanan</u></h3>
                                    @foreach($kelengkapan->tiket_perjalanan as $key => $tiketperjalanan)
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label">File {{ ($key+1) }}</label>
                                            <div class="col-10">
                                                <a class="btn btn-info" href="{{ asset($storage_tiketperjalanan.$tiketperjalanan->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                                <button class="btn btn-danger" onclick="hapus('{{ $tiketperjalanan->file }}','tiket_perjalanan','{{ $tiketperjalanan->id }}')"><i class="fa fa-remove"></i> Hapus</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                                @endif

                            <br>

                            @if(count($kelengkapan->invoice_hotel) > 0)
                            <div class="row" style="background-color: gray;color:white">
                                <div class="col-md-12">

                                <h3 style="color:white"><u>Invoice Hotel</u></h3>
                                @foreach($kelengkapan->invoice_hotel as $key => $invoice_hotel)
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">File {{ ($key+1) }}</label>
                                        <div class="col-10">
                                            <a class="btn btn-info" href="{{ asset($storage_invoicehotel.$invoice_hotel->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                                <button class="btn btn-danger" onclick="hapus('{{ $invoice_hotel->file }}','invoice_hotel','{{ $invoice_hotel->id }}')"><i class="fa fa-remove"></i> Hapus</button>                                            
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                            @endif

                            <br>
                            
                            @if(count($kelengkapan->foto_kegiatan)>0)
                            <div class="row" style="background-color: gray;color:white">
                                <div class="col-md-12">

                                <h3 style="color:white"><u>Foto Kegiatan</u></h3>
                                @foreach($kelengkapan->foto_kegiatan as $key => $foto_kegiatan)
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">File {{ ($key+1) }}</label>
                                        <div class="col-10">
                                                <a class="btn btn-info" href="{{ asset($storage_fotokegiatan.$foto_kegiatan->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>

                                                <button class="btn btn-danger" onclick="hapus('{{ $foto_kegiatan->file }}','foto_kegiatan','{{ $foto_kegiatan->id }}')"><i class="fa fa-remove"></i> Hapus</button>                                           
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                            @endif
                            

                        </div>
                    </div>
                </div>
                <!-- /.row -->              



                </div>
                <!--./row-->

                        </div>
                    </div>
                </div>

        </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
<script src="{{ asset('public/assets/v2') }}/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
@endsection

@section('myscript')
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        
        $(document).ready(function() {

            $('.dropify').dropify();

        });

        
        function hapus(nama,kategori,id) {

            if(!confirm('Hapus gambar ini ?')) return false;

            var data = {nama:nama,kategori:kategori,id:id};
            $.ajax({
                url:"{{ url('komisi/laporan-perjalanan-dinas') }}/"+id,
                type:"delete",
                data:data,
                dataType:"json"
            }).done(function(res) {

                Swal.fire({
                    title:res.title,
                    text:res.text,
                    type:res.type
                }).then((result) => {
                    if(result.value) {
                        location.reload();
                    }
                });

            }).file(function(res) {
                console.log(res);
                Swal.fire("Terjadi Kesalahan Sistem","silahkan periksa koneksi internet anda dan coba lagi. Atau hubungi Admin untuk mengecek kesalahan ini","danger");
            });


        }

    </script>
@endsection