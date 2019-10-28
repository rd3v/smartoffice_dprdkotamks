@extends('template.v1.temp')

@section('title_bar')
  Buat Surat Tugas
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
                <h4 class="page-title">Buat Surat Tugas</h4>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    <li><a href="{{ url('protokoler/surat-tugas') }}">Surat Tugas</a></li>
                    <li class="active">Buat Surat Tugas</li>
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
                    <p class="text-muted m-b-30 font-13"> </p>
                    <form class="form">
                        <div class="form-group row">
                            <label for="nomor" class="col-2 col-form-label">Nomor</label>
                            <div class="col-10">
                                <input name="nomor" class="form-control" type="text" placeholder="Contoh : 093/512/DPRD/VIII/2019" id="nomor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_surat_masuk" class="col-2 col-form-label">Tanggal Surat Masuk</label>
                            <div class="col-10">
                                <input name="tanggal_surat_masuk" class="form-control" type="date" placeholder="" id="tanggal_surat_masuk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berdasarkan_surat" class="col-2 col-form-label">Berdasarkan Surat</label>
                            <div class="col-10">
                                <textarea placeholder="komisi b bidang perekonomian dan keuangan DPRD kota makassar nomor : KB/127/DPRD/VIII/2019" name="berdasarkan_surat" id="berdasarkan_surat" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="perihal" class="col-2 col-form-label">Perihal</label>
                          <div class="col-10">
                            <input name="perihal" class="form-control" type="text" id="perihal">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="menugaskan" class="col-2 col-form-label">Menugaskan</label>
                            <div class="col-10">
                              <select id='menugaskan' name="menugaskan" multiple='multiple'>
                                @foreach($anggota_dewan as $key => $value)
                                <option value='{{ $value->id }}'>{{ ($key+1).'. '.$value->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="untuk_maksud1" class="col-2 col-form-label">Untuk Maksud 1</label>
                            <div class="col-10">
                                <textarea name="untuk_maksud1" id="untuk_maksud1" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="untuk_maksud2" class="col-2 col-form-label">Untuk Maksud 2</label>
                            <div class="col-10">
                                <textarea placeholder="Kosongkan jika tidak ada" name="untuk_maksud2" id="untuk_maksud2" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="untuk_maksud3" class="col-2 col-form-label">Untuk Maksud 3</label>
                            <div class="col-10">
                                <textarea placeholder="Kosongkan jika tidak ada" name="untuk_maksud3" id="untuk_maksud3" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="untuk_maksud4" class="col-2 col-form-label">Untuk Maksud 4</label>
                            <div class="col-10">
                                <textarea placeholder="Kosongkan jika tidak ada" name="untuk_maksud4" id="untuk_maksud4" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="untuk_maksud5" class="col-2 col-form-label">Untuk Maksud 5</label>
                            <div class="col-10">
                                <textarea placeholder="kosongkan jika tidak ada" name="untuk_maksud5" id="untuk_maksud5" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat" class="col-2 col-form-label">Tempat Kegiatan</label>
                            <div class="col-10">
                                <input name="tempat" class="form-control" type="text" id="tempat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lama_kegiatan" class="col-2 col-form-label">Lama Kegiatan</label>
                            <div class="col-10">
                                <input name="lama_kegiatan" class="form-control input-daterange-datepicker" type="text" id="lama_kegiatan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun_anggaran" class="col-2 col-form-label">Tahun Anggaran</label>
                            <div class="col-10">
                                <input name="tahun_anggaran" class="form-control mydatepicker" type="number" id="tahun_anggaran">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lambat_penyetoran" class="col-2 col-form-label">Lambat Penyetoran</label>
                            <div class="col-10">
                                <input placeholder="Angka, Terhitung dalam hari" name="lambat_penyetoran" class="form-control" type="number" id="lambat_penyetoran">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat_dikeluarkan" class="col-2 col-form-label">Tempat Surat Dikeluarkan</label>
                            <div class="col-10">
                                <input placeholder="Contoh: Makassar" name="tempat_dikeluarkan" class="form-control" type="text" id="tempat_dikeluarkan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_dikeluarkan" class="col-2 col-form-label">Tanggal Surat Dikeluarkan</label>
                            <div class="col-10">
                                <input name="tanggal_dikeluarkan" class="form-control" type="date" id="tanggal_dikeluarkan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_yang_bertanda_tangan" class="col-2 col-form-label">Nama yang bertanda tangan</label>
                            <div class="col-10">
                                <select class="form-control" name="nama_yang_bertanda_tangan">
                                  @foreach($anggota_dewan as $value)
                                    @if($value->jabatan == 'ketua' or $value->jabatan == 'wakil')
                                      <option value="{{ $value->nama.'-'.$value->jabatan_text }}">{{ $value->nama }} - {{ ucwords($value->jabatan_text) }}</option>
                                    @endif
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success" onclick="print_confirm()">Buat Surat Tugas</button>
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

      $('#menugaskan').multiSelect();
      $('.input-daterange-datepicker').daterangepicker({
          buttonClasses: ['btn', 'btn-sm'],
          applyClass: 'btn-danger',
          cancelClass: 'btn-inverse'
      });
      $('.mydatepicker, #datepicker').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      });

      function print_confirm() {

        var mydata = {};
        var str_lama_kegiatan = $("input[name=lama_kegiatan]").val();
        var lama_kegiatan = str_lama_kegiatan.split(" - ");
        var str_tanggal_mulai = lama_kegiatan[0].split('/');
        var str_tanggal_akhir = lama_kegiatan[1].split('/');
        var tanggal_mulai = str_tanggal_mulai[2] + '-' + str_tanggal_mulai[1] + '-' + str_tanggal_mulai[0];
        var tanggal_akhir = str_tanggal_akhir[2] + '-' + str_tanggal_akhir[1] + '-' + str_tanggal_akhir[0];

        mydata.nomor = $("input[name=nomor]").val();
        mydata.berdasarkan_surat = $("textarea[name=berdasarkan_surat]").val();
        mydata.tanggal_surat_masuk = $("input[name=tanggal_surat_masuk]").val();
        mydata.perihal = $("input[name=perihal]").val();
        mydata.menugaskan = $("select[name=menugaskan]").val();
        mydata.untuk_maksud1 = $("textarea[name=untuk_maksud1]").val();
        mydata.untuk_maksud2 = $("textarea[name=untuk_maksud2]").val();
        mydata.untuk_maksud3 = $("textarea[name=untuk_maksud3]").val();
        mydata.untuk_maksud4 = $("textarea[name=untuk_maksud4]").val();
        mydata.untuk_maksud5 = $("textarea[name=untuk_maksud5]").val();
        mydata.tempat = $("input[name=tempat]").val();
        mydata.tanggal_mulai = tanggal_mulai;
        mydata.tanggal_akhir = tanggal_akhir;
        mydata.tahun_anggaran = $("input[name=tahun_anggaran]").val();
        mydata.lambat_penyetoran = $("input[name=lambat_penyetoran]").val();
        mydata.tempat_dikeluarkan = $("input[name=tempat_dikeluarkan]").val();
        mydata.tanggal_dikeluarkan = $("input[name=tanggal_dikeluarkan]").val();
        mydata.nama_yang_bertanda_tangan = $("select[name=nama_yang_bertanda_tangan]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(mydata.menugaskan == null) {

            Swal.fire({
                title: 'Anda belum memilih Anggota Dewan',
                text: "",
                type: 'warning'
            });

        } else {

            $.ajax({
              url:"<?= route('surat-tugas.store') ?>",
              type:"post",
              data:mydata,
              dataType:"json"
            }).done(function(res) {
              console.log(res);

            }).fail(function(res) {
              console.log(res);
            });

        }


        var w = window.open('<?= route('printSuratTugas',['id' => 'tes']) ?>');
        w.print();

        Swal.fire({
          title: 'Surat Tugas sudah di cetak ?',
          text: "Data akan tersimpan permanen jika telah konfirmasi",
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

                fetch("<?= route('updateStatusSuratTugasVerified') ?>")
                  .then(response => {
                    if (!response.ok) {
                      throw new Error(response.statusText)
                    }

                      Swal.fire(
                        'Sukses',
                        'Data telah tersimpan.',
                        'success'
                      ).then((result) => {
                          if(result.value) {
                            document.location = "<?= url('protokoler/surat-tugas') ?>";
                          }
                      })

                    // return response.json()
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


      }

  </script>

@endsection
