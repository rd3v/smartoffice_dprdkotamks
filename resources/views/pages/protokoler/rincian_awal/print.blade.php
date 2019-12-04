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
          font-size:0.9em;
        }

    </style>
</head>
<body>

  <div class="container">
    <br>

    <div class="row">
      <div class="col-md-12 text-center">
          <h56>RINCIAN BIAYA PERJALANAN DINAS TA 2019 BERDASARKAN KEPUTUSAN WALIKOTA MAKASSAR <br> NOMOR : 2220/090/TAHUN 2018 </h6>
      </div>
      <div class="col-md-12">
          <h6 style="font-weight:normal;padding-left:4em;margin-top:0.7em"></h6>
      </div>
    </div>
      
      <table class="table">
        <tr>
          <td>Lampiran SPPD Nomor</td>
          <td>:</td>
          <td>{{ $spd->nomor }}</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td>{{ $tanggal }}</td>
        </tr>
        <tr>
          <td>Tujuan SPPD</td>
          <td>:</td>
          <td>{{ ucfirst($spd->surat_tugas->tempat) }}</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          @if($user->protokoler_type == 'ad')
            <td>{{ $spd->anggota_dewan->nama }}</td>
          @elseif($user->protokoler_type == 'staff')
            <td>{{ $spd->staff->nama }}</td>
          @endif      
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          @if($user->protokoler_type == 'ad')
            <td>{{ $spd->anggota_dewan->jabatan_text }}</td>
          @elseif($user->protokoler_type == 'staff')
            <td>{{ $spd->staff->jabatan }}</td>
          @endif      
        </tr>
      </table>
    
    <br>

      <table class="table" border="1">
        <thead>
          <th>No</th>
          <th>PERINCIAN BIAYA</th>
          <th>HARI</th>
          <th>SATUAN</th>
          <th>JUMLAH</th>
          <th>KETERANGAN</th>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>MAKASSAR - {{ strtoupper($spd->surat_tugas->tempat) }}</td>
            <td>1</td>
            <td>Rp{{ number_format($biaya_asal_makassar) }}</td>
            <td>Rp{{ number_format($biaya_asal_makassar) }}</td>
            <td></td>
          </tr>
          <tr>
            <td>2</td>
            <td>{{ strtoupper($spd->surat_tugas->tempat) }} - MAKASSAR</td>
            <td>1</td>
            <td>Rp{{ number_format($biaya_tujuan) }}</td>
            <td>Rp{{ number_format($biaya_tujuan) }}</td>
            <td></td>
          </tr>
          <tr>
            <td>3</td>
            <td>BIAYA HARIAN</td>
            <td>{{ ($lama_kegiatan-1) }}</td>
            <td>Rp{{ number_format($satuan_harian) }}</td>
            <td>Rp{{ number_format($biaya_harian) }}</td>
            <td></td>
          </tr>
          <tr>
            <td>4</td>
            <td>BIAYA HOTEL</td>
            <td>{{ ($lama_kegiatan-1) }}</td>
            <td>Rp{{ number_format($satuan_hotel) }}</td>
            <td>Rp{{ number_format($biaya_hotel) }}</td>
            <td>Hotel 30%</td>
          </tr>
          <tr>
            <td>5</td>
            <td>BIAYA TAKSI MAKASSAR</td>
            <td>{{ ($lama_kegiatan-1) }}</td>
            <td>Rp{{ number_format($satuan_taksi_makassar) }}</td>
            <td>Rp{{ number_format($biaya_taksi_makassar) }}</td>
            <td></td>
          </tr>
          <tr>
            <td>6</td>
            <td>BIAYA TAKSI {{ strtoupper($spd->surat_tugas->tempat) }}</td>
            <td>{{ ($lama_kegiatan-1) }}</td>
            <td>Rp{{ number_format($satuan_taksi_tujuan) }}</td>
            <td>Rp{{ number_format($biaya_taksi_tujuan) }}</td>
            <td></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><p></p></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><b>JUMLAH</b></td>
            <td></td>
            <td><b>Rp{{ number_format($satuan_jumlah) }}</b></td>
            <td><b>Rp{{ number_format($total_jumlah) }}</b></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="5" class="text-center">Terbilang :  {{ ucfirst($terbilang) }},-</td>
            <td></td>
          </tr>

        </tbody>
      </table>

      <br>

      <table class="table">
        <tr>
          <td class="text-right">Makassar, {{ $tanggal }}</td>
        </tr>
      </table>

      <table class="table">
        <tr>
          <td>Telah dibayar sejumlah</td>
          <td class="text-right">Telah menerima sejumlah sebesar</td>
        </tr>
        <tr>
          <td><b>Rp{{ number_format($total_jumlah) }}</b></td>
          <td class="text-right"><b>Rp{{ number_format($total_jumlah) }}</b></td>
        </tr>
      </table>

      <table class="table">
        <tr>
          <td>Bendahara pengeluaran</td>
          <td class="text-right"><b>Yang menerima</b></td>
        </tr>
      </table>
      
      <br><br>
      
      <table class="table">
        <tr>
          <td><b><u>{{ $data->bendahara }}</u></b></td>
          <td class="text-right"><b><u>BADARUDDIN OPHIER</u></b></td>
        </tr>
        <tr>
          <td>NIP.{{ $data->bendaharanip }}</td>
          <td></td>
        </tr>
      </table>

      <br>
      
      <table class="table">
        <tr>
          <td><b>Menyetujui,</b></td>
          <td class="text-right"><b>Mengetahui</b></td>
        </tr>
        <tr>
          <td><b>PENGGUNA ANGGARAN</b></td>
          <td class="text-right"><b>PEJABAT PELAKSANA TEKNIS KEGIATAN</b></td>
        </tr>
      </table>

      <br><br>

      <table class="table">
        <tr>
          <td><b><u>H. ANDI SADLY, SE.,M. Si</u></b></td>
          <td class="text-right"><b><u>SYAMSUL SYAMSUDDIN, SE</u></b></td>
        </tr>
        <tr>
          <td>NIP : 19750613 1999903 1 007</td>
          <td class="text-right">NIP : 19660817 198801 1 003</td>
        </tr>
      </table>

  </div>

</body>
</html>
