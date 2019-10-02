@extends('template.v1.temp')

@section('title_bar')
 {{ config('app.name') }}
@endsection

@section('css')

@endsection

@section('konten')
	
    <div id="page-wrapper">
        <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Tambah Komisi</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('data-komisi') }}">Data Komisi</a></li>
                            <li class="active">Tambah</li>
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

                            <div class="row">
                                <div class="col-md-12">

                                    <h3 class="box-title m-b-0">Tambah Komisi</h3>
                                    <br>

                                    <form class="form-material form-horizontal">
                                        
                                        <div class="form-group">
                                            <label class="col-sm-12">Pilih Komisi</label>
                                            <div class="col-sm-12">
                                                <select name="komisi" class="form-control">
                                                    <option></option>
                                                    <option value="a">A</option>
                                                    <option value="b">B</option>
                                                    <option value="c">C</option>
                                                    <option value="d">D</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Bidang</label>
                                            <div class="col-md-12">
                                                <input name="bidang" type="text" class="form-control" placeholder="Masukkan Bidang">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a href="{{ url()->previous() }}" class="btn btn-success" id="simpan">
                                                    SIMPAN
                                                </a>
                                                <a href="{{ url()->previous() }}" class="btn btn-danger">BATAL</a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
    
    </div>

</div>

@endsection

@section('myjs')

@endsection

@section('myscript')

@endsection

