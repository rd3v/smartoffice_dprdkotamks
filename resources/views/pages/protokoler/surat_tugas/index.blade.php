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

                            <h3 class="box-title m-b-0">Data Surat Tugas |
                              <b>
                                @if($user->protokoler_type == 'ad')
                                  Komisi
                                @elseif($user->protokoler_type == 'staff')
                                  Staff
                                @endif
                              </b>
                            </h3>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table id="table-surat" class="display responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                            <th>No</th>
                                            <th>Nomor</th>
                                            <th>Surat</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Perihal</th>
                                            <th>Tempat</th>
                                            <th>Lama Kegiatan</th>
                                            <th>Aksi</th>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Nomor</th>
                                            <th>Surat</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Perihal</th>
                                            <th>Tempat</th>
                                            <th>Lama Kegiatan</th>
                                            <th>Aksi</th>
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
                                          <td><?= ucfirst($value->tempat) ?></td>
                                          <?php
                                            $date1 = date_create($value->tanggal_mulai);
                                            $date2 = date_create($value->tanggal_akhir);
                                            $days  = date_diff($date1,$date2);
                                           
                                             $str_tanggal_mulai = explode('-',$value->tanggal_mulai);
                                             $str_tanggal_akhir = explode('-',$value->tanggal_akhir);
                                            ?>

                                          <td><?= $str_tanggal_mulai[2].' / '.$str_tanggal_mulai[1].' / '.$str_tanggal_mulai[0].' - '.$str_tanggal_akhir[2].' / '.$str_tanggal_akhir[1].' / '.$str_tanggal_akhir[0].' ('.($days->format('%a')+1).' Hari)' ?> </td>
                                          <td>
                                            
                                            <button type="button" name="button" class="btn btn-success" onclick="printthis(<?= $value->id ?>)"><i class="fa fa-print"></i> PRINT SURAT TUGAS</button>
                                            <br>
                                            @if($value->status != 'batal')
                                              @if($value->is_spd > 0)
                                              
                                                @foreach($value->spd as $spd)
                                                  <br>
                                                  <!-- <a href="{{ route('printthisspd',['id' => $spd->id]) }}" target="_blank" class="btn btn-success btn-outline"><i class="fa fa-print"></i> PRINT SPD {{ $spd->staff->nama }}</a> -->
                                                  @if($user->protokoler_type == 'ad')
                                                    <button onclick="printspd('{{$spd->id}}')" class="btn btn-success btn-outline"><i class="fa fa-print"></i> PRINT SPD {{ $spd->anggota_dewan->nama }}</button>
                                                  @elseif($user->protokoler_type == 'staff')
                                                    <button onclick="printspd('{{$spd->id}}')" class="btn btn-success btn-outline"><i class="fa fa-print"></i> PRINT SPD {{ $spd->staff->nama }}</button>
                                                  @endif
                                                @endforeach
                                              
                                              @endif
                                            @endif
                                            <br>
                                              <a href="{{ url('protokoler/spd/buat/'.$value->id) }}" class="btn btn-info"><i class="fa fa-file"></i>+ BUAT SPD</a>
                                            <br><br>

                                              @if($user->protokoler_type == 'ad')
                                              <button onclick='print_rincian_awal("{{$value->id}}","ad","{{ ucfirst($value->tempat) }}")' class="btn btn-success"><i class="fa fa-print"></i> PRINT RINCIAN AWAL</button>
                                                  
                                              @elseif($user->protokoler_type == 'staff')
                                              <button onclick='print_rincian_awal("{{$value->id}}","staff","{{ ucfirst($value->tempat) }}")' class="btn btn-success"><i class="fa fa-print"></i> PRINT RINCIAN AWAL</button>
                                              @endif
                                            
                                            <br><br>

                                              <button type="button" name="button" class="btn btn-danger btn-batal" data-id="{{ $value->persuratan_id }}" data-nomor="{{ $value->nomor }}"><i class="fa fa-close"></i> BATAL</button>   
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
  
        $(document).ready(function() {
             
             $('#table-surat').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  responsive:true
              });
               $("[data-toggle=popover]").popover({html:true});             

        });

         (function() {

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });

        })();

      function print_rincian_awal(surat_tugas_id,type,tujuan) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = "";
            if (type == 'ad') {
              url = "{{ url('getAnggotaDewan') }}";
            } else if(type == 'staff') {
              url = "{{ url('getStaff') }}";
            }

            $.ajax({
                url:url,
                type:"post",
                data:{surat_tugas_id:surat_tugas_id},
                dataType:"json"
            }).done(function(res) {

              var html = "";
              html += "<input type='text' value='Makassar - "+tujuan+"' class='form-control' style='margin-bottom:0.5em' readonly>";
              html += "<input name='asal' type='number' placeholder='Harga Tiket Makassar' class='form-control' style='margin-bottom:0.5em'>";
              html += "<input name='tujuan' type='number' placeholder='Harga Tiket "+tujuan+"' class='form-control' style='margin-bottom:0.5em'>";
              html += "<select name='anggota' class='form-control'>";
              if(type == 'ad') {
                for (var i = res.length - 1; i >= 0; i--) {
                   html += "<option value='"+res[i].anggota_dewan.id+"'>" + res[i].anggota_dewan.nama + "</option>";
                }
              } else if(type == 'staff') {
                for (var i = res.length - 1; i >= 0; i--) {
                   html += "<option value='"+res[i].staff.id+"'>" + res[i].staff.nama + "</option>";
                }
              }

              html += "</select>";

              Swal.fire({
                title: "PRINT RINCIAN AWAL",
                html:html,
                confirmButtonText: '<i class="fa fa-print"></i> PRINT RINCIAN AWAL',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-success',
                onOpen: function() {
                      swal.disableConfirmButton();

                      $("input[name=asal]").on('input', function() {
                        if($(this).val() != "" && $("input[name=tujuan]").val() != "") {
                            swal.enableConfirmButton();
                          } else {
                            swal.disableConfirmButton();
                          }
                      });

                      $("input[name=tujuan]").on('input', function() {
                        if($(this).val() != "" && $("input[name=asal]").val() != "") {
                            swal.enableConfirmButton();
                          } else {
                            swal.disableConfirmButton();
                          }
                      });

                  }
                }).then(function (result) {
                    
                    var anggota_id = $("select[name=anggota]").val();
                    var asal = $("input[name=asal]").val();
                    var tujuan = $("input[name=tujuan]").val();

                    if(result.value) {
                      var w = window.open("{{ url('protokoler/rincian-awal/print') }}/"+surat_tugas_id+"/"+anggota_id+"/"+asal+"/"+tujuan,"_blank");
                      w.print();
                    }

                }).catch(swal.noop)

            }).fail(function(res) {
                console.log(res);
            });

      }

      $(document).on('click','.btn-batal',function(e) {
          var id = $(this).data("id");
          var nomor = $(this).data("nomor");

              Swal.fire({
                title: 'Batalkan surat tugas '+nomor+' ?',
                text: "Data akan terhapus permanen jika telah konfirmasi",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                allowOutsideClick:false,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                  return new Promise(function(resolve) {
                    setTimeout(function() {

                      fetch("<?= url('protokoler/updateStatusBatal') ?>/" + id)
                        .then(response => {

                          if (!response.ok) {
                            throw new Error(response.statusText)
                          }

                           response.text().then((res) => {

                              var json = JSON.parse(res);

                              if(json.state) {
                                Swal.fire({
                                  title:json.title,
                                  text:json.text,
                                  type:json.type
                                }).then((result) => {
                                    if(result.value) {
                                      location.reload();
                                    }
                                })

                              } else {
                                Swal.fire({
                                  title:json.title,
                                  text:json.text,
                                  type:json.type
                                });
                              }

                            })

                        })
                        .catch(error => {
                          Swal.showValidationMessage(
                            `Request failed: ${error}`
                          )
                        })

                    }, 2000)

                  })

                }
              });


      });

      function printthis(id) {
        var w = window.open("<?= url('protokoler/surat-tugas/printthis') ?>" + '/' + id);
        w.print();
      }

      function printspd(id) {
        var w = window.open("<?= url('protokoler/spd/printthis') ?>" + '/' + id);
        w.print();
      }

    </script>
@endsection
