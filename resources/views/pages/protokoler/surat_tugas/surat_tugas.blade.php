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

        p.nama {
          font-size: 0.8em;
          font-weight: bold;
          margin:0;
        }
        p.jabatan_text {
          font-size: 0.8em;
          margin:0;
        }

@media print {
   .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
        float: left;
   }
   .col-sm-12 {
        width: 100%;
   }
   .col-sm-11 {
        width: 91.66666667%;
   }
   .col-sm-10 {
        width: 83.33333333%;
   }
   .col-sm-9 {
        width: 75%;
   }
   .col-sm-8 {
        width: 66.66666667%;
   }
   .col-sm-7 {
        width: 58.33333333%;
   }
   .col-sm-6 {
        width: 50%;
   }
   .col-sm-5 {
        width: 41.66666667%;
   }
   .col-sm-4 {
        width: 33.33333333%;
   }
   .col-sm-3 {
        width: 25%;
   }
   .col-sm-2 {
        width: 16.66666667%;
   }
   .col-sm-1 {
        width: 8.33333333%;
   }
}

    </style>
</head>
<body>

  <div class="container-fluid">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row" style="margin-bottom:0 !important">
      <div class="col-md-12 text-center">
          <p style="text-decoration:underline;font-size:0.7em;font-weight:bolder;margin: 0">SURAT TUGAS</p>
          <p style="font-size:0.7em;margin:0">Nomor : {{ strtoupper($SuratTugas->nomor) }}</p>
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
        <p style="margin-top:0;margin-bottom:0;font-size: 0.7em;font-weight:bolder">M E N U G A S K A N</p>
      </div>
    </div>
    <div class="row">
      <span class="col-md-1" style="font-size: 0.7em">Kepada :</span>
    </div>

    <div class="row" style="font-size:0.7em;margin-bottom:0.5em">

        <?php if($user->protokoler_type == 'ad'): 
                  $countData = count($AnggotaDewan);
                if ($countData < 10): ?>
                  
                      <div class="col-sm-6" style="padding-left: 2.5em">  
               <?php foreach ($AnggotaDewan as $key => $value): ?>
                        <p style="margin: 0;font-weight: bold;"><?= ($key + 1).'. '.$value->anggota_dewan->nama ?></p>
                        <p style="margin: 0">(<?= $value->anggota_dewan->jabatan_text ?>)</p>
               <?php endforeach; ?>
                      </div>   

          <?php else:
                  $roundData = round(($countData / 2) + 1);
                  $number = 0;
          ?>
                <script>
                  console.log("<?= $roundData ?>");
                </script>
               <?php foreach ($AnggotaDewan as $key => $value): 
                        if($key % 2 == 0):
                          $number++;
                        endif;
                ?>
                      <div class="col-sm-6 col-md-6">
                        <p class="nama">
                          <?php 

                            if ($key == 1) {
                             echo ($key % 2 == 0 ? $number:$roundData++).'. '.$AnggotaDewan[4]->anggota_dewan->nama; 
                            } else if($key == 3) {
                             echo ($key % 2 == 0 ? $number:$roundData++).'. '.$AnggotaDewan[6]->anggota_dewan->nama; 
                            } else if($key == 4) {
                             echo ($key % 2 == 0 ? $number:$roundData++).'. '.$AnggotaDewan[1]->anggota_dewan->nama; 
                            } else if($key == 6) {
                             echo ($key % 2 == 0 ? $number:$roundData++).'. '.$AnggotaDewan[3]->anggota_dewan->nama; 
                            } else {
                             echo ($key % 2 == 0 ? $number:$roundData++).'. '.$value->anggota_dewan->nama;
                            }

                           ?>                            
                          </p>
                        
                        <p class="jabatan_text">
                          (
                          <?php 
                            if ($key == 1) {
                             echo $AnggotaDewan[4]->anggota_dewan->jabatan_text; 
                            } else if($key == 3) {
                             echo $AnggotaDewan[6]->anggota_dewan->jabatan_text; 
                            } else if($key == 4) {
                             echo $AnggotaDewan[1]->anggota_dewan->jabatan_text; 
                            } else if($key == 6) {
                             echo $AnggotaDewan[3]->anggota_dewan->jabatan_text; 
                            } else {
                             echo $value->anggota_dewan->jabatan_text;
                            }
                           ?>                            
                          )

                        </p>

                      </div>
               <?php endforeach; ?>

          <?php endif; ?>

        <?php elseif($user->protokoler_type == 'staff'): ?>
            
         <?php  foreach ($Staff as $key => $value): ?>
            
         <?php  endforeach; ?>
            
        <?php endif; ?>

    </div>

    <div class="row">
      <span class="col-md-1" style="font-size: 0.6em">Untuk :</span>
        <div class="col-md-10" style="padding-left:0;font-size: 0.6em">
            <ol>
                <li>{{ ucfirst($SuratTugas->untuk_maksud) }} {{ $SuratTugas->tanggal_mulai }} s/d {{ $SuratTugas->tanggal_akhir }}</li>
                <li>Segala Biaya yang timbul sehubungan dengan pelaksanaan Surat Tugas ini dibebankan pada APBD Kota Makassar Tahun Anggaran {{ $SuratTugas->tahun_anggaran }}</li>
                <li>Setelah selesai melaksanakan tugas, diharapkan segera menyetorkan dokumen perjalanannya paling lambat 5 hari setelah melakukan perjalanan dinas</li>
            </ol>
        </div>
    </div>

    <div class="row" style="margin:0;margin-top:-0.5em !important">
      <div class="col-md-12">
        
<p style="font-size: 0.6em;margin:0">Demikian Surat Tugas ini dikeluarkan, untuk dilaksanakan dengan penuh rasa tanggung jawab.</p>              
        
      </div>
    </div>

    <div class="row" style="margin:0">
      <div class="col-md-12">
        
            <table class="table table-borderless" style="font-size: 0.6em;margin:0">
              <tr>
                <td></td>
                <td width="90px">Dikeluarkan</td>
                <td width="10px">:</td>
                <td width="110px">{{ ucfirst($SuratTugas->tempat_dikeluarkan) }}</td>
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
                <td><p style="margin:0">{{ ucwords($SuratTugas->jabatan) }}</p></td>
              </tr>
              <tr>
                <td></td>
                <td><p style="margin-top:50px;margin-bottom: 0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper($SuratTugas->nama_yang_bertanda_tangan) }}</p></td>
              </tr>
            </table>

      </div>

    </div>


    <div class="row" style="font-size: 0.6em;margin:0">
      <div class="col-md-12" style="margin:0">
        Tembusan :
      </div>
      <div class="col-md-12" style="margin:0">
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

  </div>

</body>
</html>
