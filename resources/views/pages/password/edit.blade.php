@extends('template.v1.temp')

@section('csrf_header')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title_bar')
 {{ config('app.name') }}
@endsection

@section('css')
      <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
      <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
@endsection

@section('konten')
	<div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Ganti Password</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="active">Ganti Password</li>
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
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="old-pwd">Password Lama</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input name="old-pwd" type="password" class="form-control" id="old-pwd" placeholder="Password Lama">
                                            </div>
                                        </div>
                                        <div class="form-group" id="div-new-pwd">
                                            <label for="new-pwd">Password Baru</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input name="new-pwd" type="password" class="form-control" id="new-pwd" placeholder="Password Baru">
                                            </div>
                                        </div>
                                        <div class="form-group" id="div-confirm-pwd">
                                            <label for="confirm-pwd" class="control-label">Konfirmasi Password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input name="confirm-pwd" type="password" class="form-control" id="config" placeholder="Konfirmasi Password">
                                            </div>
                                            <span class="help-block" style="display:none"> Password tidak sama. </span>
                                        </div>
                                        <button disabled type="button" class="btn btn-success waves-effect waves-light m-r-10" id="simpan">Simpan</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-inverse waves-effect waves-light">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection

@section('js')
    <script src="{{ URL::asset('public/assets/v2') }}//plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <script src="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="{{ URL::asset('public/assets/v2') }}/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
@endsection

@section('myScript')
	<script>
		$(document).ready(function() {

			$("input[name='old-pwd']").on("input", function() {
				if($(this).val() != "" && $("input[name='new-pwd']").val() != "" && $("input[name='confirm-pwd']").val()) {
					$("button#simpan").removeAttr("disabled");
				} else {
					$("button#simpan").attr("disabled", "disabled");
				}
			});

			$("input[name='new-pwd']").on("input", function() {
				if($(this).val() != "" && $("input[name='old-pwd']").val() != "" && $("input[name='confirm-pwd']").val()) {
					$("button#simpan").removeAttr("disabled");
				} else {
					$("button#simpan").attr("disabled", "disabled");
				}
			});

			$("input[name='confirm-pwd']").on("input", function() {
				if($(this).val() != "" && $("input[name='old-pwd']").val() != "" && $("input[name='new-pwd']").val()) {
					$("button#simpan").removeAttr("disabled");
				} else {
					$("button#simpan").attr("disabled", "disabled");
				}

				if($(this).val() != $("input[name='new-pwd']").val()) {
					$("div#div-confirm-pwd").addClass("has-error");
					$(".help-block").css("display","");
				} else {
					$("div#div-confirm-pwd").removeClass("has-error");
					$(".help-block").css("display","none");
				}
			});

			$("button#simpan").click(function() {
		        
		        swal({   
		            title: "Yakin mengubah password anda ?",   
		            text: "Anda akan di arahkan ke halaman login untuk validasi password anda",   
		            type: "warning",   
		            showCancelButton: true,   
		            confirmButtonColor: "#DD6B55",   
		            confirmButtonText: "Yes, ubah password saya",   
		            cancelButtonText: "Batalkan",
		            closeOnConfirm: false,   
		            closeOnCancel: false,
		            showLoaderOnConfirm: true,
		        }, function(isConfirm){   
		            if (isConfirm) {     
		            	var old_pwd = $("input[name='old-pwd']").val();
		            	var new_pwd = $("input[name='new-pwd']").val();
		            	var confirm_pwd = $("input[name='confirm-pwd']").val();
		            	
		            	$("input[name='old-pwd']").val("");
		            	$("input[name='new-pwd']").val("");
		            	$("input[name='confirm-pwd']").val("");

		            	$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});

		            	$.ajax({
		            		url:"{{ url('password') }}/{{ $user->id }}",
		            		type:"put",
		            		data:{
		            			"old_pwd":old_pwd,
		            			"new_pwd":new_pwd,
		            			"confirm_pwd":confirm_pwd
		            		},
		            		dataType:"json"
		            	}).done(function(res) {

		            		if(res.state) {
			                	swal({
			                		title:res.title,
			                		text:res.text,
			                		type:res.type
			                	}, function(isConfirm) {
			                		document.location="{{ url('/') }}";
			                	});   
		            		} else {
			                	swal({
			                		title:res.title,
			                		text:res.text,
			                		type:res.type
			                	}, function(isConfirm) {
			                		document.location='{{ url('') }}';
			                	});
		            		}

		            	}).fail(function(res) {
		                	swal("Terjadi Kesalahan", "Silahkan periksa kembali koneksi internet anda dan coba lagi atau hubungi admin", "error");
		            	});

		            } else {     
		                swal("Cancelled", "Your imaginary file is safe :)", "error");   
		            }

		        });

		    });

		});
	</script>
@endsection