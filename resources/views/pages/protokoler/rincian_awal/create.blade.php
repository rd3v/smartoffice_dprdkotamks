@extends('template.v1.temp')

@section('title_bar')
  Buat Rincian Awal
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
    <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                <h4 class="page-title">Buat Rincian Awal</h4>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    <li><a href="{{ url('protokoler/surat-tugas') }}">Perjalanan Dinas</a></li>
                    <li class="active">Buat Rincian Awal</li>
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
                    <h3 class="box-title m-b-0"></h3>

                    <form class="form">
                        <div class="form-group row">
                            <label for="nomor" class="col-2 col-form-label">Nomor</label>
                            <div class="col-10">
                                <input type="hidden" name="surat_tugas_id" value="{{ $surat_tugas->id }}">
                                <input type="hidden" name="persuratan_id" value="{{ $surat_tugas->persuratan_id }}">
                                <input name="nomor" class="form-control" type="text" placeholder="Contoh : 093/512/DPRD/VIII/2019" id="nomor">

                        <div class="alert alert-danger text-center nomor-exist" style="border-color: red;display:none">
                          <h4 style="font-weight: bold">!!! Nomor Surat sudah ada</h4>
                        </div>

                            </div>
                        </div>                      
                        <div class="form-group row">
                            <label for="nama_pejabat" class="col-2 col-form-label">Nama Pejabat</label>
                            <div class="col-10">
                                <select class="form-control" name="nama_pejabat" id="nama_pejabat" required>
                                    <option value="">== Pilih ==</option>
                                    @foreach($surat_tugas->surat_tugas_anggota_dewan as $value)
                                        <option value="{{ $value->anggota_dewan->nama }}">{{ $value->anggota_dewan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Jabatan</label>
                            <div class="col-10">
                                <input name="jabatan" class="form-control" type="input" id="jabatan" readonly>
                            </div>
                        </div>
<br>
                        <div class="form-group row">
                            <div class="col-4"></div>
                          <h3 class="col-6 col-form-label text-danger">BIAYA PERJALANAN DINAS MELIPUTI</h3>
                        </div>
                        
                        <br>
                        <div class="form-group row">
                          <label class="col-2 col-form-label text-danger">PERJALANAN</label>
                          
                          <label for="perjalanan_dari" class="col-1 col-form-label">Dari : </label>
                          
                          <div class="col-2">
                                <select class="form-control" name="perjalanan_dari" id="perjalanan_dari" >
                                    <option value=""></option>
                                    <option value="makassar">Makassar</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="banten">Banten</option>
                                </select>                                    
                          </div>


                          <label for="perjalanan_ke" class="col-1 col-form-label">Ke : </label>
                          
                          <div class="col-2">
                                <select class="form-control" name="perjalanan_ke" id="perjalanan_ke" >
                                    <option value=""></option>
                                    <option value="makassar">Makassar</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="banten">Banten</option>
                                </select>
                          </div>

                          <button type="button" class="col-sm-2 btn btn-success" id="btn_perjalanan"><i class="fa fa-plus"></i> Tambahkan </button>

                        </div>

                        <br>

                        <div class="form-group row">
                          <label for="dari" class="col-2 col-form-label text-danger">BIAYA HOTEL</label>
                          
                          <label for="ke" class="col-1 col-form-label">Kota : </label>
                          
                          <div class="col-2">
                                <select class="form-control" name="biaya_hotel" id="biaya_hotel" required>
                                    <option value=""></option>
                                    <option value="makassar">Makassar</option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="banten">Banten</option>
                                </select>                                    
                          </div>


                          <label for="ke" class="col-2 col-form-label">Lama Menginap : </label>
                          
                          <div class="col-2">
                                <input type="number" class="form-control" name="hotel_lama_menginap">
                          </div>

                          <button type="button" class="col-sm-2 btn btn-success"><i class="fa fa-plus"></i> Tambahkan </button>

                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label text-danger">BIAYA HARIAN</label>

                          <div class="col-5">
                                <input type="number" class="form-control" name="biaya_harian" placeholder="Contoh: Rp2500000">
                          </div>
                          <button type="button" class="col-sm-2 btn btn-success btn_biayaharian"><i class="fa fa-plus"></i> Tambahkan </button>

                        </div>

                        <br>

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Rincian Biaya</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>PERINCIAN BIAYA</th>
                                            <th>HARI</th>
                                            <th>SATUAN</th>
                                            <th>JUMLAH</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_rincian">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                        <div class="form-group row">
                            <div class="col-md-8" style="margin-left:2em">
                                <button type="button" class="btn btn-success" onclick="print_confirm()"><i class="fa fa-print"></i> Buat Rincian Awal</button>
                                <a href="<?= url()->previous() ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </div>


                  </div>
                </div>
              </div>


  </div>
</div>


@endsection

@section('js')
  <script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
  <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/moment/moment.js"></script>
  <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
  <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>

  <script>

    var biaya_perjalanan = [
        {"asal":"makassar","tujuan":"jakarta","biaya":1277800},
        {"asal":"jakarta","tujuan":"makassar","biaya":2148000}
    ];

    var biaya_hotel = [
        {"jakarta":1490000},
        {"banten":1430000}
    ];

    var taksi = [
        {"makassar":145000},
        {"jakarta":170000}
    ];

    var datas = [];
    $("#btn_perjalanan").click(function() {
        var perjalanan_dari = $("select[name=perjalanan_dari]").val();
        var perjalanan_ke = $("select[name=perjalanan_ke]").val();

        if(perjalanan_dari == "" || perjalanan_ke == "") {
            alert("Silahkan pilih Asal dan Tujuan terlebih dahulu...");
        } else {
            var html = "";
            
            for (var i = biaya_perjalanan.length - 1; i >= 0; i--) {
                if(perjalanan_dari == biaya_perjalanan[i].asal && perjalanan_ke == biaya_perjalanan[i].tujuan) {
                    html += "<tr>";
                    html += "<td>"+(i)+"</td>";
                    html += "<td>"+biaya_perjalanan[i].asal+ " - " + biaya_perjalanan[i].tujuan +"</td>";
                    html += "<td>"+(1)+"</td>";
                    html += "<td></td>";
                    html += "<td>Rp"+biaya_perjalanan[i].biaya+"</td>";
                    html += "<td></td>";
                    html += "</tr>";
                }
            }

            $("#tbody_rincian").append(html);

        }
        
    });
    
    var jabatan = [];
    @foreach($surat_tugas->surat_tugas_anggota_dewan as $value)
        jabatan.push({
            "nama":"{{ $value->anggota_dewan->nama }}",
            "jabatan":"{{ $value->anggota_dewan->jabatan }}"
        });
    @endforeach

    $("select[name=nama_pejabat]").change(function() {
        var nama_pejabat = $(this).val();
        if(nama_pejabat != "") {        
            for (var i = jabatan.length - 1; i >= 0; i--) {
                if(jabatan[i].nama == nama_pejabat) {
                    $("input[name=jabatan]").val(jabatan[i].jabatan + " DPRD Kota Makassar");
                }
            }
        } else {
            $("input[name=jabatan]").val("");
        }
    });

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $("input[name=nomor]").on('input', function() {
          var nomor = $(this).val()
          $.ajax({
            url:"<?= url('protokoler/checkNomorSPD') ?>",
            type:"POST",
            data:{nomor:nomor},
            dataTYpe:"json"
          }).done(function(res) {
              if(res) $("div.nomor-exist").css("display",""); else $("div.nomor-exist").css("display","none");
          }).fail(function(res) {
              console.log(res);
          });

      });

      function print_confirm() {

        // var mydata = {};
        // var persuratan_id = $("input[name=persuratan_id]").val();
        // var surat_tugas_id = $("input[name=surat_tugas_id]").val();
        // var nomor = $("input[name=nomor]").val();
        // var nama_pejabat = $("select[name=nama_pejabat]").val();
        // var jabatan = $("input[name=jabatan]").val();
        // var tipe_transportasi = $("select[name=tipe_transportasi]").val();
        // var atas_beban = $("input[name=atas_beban]").val();
        // var kode_rekening = $("input[name=kode_rekening]").val();

        // mydata.nomor = nomor;
        // mydata.persuratan_id = persuratan_id;
        // mydata.surat_tugas_id = surat_tugas_id;
        // mydata.nama_pejabat = nama_pejabat;
        // mydata.jabatan = jabatan;
        // mydata.tipe_transportasi = tipe_transportasi;
        // mydata.atas_beban = atas_beban;
        // mydata.kode_rekening = kode_rekening;

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // if(mydata.nomor == "") {

        //     Swal.fire({
        //         title: 'Nomor Surat Kosong',
        //         text: "",
        //         type: 'warning'
        //     });

        // } else if(mydata.nama_pejabat == "") {

        //     Swal.fire({
        //         title: 'Anda belum memilih Nama Pejabat',
        //         text: "",
        //         type: 'warning'
        //     });

        // } else {

        //     $.ajax({
        //       url:"<?= route('spd.store') ?>",
        //       type:"post",
        //       data:mydata,
        //       dataType:"json"
        //     }).done(function(res) {
        //       console.log(res);

              var w = window.open("<?= route('printRincianAwal') ?>");
              w.print();

        //       Swal.fire({
        //         title: 'SPD sudah di cetak ?',
        //         text: "Data akan tersimpan permanen jika telah konfirmasi",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya',
        //         cancelButtonText: 'Tidak',
        //         allowOutsideClick:false,
        //         showLoaderOnConfirm: true,
        //         preConfirm: function() {
        //           return new Promise(function(resolve) {
        //             setTimeout(function() {

        //               fetch("<?= route('updateStatusSuratPerjalananDinasVerified') ?>")
        //                 .then(response => {
        //                   if (!response.ok) {
        //                     throw new Error(response.statusText)
        //                   }

        //                       Swal.fire({
        //                         title:res.title,
        //                         text:res.text,
        //                         type:res.type
        //                       }).then((result) => {
        //                           if(result.value) {
        //                             document.location = "<?= url('protokoler/surat-tugas') ?>";
        //                           }
        //                       })

        //                   // return response.json()
        //                 })
        //                 .catch(error => {
        //                   Swal.showValidationMessage(
        //                     `Request failed: ${error}`
        //                   )
        //                 })

        //             }, 2000)

        //           })

        //         }
        //       });

        //     }).fail(function(res) {
        //       console.log(res);
        //       Swal.fire('Terjadi kesalahan','Gagal membuat surat perjalanan dinas, silahkan hubungi admin','error');
        //     });

        // }

      }

      function seethis(id) {
        window.open("<?= url('protokoler/surat-tugas/printthis') ?>" + '/' + id);
      }


  </script>

@endsection
