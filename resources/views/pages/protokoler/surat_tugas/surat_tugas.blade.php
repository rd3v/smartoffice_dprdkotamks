<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('public/assets/v2') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .table-borderless td {
          border: 0;
        }

        table  {
              border-collapse: separate;
              border-spacing:0 0;
        }

        td {
          padding-top: 0 !important;
          padding-bottom: 0 !important;
        }

    </style>
</head>
<body>

  <div class="container-fluid">
    <br>
    <div class="row">
      <div class="col-md-2">
        <img src="{{ asset('public/assets/v2/images/dprd.jpeg') }}" alt="Logo" width="75px">
      </div>
      <div class="col-md-10 text-center">
        <h1 style="font-size:1.5em;font-weight:bold">DEWAN PERWAKILAN RAKYAT DAERAH <br> KOTA MAKASSAR</h1>
        <p>
          {{ $data->alamat.' Telp. '.$data->telepon.' Fax. '.$data->fax.' '.$data->kodepos  }} <br>
          {{ 'Email : '.$data->email.' Homepage:.'.$data->homepage }}
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <hr style="border: 1px solid black; margin-bottom: .7px">
          <hr style="border: 1px solid black; margin-top: 0">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
          <h4 style="text-decoration:underline">SURAT TUGAS</h4>
          <h6>Nomor : {{ strtoupper($SuratTugas->nomor) }}</h6>
      </div>
      <div class="col-md-12">
          <h6 style="font-weight:normal;padding-left:4em;margin-top:0.7em">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Berdasarkan surat dari {{ ucwords($SuratTugas->berdasarkan_surat) }}
            Tanggal, {{ $SuratTugas->tanggal_surat_masuk }} Perihal : {{ ucwords($SuratTugas->perihal) }}, Maka Pimpinan DPRD Kota Makassar :</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <h6 style="margin-top:0.7em">M E N U G A S K A N</h6>
      </div>
    </div>
    <div class="row">
      <span class="col-md-1">Kepada</span>
      <span class="col-md-1">:</span>
    </div>
    <div class="row">
        <div class="col-md-6" style="padding-left:0">

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <ul style="list-style:none;">
                <?php foreach ($AnggotaDewan as $key => $value): ?>
                  <li style="font-weight:bold"><?= ($key+1).'. '.$value->anggota_dewan->nama ?></li>
                  <li>(<?= ucwords($value->anggota_dewan->jabatan_text) ?>)</li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>


        </div>
    </div>

    <div class="row">
      <span class="col-md-1">Untuk</span>
        <div class="col-md-10" style="padding-left:0;">
            :<ol>
                <li>{{ $SuratTugas->untuk_maksud }} {{ $SuratTugas->tanggal_mulai }} s/d {{ $SuratTugas->tanggal_akhir }}</li>
                <li>Segala Biaya yang timbul sehubungan dengan pelaksanaan Surat Tugas ini dibebankan pada APBD Kota Makassar Tahun Anggaran {{ $SuratTugas->tahun_anggaran }}</li>
                <li>Setelah selesai melaksanakan tugas, diharapkan segera menyetorkan dokumen perjalanannya paling lambat 5 hari setelah melakukan perjalanan dinas</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-1" style="padding-left:0"></div>
      <div class="col-md-11" style="padding-left:0">
        <p>Demikian Surat Tugas ini dikeluarkan, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-8">

      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-borderless">
              <tr>
                <td>Dikeluarkan</td>
                <td>:</td>
                <td>{{ ucfirst($SuratTugas->tempat_dikeluarkan) }}</td>
              </tr>
              <tr>
                <td>Pada Tanggal</td>
                <td>:</td>
                <td>{{ $SuratTugas->tanggal_dikeluarkan }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <p style="font-weight:bold">{{ ucwords($SuratTugas->jabatan) }}</p>
      </div>
    </div>

    <br><br><br><br>

    <div class="row text-center">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <p style="font-weight:bold">{{ strtoupper($SuratTugas->nama_yang_bertanda_tangan) }}</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        Tembusan :
      </div>
      <div class="col-md-12">
        <ol>
          <li>Pimpinan DPRD Kota Makassar</li>
          <li>Kabag. Keuangan Sek. DPRD Kota Makassar</li>
          <li>Kabag. Umum Sek. DPRD Kota Makassar</li>
          <li>Kasubag Protokol Bag. Umum Sek. DPRD Kota Makassar</li>
          <li>Masing - masing yang bersangkutan untuk dilaksanakan</li>
          <li>Pertinggal,-</li>
        </ol>
      </div>
    </div>

    <br>

  </div>

</body>
</html>
