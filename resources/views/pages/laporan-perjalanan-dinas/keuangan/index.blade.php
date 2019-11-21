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

<!--                             <div class="row row-in">
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
 -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Perjalanan Dinas</h3>
@if (session('response'))
    <div class="alert alert-danger">
        {{ session('response') }}
    </div>
@endif
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor</th>
                                            <th>Surat</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Perihal</th>
                                            <th>Lama Kegiatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor</th>
                                            <th>Surat</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Perihal</th>
                                            <th>Lama Kegiatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                       
                                       @foreach($SuratTugas as $key => $value)
                                        <tr>
                                          <td><?= ($key+1) ?></td>
                                          <td><?= strtoupper($value->nomor) ?></td>
                                          <td><?= ucwords($value->berdasarkan_surat) ?></td>
                                          <?php
                                              $str_tanggal_surat_masuk = explode('-',$value->tanggal_surat_masuk);
                                           ?>
                                          <td><?= $str_tanggal_surat_masuk[2].' / '.$str_tanggal_surat_masuk[1].' / '.$str_tanggal_surat_masuk[0] ?></td>
                                          <td><?= ucwords($value->perihal) ?></td>
                                          <?php
                                            $date1 = date_create($value->tanggal_mulai);
                                            $date2 = date_create($value->tanggal_akhir);
                                            $days  = date_diff($date1,$date2);
                                           ?>
                                           <?php
                                               $str_tanggal_mulai = explode('-',$value->tanggal_mulai);
                                               $str_tanggal_akhir = explode('-',$value->tanggal_akhir);
                                            ?>

                                          <td><?= $str_tanggal_mulai[2].' / '.$str_tanggal_mulai[1].' / '.$str_tanggal_mulai[0].' - '.$str_tanggal_akhir[2].' / '.$str_tanggal_akhir[1].' / '.$str_tanggal_akhir[0].' ('.($days->format('%a')+1).' Hari)' ?> </td>
                                          <td>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="seethis(<?= $value->id ?>)"><i class="fa fa-eye"></i> LIHAT SURAT TUGAS</button>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="notready()"><i class="fa fa-eye"></i> LIHAT SPD</button>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="notready()"><i class="fa fa-eye"></i> LIHAT RINCIAN AWAL</button>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="notready()"><i class="fa fa-eye"></i> LIHAT REKAPAN</button>
                                            <hr style="margin-top:1em;margin-bottom: 1em">
                                             
                                                @if($value->status != 'batal')
                                                    @if($value->kelengkapan_id != null)
                                                        <a href="{{ route('ceklaporan',['id' => $value->kelengkapan_id]) }}" name="button" class="btn btn-info"><i class="fa fa-check"></i> CEK KELENGKAPAN</a>
                                                        <a href="{{ route('upload-kelengkapan',['id' => $value->persuratan_id]) }}" name="button" class="btn btn-danger"><i class="fa fa-file"></i>+ BUAT RINCIAN AKHIR</a>
                                                    @endif
                                                @endif
                                          </td>
                                        </tr>
                                     @endforeach

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
        
      function seethis(id) {
        window.open("<?= url('keuangan/surat-tugas/printthis') ?>" + '/' + id);
      }

	</script>
@endsection