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
          font-size: 0.9em;
        }

    </style>
</head>
<body>

  <div class="container-fluid">

    <div class="row" style="margin-top:12em">
      <div class="col-md-12 text-center">
          <p style="text-decoration:underline;font-size:0.7em;font-weight:bolder;margin-bottom: 0">SURAT TUGAS</p>
          <p style="font-size:0.7em;">Nomor : {{ strtoupper($SuratTugas->nomor) }}</p>
      </div>
      <div class="col-md-12">
          <p style="font-weight:normal;padding-left:4em;margin-top:0.5em;font-size: 0.6em">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Berdasarkan surat dari {{ ucwords($SuratTugas->berdasarkan_surat) }} Nomor : {{ ucwords($SuratTugas->nomor_surat_komisi) }} 
            Tanggal, {{ $SuratTugas->tanggal_surat_masuk }} Perihal : {{ ucwords($SuratTugas->perihal) }}, Maka Pimpinan DPRD Kota Makassar :</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p style="margin-top:0.7em;font-size: 0.7em;font-weight:bolder">M E N U G A S K A N</p>
      </div>
    </div>
    <div class="row">
      <span class="col-md-1" style="font-size: 0.7em">Kepada</span>
      <span class="col-md-1" style="font-size: 0.7em">:</span>
    </div>
    <div class="row">
        <div class="col-md-6" style="padding-left:0">

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <ul style="list-style:none;font-size: 0.7em">
                <?php
                  if ($user->protokoler_type == 'ad') {
                   foreach ($AnggotaDewan as $key => $value): ?>
                    <li style="font-weight:bold;"><?= ($key+1).'. '.$value->anggota_dewan->nama ?></li>
                    <li>(<?= ucwords($value->anggota_dewan->jabatan_text) ?>)</li>
                <?php endforeach; 
                  } elseif($user->protokoler_type == 'staff') {
                    foreach ($Staff as $key => $value): ?>
                    <li style="font-weight:bold;"><?= ($key+1).'. '.$value->staff->nama ?></li>
                    <li style="">(<?= ucwords($value->staff->jabatan) ?>)</li>
                <?php endforeach; 
                  }
                ?>

              </ul>
            </div>
          </div>


        </div>
    </div>

    <div class="row">
      <span class="col-md-1" style="font-size: 0.7em">Untuk</span>
        <div class="col-md-10" style="padding-left:0;font-size: 0.8em">
            :<ol>
                <li style="font-size: 0.7em">{{ $SuratTugas->untuk_maksud }} {{ $SuratTugas->tanggal_mulai }} s/d {{ $SuratTugas->tanggal_akhir }}</li>
                <li style="font-size: 0.7em">Segala Biaya yang timbul sehubungan dengan pelaksanaan Surat Tugas ini dibebankan pada APBD Kota Makassar Tahun Anggaran {{ $SuratTugas->tahun_anggaran }}</li>
                <li style="font-size: 0.7em">Setelah selesai melaksanakan tugas, diharapkan segera menyetorkan dokumen perjalanannya paling lambat 5 hari setelah melakukan perjalanan dinas</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-1" style="padding-left:0"></div>
      <div class="col-md-11" style="padding-left:0">
        <p style="font-size: 0.6em">Demikian Surat Tugas ini dikeluarkan, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>
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
              <tr style="font-size: 0.6em">
                <td>Dikeluarkan</td>
                <td>:</td>
                <td>{{ ucfirst($SuratTugas->tempat_dikeluarkan) }}</td>
              </tr>
              <tr style="font-size: 0.6em">
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
        <p style="font-weight:bold;font-size: 0.6em">{{ ucwords($SuratTugas->jabatan) }}</p>
      </div>
    </div>

    <br><br><br><br>

    <div class="row text-center">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <p style="font-weight:bold;font-size: 0.6em">{{ strtoupper($SuratTugas->nama_yang_bertanda_tangan) }}</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12" style="font-size: 0.5em">
        Tembusan :
      </div>
      <div class="col-md-12" style="font-size: 0.5em">
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
