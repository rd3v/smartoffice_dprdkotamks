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
          <h5 style="text-decoration:underline">SURAT PERJALANAN DINAS</h5>
          <h6>(SPD)</h6>
      </div>
      <div class="col-md-12">
          <h6 style="font-weight:normal;padding-left:4em;margin-top:0.7em"></h6>
      </div>
    </div>

    <div class="row">
      <table class="table" style="line-height:40px" border="1">
        <tr style="font-size:0.9em">
          <td>1.</td>
          <td>Pejabat yang memberi Perintah</td>
          <td>Pimpinan DPRD Kota Makassar</td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Nama pejabat yang diperintah mengadakan Perjalanan Dinas</td>
          <td><b>{{ $Spd->nama_pejabat }}</b></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Jabatan dari yang diperintahkan</td>
          <td>({{ ucfirst($Spd->jabatan) }})</td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Perjalanan Dinas yang diperintahkan</td>
          <td>
            <ul>
              <li>dari Makassar</li>
              <li>ke {{ $Spd->surat_tugas->tempat }}</li>
              <li>Transportasi menggunakan <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transportasi {{ $Spd->tipe_transportasi }}</p></li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>5.</td>
          <td>Perjalanan Dinas direncanakan</td>
          <td>
            <ul>
              <li>selama Makassar</li>
              <li>dari tanggal {{ $Spd->surat_tugas->tempat }}</li>
              <li>s/d tanggal </li>
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
              <li>Tanggal : {{ $Spd->surat_tugas->tanggal_surat_masuk }}</li>
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
      <div class="col-md-11 text-right" style="font-size: 0.9em;">
        <b>KETUA DPRD Kota Makassar</b>
      </div>
      <div class="col-md-1"></div>
    </div>
    <br><br><br><br>
    <div class="row">
      <div class="col-md-11 text-right" style="font-size: 0.9em;">
        <b style="margin-right:1.7em">{{ $data->ketua }}</b>
      </div>
      <div class="col-md-1"></div>
    </div>
  
    <br>

  </div>

</body>
</html>
