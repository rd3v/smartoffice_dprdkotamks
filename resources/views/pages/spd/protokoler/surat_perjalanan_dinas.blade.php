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

        li {
          margin: -10px 0;
        }
  
    </style>
</head>
<body>

  <div class="container-fluid">

    <div class="row" style="margin-top:10.5em">
      <div class="col-md-12 text-center">
          <h5 style="text-decoration:underline">SURAT PERJALANAN DINAS</h5>
          <h6>(SPD)</h6>
      </div>
      <div class="col-md-12">
          <h6 style="font-weight:normal;padding-left:4em;margin-top:0.7em"></h6>
      </div>
    </div>

    <div class="row">
      <table class="table" style="line-height:40px" border="1">
        <tr>
          <td>1.</td>
          <td>Pejabat yang memberi Perintah</td>
          <td>{{ $Spd->surat_tugas->nama_yang_bertanda_tangan }}</td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Nama pejabat yang diperintah mengadakan Perjalanan Dinas</td>
          @if($user->protokoler_type == 'ad')
          <td><b>{{ $Spd->anggota_dewan->nama }}</b></td>
          @elseif($user->protokoler_type == 'staff')
          <td><b>{{ $Spd->staff->nama }}</b></td>
          @endif
        </tr>
        <tr>
          <td>3.</td>
          <td>Jabatan dari yang diperintahkan</td>
          @if($user->protokoler_type == 'ad')
          <td>({{ ucfirst($Spd->anggota_dewan->jabatan_text) }})</td>
          @elseif($user->protokoler_type == 'staff')
          <td>({{ ucfirst($Spd->staff->jabatan) }})</td>
          @endif
        </tr>
        <tr>
          <td>4.</td>
          <td>Perjalanan Dinas yang diperintahkan</td>
          <td>
            <ul>
              <li>dari Makassar</li>
              <li>ke {{ ucfirst($Spd->surat_tugas->tempat) }}</li>
              <li>Transportasi menggunakan <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transportasi {{ $Spd->tipe_transportasi }}</p></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>5.</td>
          <td>Perjalanan Dinas direncanakan</td>
          <td>
            <ul>

<?php 
$date1 = date_create($Spd->surat_tugas->tanggal_mulai);
$date2 = date_create($Spd->surat_tugas->tanggal_akhir);
$days  = date_diff($date1,$date2);
$str_tanggal_mulai = explode('-',$Spd->surat_tugas->tanggal_mulai);
$str_tanggal_akhir = explode('-',$Spd->surat_tugas->tanggal_akhir);
?>

              <li>Selama <?= ($days->format('%a')+1) ?> Hari</li>
              <li>Dari tanggal, <?= $tanggal_mulai ?></li>
              <li>s/d tanggal, <?= $tanggal_akhir ?></li>
            </ul>            
          </td>
        </tr>
        <tr>
          <td>6.</td>
          <td>Maksud mengadakan Perjalanan Dinas</td>
          <td>{{ $Spd->surat_tugas->perihal }}</td>
        </tr>
        <tr>
          <td>7.</td>
          <td>Perhitungan biaya Perjalanan Dinas</td>
          <td>
            <ul>
              <li>Atas Beban : APBD KOTA MAKASSAR T.A 2019</li>
              <li>Kode Rekening : </li>
            </ul>                        
          </td>
        </tr>
        <tr>
          <td>8.</td>
          <td>Keterangan</td>
          <td>
            <ul>
              <li>Surat Tugas Nomor : {{ $Spd->surat_tugas->nomor }}</li>
              <li>Tanggal : {{ $Spd->surat_tugas->tanggal_dikeluarkan }}</li>
            </ul>                                    
          </td>
        </tr>
      </table>
    </div>
    
    <br>

    <div class="row">
      <div class="col-md-12 text-right">
        Makassar, {{ $Spd->surat_tugas->tanggal_dikeluarkan }}
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-8"></div>
      <div class="col-md-4 text-center" style="font-size: 0.9em;">
        <b>{{ $Spd->surat_tugas->jabatan }}</b>
      </div>
    </div>
    <br><br><br><br>
    <div class="row">

      <div class="col-md-8"></div>
      <div class="col-md-4 text-center" style="font-size: 0.9em;">
        <b>{{ $Spd->surat_tugas->nama_yang_bertanda_tangan }}</b>
      </div>

    </div>
  
    <br>

  </div>

</body>
</html>
