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
                        <h4 class="page-title">Data Komisi</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="active">Data Komisi</li>
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


                <p><a class="btn btn-success" href="{{ url('data-komisi/create') }}">TAMBAH KOMISI +</a></p>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KOMISI</th>
                                <th>BIDANG</th>
                                <th class="text-nowrap">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@if(count($komisi) != 0)
	                        	@php
	                        		$no = 1;
	                        	@endphp
	                        	@foreach($komisi as $value)
	                            <tr>
	                                <td>{{ $no }}</td>
	                                <td>{{ strtoupper($value->komisi) }}</td>
	                                <td>{{ strtoupper($value->bidang) }}</td>
	                                <td class="text-nowrap">
	                                    <a href="{{ url('data-komisi/lihatanggota',['id' => $value->id]) }}" data-toggle="tooltip" data-original-title="Lihat Anggota"> <i class="fa fa-group text-inverse m-r-10"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-original-title="Akses"> <i class="fa fa-lock text-inverse m-r-10"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-original-title="Edit Komisi"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
	                                    <a href="#" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i> </a>
	                                </td>
	                            </tr>
	                            <?php $no++; ?>
	                            @endforeach
							@else
								<tr><td colspan="4" class="text-center"><p>BELUM ADA DATA</p></td></tr>
                        	@endif

                        </tbody>
                    </table>
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

