@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS {{ $komisi }}
@endsection

@section('css')
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/assets/v2') }}/plugins/bower_components/dropify/dist/css/dropify.min.css">
@endsection

@section('konten')

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">{{ strtoupper($persuratan->SuratTugas->perihal) }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('komisi/laporan-perjalanan-dinas') }}">Laporan Perjalanan Dinas</a></li>
                            <li class="active">Upload Kelengkapan</li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                                <div class="panel-body">
                                    <form action="{{ url('komisi/laporan-perjalanan-dinas') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <div class="form-body">

                                            <div class="col-sm-12 ol-md-12 col-xs-12">
                                                <div class="white-box">
                                                    <h3 class="box-title">Tiket Perjalanan</h3>
                                                    <label for="tiket_perjalanan">Upload Tiket Perjalanan</label>
                                                    <input type="file" name="tiket_perjalanan[]" id="tiket_perjalanan" class="dropify" value="{{ old('tiket_perjalanan') }}" required multiple/>
                                                </div>
                                            </div>

                                             <!-- Tiket Perjalanan -->
                                             <!-- Invoice Hotel -->
                                             <!-- Foto Kegiatan -->

                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" style="color:white" class="btnterima btn btn-info"> <i class="fa fa-save"></i> SIMPAN</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-danger" style="color:white">Batal</a>
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
<script src="{{ asset('public/assets/v2') }}/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
@endsection

@section('myscript')
    <script>
        
        $(document).ready(function() {

            $('.dropify').dropify();

        });
        
    </script>
@endsection