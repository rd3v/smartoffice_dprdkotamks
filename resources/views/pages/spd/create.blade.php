@extends('template.v1.temp')

@section('title_bar')
  Buat Surat Perjalanan Dinas
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
                <h4 class="page-title">Buat Surat Perjalanan Dinas</h4>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    <li><a href="{{ url('protokoler/surat-tugas') }}">Perjalanan Dinas</a></li>
                    <li class="active">Buat Surat Perjalanan Dinas</li>
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
					<button type="button" onclick="seethis('{{ $surat_tugas->id}}')" class="btn btn-info"><i class="fa fa-eye"></i> LIHAT SURAT TUGAS</button>
					<p><br></p>
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

                        <div class="form-group row">
                          <label for="dari" class="col-2 col-form-label">Perjalanan Dinas yang diperintahkan</label>
                          <label for="dari" class="col-1 col-form-label">Dari : </label>
                          <div class="col-2">
                            <input name="dari" class="form-control" type="text" id="dari" value="Makassar" readonly>
                          </div>
                          <label for="ke" class="col-1 col-form-label">Ke : </label>
                          <div class="col-2">
                            <input name="ke" class="form-control" type="text" id="ke" value="{{ ucfirst($surat_tugas->tempat) }}" readonly>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe_transportasi" class="col-2 col-form-label">Tipe Transportasi</label>
                            <div class="col-10">
                                <select class="form-control" name="tipe_transportasi" id="tipe_transportasi" required>
                                    <option value="">== Pilih ==</option>
                                    <option value="darat">Darat</option>
                                    <option value="laut">Laut</option>
                                    <option value="udara">Udara</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success" onclick="print_confirm()">Buat Surat Perjalanan Dinas</button>
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

        var mydata = {};
        var persuratan_id = $("input[name=persuratan_id]").val();
        var surat_tugas_id = $("input[name=surat_tugas_id]").val();
        var nomor = $("input[name=nomor]").val();
        var nama_pejabat = $("select[name=nama_pejabat]").val();
        var jabatan = $("input[name=jabatan]").val();
        var tipe_transportasi = $("select[name=tipe_transportasi]").val();

        mydata.nomor = nomor;
        mydata.persuratan_id = persuratan_id;
        mydata.surat_tugas_id = surat_tugas_id;
        mydata.nama_pejabat = nama_pejabat;
        mydata.jabatan = jabatan;
        mydata.tipe_transportasi = tipe_transportasi;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(mydata.nomor == "") {

            Swal.fire({
                title: 'Nomor Surat Kosong',
                text: "",
                type: 'warning'
            });

        } else if(mydata.nama_pejabat == "") {

            Swal.fire({
                title: 'Anda belum memilih Nama Pejabat',
                text: "",
                type: 'warning'
            });

        } else {

            $.ajax({
              url:"<?= route('spd.store') ?>",
              type:"post",
              data:mydata,
              dataType:"json"
            }).done(function(res) {
              console.log(res);

              var w = window.open("<?= route('printSPD') ?>");
              w.print();

              Swal.fire({
                title: 'SPD sudah di cetak ?',
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

                      fetch("<?= route('updateStatusSuratPerjalananDinasVerified') ?>")
                        .then(response => {
                          if (!response.ok) {
                            throw new Error(response.statusText)
                          }

                              Swal.fire({
                                title:res.title,
                                text:res.text,
                                type:res.type
                              }).then((result) => {
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

            }).fail(function(res) {
              console.log(res);
              Swal.fire('Terjadi kesalahan','Gagal membuat surat perjalanan dinas, silahkan hubungi admin','error');
            });

        }

      }

      function seethis(id) {
		window.open("<?= url('protokoler/surat-tugas/printthis') ?>" + '/' + id);
      }


  </script>

@endsection
