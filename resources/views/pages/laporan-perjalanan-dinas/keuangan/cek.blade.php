@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                        <h4 class="page-title">Laporan Perjalanan Dinas</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="#">Laporan Perjalanan Dinas</a></li>
                            <li class="active">Cek Kelengkapan</li>
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
                                    @php
                                        $name = explode(".",$tiketperjalanan->file);
                                    @endphp
                                    <div class="form-group row">
                                        <label style="font-size:1.5em" class="col-2 col-form-label">File {{ ($key+1) }} :</label>
                                        <div class="col-2">
                                            <a class="btn btn-info" href="{{ asset($storage_documents.'tiket_perjalanan/'.$tiketperjalanan->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <br>

                            @if(count($kelengkapan->invoice_hotel)>0)
                                <h3><u>Invoice Hotel</u></h3>
                                @foreach($kelengkapan->invoice_hotel as $key => $invoice_hotel)
                                    @php
                                        $name = explode(".",$invoice_hotel->file);
                                    @endphp
                                    <div class="form-group row">
                                        <label style="font-size:1.5em" class="col-2 col-form-label">File {{ ($key+1) }} :</label>
                                        <div class="col-2">
                                            <a class="btn btn-info" href="{{ asset($storage_documents.'invoice_hotel/'.$invoice_hotel->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            
                            @if(count($kelengkapan->foto_kegiatan)>0)
                                <h3><u>Foto Kegiatan</u></h3>
                                @foreach($kelengkapan->foto_kegiatan as $key => $foto_kegiatan)
                                    @php
                                        $name = explode(".",$foto_kegiatan->file);
                                    @endphp
                                    <div class="form-group row">
                                        <label style="font-size:1.5em" class="col-2 col-form-label">File {{ ($key+1) }} :</label>
                                        <div class="col-2">
                                            <a class="btn btn-info" href="{{ asset($storage_documents.'foto_kegiatan/'.$foto_kegiatan->file) }}" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            

                            <br>

                <div class="row">
                    <div class="col-sm-12">
                        <h2>Koreksi</h2>
                        <div class="table-responsive">
                            <table id="tblcomments" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Koreksi</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($comments as $key => $comment)
                                        <tr>
                                            <td>{{ ($key+1) }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>{{ $comment->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                        
                        </div>
                    </div>
                </div>

                            <label for="koreksi">Kirim Koreksi</label>
                            <div class="has-error">
                                <textarea name="koreksi" id="koreksi" cols="30" rows="10" class="form-control" style="margin-bottom:0.5em"></textarea>
                                <button class="btn btn-danger" id="koreksi" data-id="{{ $kelengkapan->id }}"><i class="fa fa-paper-plane"></i> Kirim</button> | <a href="{{ url('keuangan/laporan-perjalanan-dinas') }}" class="btn btn-default"><b>Kembali</b></a>
                            </div>                           

                        </div>
                    </div>
                </div>
                


            </div>
        </div>
@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
<script src="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
@endsection

@section('myscript')
	<script>

        $(document).ready(function() {
               $('#tblcomments').DataTable();
        });


            $("button#koreksi").click(function() {
                var id = $(this).data("id");
                var name = $(this).data("name");
                var comment = $("textarea[name=koreksi").val();

                $.ajax({
                    url:"{{ route('postTiketPerjalananComment') }}",
                    type:"post",
                    data:{_token:"{{ csrf_token() }}",id:id,comment:comment},
                    dataType:"json"
                }).done(function(res) {
                    Swal.fire({
                        title:res.title,
                        type:res.type,
                        timer:2000,
                        showConfirmButton:false,
                        onBeforeOpen: () => {
                            timerInterval = setInterval(() => {}, 100)
                          },
                          onClose: () => {
                            clearInterval(timerInterval)
                            location.reload();
                          }                        
                    })
                }).fail(function(res) {
                    console.log(res);
                    Swal.fire("Something went wrong...","","danger");
                });

            });

	</script>
@endsection