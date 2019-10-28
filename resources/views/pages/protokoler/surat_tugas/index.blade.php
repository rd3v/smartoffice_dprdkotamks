@extends('template.v1.temp')

@section('title_bar')
  Daftar Surat Tugas
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
                        <h4 class="page-title">Surat Tugas</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="active">Surat Tugas</li>
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

                            <a href="{{ route('surat-tugas.create') }}" class="btn btn-success" style="float:right"><i class="fa fa-file"></i>+ Buat Surat Tugas</a>

                            <h3 class="box-title m-b-0">Data Surat Tugas</h3>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0">
                                    <thead>
                                            <th>No</th>
                                            <th>Nomor</th>
                                            <th>Surat</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Perihal</th>
                                            <th>Lama Kegiatan</th>
                                            <th>Aksi</th>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nomor</th>
                                            <th>Surat</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Perihal</th>
                                            <th>Lama Kegiatan</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    <tbody>
                                      <?php foreach($SuratTugas as $key => $value) { ?>
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

                                          <td><?= $str_tanggal_mulai[2].' / '.$str_tanggal_mulai[1].' / '.$str_tanggal_mulai[0].' - '.$str_tanggal_akhir[2].' / '.$str_tanggal_akhir[1].' / '.$str_tanggal_akhir[0].' ('.$days->format('%a').' Hari)' ?> </td>
                                          <td>
                                            <button type="button" name="button" class="btn btn-primary" onclick="printthis(<?= $value->id ?>)"><i class="fa fa-print"></i> PRINT</button>
                                            <button type="button" name="button" class="btn btn-info" onclick="createspd()"><i class="fa fa-file"></i>+ BUAT SPD</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>

@endsection

@section('myscript')
    <script>

      function printthis(id) {

        var w = window.open("<?= url('protokoler/surat-tugas/printthis') ?>" + '/' + id);
        w.print();

      }

      function createspd() {
        Swal.fire({
          title:"Dokumen SPD sedang dalam pengerjaan",
          text:"",
          type:"info"
        });
      }

      // function hapus(id) {
      //
      //   Swal.fire({
      //     title: 'Hapus data ini ?',
      //     text: "Data akan tersimpan permanen jika telah konfirmasi",
      //     type: 'warning',
      //     showCancelButton: true,
      //     confirmButtonColor: '#3085d6',
      //     cancelButtonColor: '#d33',
      //     confirmButtonText: 'Ya',
      //     cancelButtonText: 'Tidak',
      //     allowOutsideClick:false,
      //     showLoaderOnConfirm: true,
      //   }).then((result) => {
      //
      //   });
      //
      // }

        $(document).ready(function() {
             $('#example23').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
              });
        });

         (function() {

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });

        })();

    </script>
@endsection
