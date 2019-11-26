@extends('template.v1.temp')

@section('title_bar')
 DATA LAPORAN PERJALANAN DINAS
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                                            <th>Status</th>
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                      <?php 
                                       foreach($SuratTugas as $key => $value) { ?>
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
                                            <button class="btn btn-danger btn-md">Belum Diterima</button>
                                          </td>
                                          <td>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="seethis(<?= $value->id ?>)"><i class="fa fa-eye"></i> LIHAT SURAT TUGAS</button>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="notready()"><i class="fa fa-eye"></i> LIHAT SPD</button>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="notready()"><i class="fa fa-eye"></i> LIHAT RINCIAN</button>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="notready()"><i class="fa fa-eye"></i> LIHAT REKAPAN</button>
                                            <hr style="margin-top:1em;margin-bottom: 1em">
                                                
                                                <a href="{{ route('upload-kelengkapan',['id' => $value->persuratan_id]) }}" name="button" class="btn btn-primary"><i class="fa fa-file"></i>+ UPLOAD KELENGKAPAN</a>

                                               <?php if($value->kelengkapan_id != null) { ?>
                                                    <a href="{{ route('edit-kelengkapan',['id' => $value->persuratan_id]) }}" name="button" class="btn btn-danger"><i class="fa fa-trash"></i> HAPUS KELENGKAPAN</a>
                                                <?php } ?>
                                                
                                                <a href="{{ route('laporan-perjalanan-dinas.show',['id' => $value->kelengkapan_id]) }}" name="button" class="btn btn-info"><i class="fa fa-eye"></i> LIHAT KELENGKAPAN</a>
                                                <br><br>
                                                <button type="button" data-toggle="modal" data-target="#myModal" data-kelengkapan_id="{{ $value->kelengkapan_id }}" class="btn btn-warning btnkoreksi"><i class="fa fa-comment"></i> LIHAT KOREKSI KELENGKAPAN</button>

                                          </td>
                                        </tr>
                                     <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

                        <!-- modal content -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-comment"></i> Koreksi Kelengkapan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <th>Tanggal</th>
                                                    <th>Koreksi</th>
                                                </thead>
                                                <tbody id="koreksi">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
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

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $(".btnkoreksi").click(function() {
                    var kelengkapan_id = $(this).data("kelengkapan_id");
                    
                    $.ajax({
                        url:"{{ url('komisi/getcomments') }}",
                        type:"post",
                        data:{kelengkapan_id:kelengkapan_id},
                        dataType:"json"
                    }).done(function(res) {
                        var html = "";
                        html += "<tr>";
                        if(res.length>0) {
                            for (var i = res.length - 1; i >= 0; i--) {
                                var timestamp = (res[i].created_at).toString();
                                var tanggal = timestamp.split(" ");
                                var new_tanggal = tanggal[0].split("-");

                                html += "<td>" + new_tanggal[2]+"-"+new_tanggal[1]+"-"+new_tanggal[0] + " " + tanggal[1] + "</td>";
                                html += "<td>" + res[i].comment + "</td>";
                            }
                        } else {
                            html += "<td colspan='2' class='text-center'><h3>Tidak Koreksi</h3></td>";
                        }

                        html += "</tr>";
                        $("tbody#koreksi").html(html);
                    }).fail(function(res) {
                        console.log(res);
                    });

               });
        });
        
         (function() {

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });

        })();

      function seethis(id) {

        window.open("<?= url('komisi/surat-tugas/printthis') ?>" + '/' + id);

      }

      function notready() {
        Swal.fire("Belum ada surat","","info");
      }

	</script>
@endsection