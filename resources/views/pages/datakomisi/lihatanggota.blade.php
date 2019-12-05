@extends('template.v1.temp')

@section('title_bar')
 {{ config('app.name') }}
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
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
                        <h4 class="page-title">Lihat Anggota</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('data-komisi') }}">Data Komisi</a></li>
                            <li class="active">Lihat Anggota</li>
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
                    <div class="col-md-12">
                        <div class="white-box">

                    <p><a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a></p>

                <div class="row">
                    
                    @foreach($anggota as $value)
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="#"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <h3 class="box-title m-b-0">{{ $value->nama }}</h3>
                                    <small>{{ ($value->partai != null) ?  strtoupper($value->partai->nama):'' }}</small>
                                    <p>
                                        <address>
                                            {{ strtoupper($value->jabatan_text) }}
                                            <br/>
                                            <br/>
                                            @if($value->telepon != null || $value->telepon != "")
                                                <i class="fa fa-phone"></i> <a href="telp:{{ $value->telepon }}">{{ $value->telepon }}</a>
                                            @endif
                                        </address>
                                    </p>
                                    <button class="btn btn-success" onclick="rekapan()" target="_blank"><i class="fa fa-file"></i> Rekapan Perjalanan Dinas</button>
                                    <!-- <a class="btn btn-success" href="{{ url('komisi/rekapan/print') }}" target="_blank"><i class="fa fa-file"></i> Rekapan Perjalanan Dinas</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>


                        </div>
                    </div>
                </div>

</div>

@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>

@endsection

@section('myscript')
    <script>
        function rekapan() {
            Swal.fire("On Progress","","info");
        }
    </script>
@endsection

