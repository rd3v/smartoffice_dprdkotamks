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

    <div class="row" style="margin-top:11em">
      <div class="col-md-12 text-center">
          <p style="text-decoration:underline;font-size:0.7em;font-weight:bolder;margin-bottom: 0">SURAT TUGAS</p>
          <p style="font-size:0.7em;">Nomor : {{ strtoupper($SuratTugas->nomor) }}</p>
      </div>
      <div class="col-md-12">
          <p style="font-weight:normal;padding-left:1em;margin-top:0.5em;font-size: 0.7em">
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
      <span class="col-md-1" style="font-size: 0.7em">Kepada :</span>
      <span class="col-md-1" style="font-size: 0.7em"></span>
    </div>
    <div class="row">
        <div class="col-md-6" style="padding-left:0">

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <ul style="list-style:none;font-size: 0.7em">

                <?php
                  if ($user->protokoler_type == 'ad') {
                
                    if (count($AnggotaDewan) <= 10) { ?>
                          <div class="row">
                            
                      <?php foreach ($AnggotaDewan as $key => $value) { ?>
                          
                          <?php if ($key==0): ?>
                             <div class="col-md-6">
                          <?php endif; ?>

                          <?php if ($key<5): ?>
                              <li style="font-weight:bold;"><?= ($key+1).'. '.$value->anggota_dewan->nama ?></li>
                              <li>(<?= ucwords($value->anggota_dewan->jabatan_text) ?>)</li>
                          <?php endif; ?>

                          <?php if ($key==4): ?>
                             </div">
                          <?php endif; ?>

                          <?php if ($key==5): ?>
                             <div class="col-md-6">
                          <?php endif; ?>

                          <?php if ($key == 5 && $key <= 9): ?>
                              <li style="font-weight:bold;"><?= ($key+1).'. '.$value->anggota_dewan->nama ?></li>
                              <li>(<?= ucwords($value->anggota_dewan->jabatan_text) ?>)</li>
                          <?php endif; ?>

                          <?php if ($key==9): ?>
                             </div">
                          <?php endif; ?>
                    
                          

                  <?php } ?>
                          </div>

                  <?php }
                     

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
      <span class="col-md-1" style="font-size: 0.7em">Untuk :</span>
        <div class="col-md-10" style="padding-left:0;font-size: 0.7em">
            <ol>
                <li>{{ ucfirst($SuratTugas->untuk_maksud) }} {{ $SuratTugas->tanggal_mulai }} s/d {{ $SuratTugas->tanggal_akhir }}</li>
                <li>Segala Biaya yang timbul sehubungan dengan pelaksanaan Surat Tugas ini dibebankan pada APBD Kota Makassar Tahun Anggaran {{ $SuratTugas->tahun_anggaran }}</li>
                <li>Setelah selesai melaksanakan tugas, diharapkan segera menyetorkan dokumen perjalanannya paling lambat 5 hari setelah melakukan perjalanan dinas</li>
            </ol>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        
        <table class="table">
          <tr>
            <td>
<p style="font-size: 0.7em">Demikian Surat Tugas ini dikeluarkan, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>              
            </td>
          </tr>
        </table>
        
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-12">
        
            <table class="table table-borderless" style="font-size: 0.7em">
              <tr>
                <td></td>
                <td width="100px">Dikeluarkan</td>
                <td width="20px">:</td>
                <td width="120px">{{ ucfirst($SuratTugas->tempat_dikeluarkan) }}</td>
              </tr>
              <tr>
                <td></td>
                <td>Pada Tanggal</td>
                <td>:</td>
                <td>{{ $SuratTugas->tanggal_dikeluarkan }}</td>
              </tr>
            </table>

            <table class="table table-borderless" style="font-size: 0.7em;font-weight: bolder">
              <tr>
                <td width="70%"></td>
                <td><p>{{ ucwords($SuratTugas->jabatan) }}</p></td>
              </tr>
              <tr>
                <td></td>
                <td><p style="margin-top:60px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper($SuratTugas->nama_yang_bertanda_tangan) }}</p></td>
              </tr>
            </table>

      </div>

    </div>


    <div class="row" style="font-size: 0.6em">
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
