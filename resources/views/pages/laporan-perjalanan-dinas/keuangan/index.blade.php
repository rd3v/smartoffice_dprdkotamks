@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS {{ $komisi }}
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
                        <h4 class="page-title">Laporan Perjalanan Dinas {{ $komisi }}</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="active">Laporan Perjalanan Dinas</li>
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
                
                <!--row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">

                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-6 row-in-br" style="cursor: pointer;">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="display: inline;font-weight: bold">JUMLAH PERJALANAN DINAS</h4>
                                            <h5 class="text-muted vb"></h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger">30</h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 row-in-br  b-r-none" style="cursor: pointer;">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="display: inline;font-weight: bold">PERJALANAN DINAS YANG SELESAI</h4>
                                            <h5 class="text-muted vb"></h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna">22</h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 row-in-br" style="cursor: pointer;">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><h4 style="display: inline;font-weight: bold">SISA PERJALANAN DINAS</h4>
                                            <h5 class="text-muted vb"></h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary">8</h3>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                                        <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Perjalanan Dinas</h3>
                            <p class="text-muted m-b-30">Data di input langsung dari {{ $komisi }}</p>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Tujuan</th>
                                            <th>Anggota</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Tujuan</th>
                                            <th>Anggota</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ date('d-M-y') }}</td>
                                            <td>Perjalanan 1</td>
                                            <td>Nama, Nama, Nama</td>
                                            <td><button class="btn btn-danger btn-sm">Ditolak</button></td>
                                            <td><a href="{{ url('keuangan/laporan-perjalanan-dinas') }}/{{ $kode }}/validasi/22" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Validasi</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>{{ date('d-M-y') }}</td>
                                            <td>Perjalanan 2</td>
                                            <td>Nama, Nama, Nama</td>
                                            <td><button class="btn btn-success btn-sm">Diterima</button></td>
                                            <td><a href="{{ url('keuangan/laporan-perjalanan-dinas') }}/{{ $kode }}/validasi/22" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Lihat</a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
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
        });
        
         (function() {

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });

        })();

	</script>
@endsection