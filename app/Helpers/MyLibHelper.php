<?php

namespace App\Helpers;

class MyLibHelper {

    private function waktu($wkt) {
        $jam = substr($wkt, 0, 2);
        $menit = substr($wkt, 3, 2);

        if ($jam < 12) {
            $AMPM = "AM";
            if ($jam == 0) $jam = 12;
        } else {
            $AMPM = "PM";
            if ($jam != 12) $jam = $jam-12;
        }

        return $jam.':'.$menit.' '.$AMPM;
    }

    public static function tgl_indo($tgl, $upper = FALSE) {
        if ($tgl == "0000-00-00") return "-";
        else {
            $tanggal    = substr($tgl, 8, 2);
            $bulan      = self::get_bulan(substr($tgl, 5, 2));
            $tahun      = substr($tgl, 0, 4);

            if ($upper) return strtoupper($tanggal.' '.$bulan.' '.$tahun);
            else return $tanggal.' '.$bulan.' '.$tahun;
        }
    }

    private function tgl_db($tgl, $todb = FALSE) {
        if (substr($tgl, 2, 1) == '/') { // ini format mm/dd/yyyy
            $bulan = substr($tgl, 0, 2);
            $tanggal = substr($tgl, 3, 2);
            $tahun = substr($tgl, 6, 4);
            return $tahun.'-'.$bulan.'-'.$tanggal;
        } else {
            $tahun = substr($tgl, 0, 4);
            $bulan = substr($tgl, 5, 2);
            $tanggal = substr($tgl, 8, 2);
            return $bulan.'/'.$tanggal.'/'.$tahun;
        }
    }

    private function format_tgl($tgl, $indo) {
        if (substr($tgl, 2, 1) == '-') { // ini format dd-mm-yyyy
            $tanggal = substr($tgl, 0, 2);
            $bulan = substr($tgl, 3, 2);
            $tahun = substr($tgl, 6, 4);

            return $tahun.'-'.$bulan.'-'.$tanggal;
        } else if (substr($tgl, 4, 1) == '-') { // ini format yyyy-mm-dd
            $tahun = substr($tgl, 0, 4);
            $bulan = substr($tgl, 5, 2);
            $tanggal = substr($tgl, 8, 2);
            $waktu = substr($tgl, 11, 8);

            return $indo ? $tanggal.' '.self::get_bulan($bulan).' '.$tahun.', '.self::waktu($waktu) : $tanggal.'-'.$bulan.'-'.$tahun;
        }
    }


    private function get_hari($day) {
        switch ($day) {
            case 0: return 'Ahad'; break;
            case 1: return 'Senin'; break;
            case 2: return 'Selasa'; break;
            case 3: return 'Rabu'; break;
            case 4: return 'Kamis'; break;
            case 5: return 'Jumat'; break;
            case 6: return 'Sabtu'; break;
        }
    }


    private function get_minggu($mng) {
        switch ($mng) {
            case 1: return 'Pertama'; break;
            case 2: return 'Kedua'; break;
            case 3: return 'Ketiga'; break;
            case 4: return 'Keempat'; break;
        }
    }


    private static function get_bulan($bln) {
        switch ($bln) {
            case 1: return 'Januari'; break;
            case 2: return 'Februari'; break;
            case 3: return 'Maret'; break;
            case 4: return 'April'; break;
            case 5: return 'Mei'; break;
            case 6: return 'Juni'; break;
            case 7: return 'Juli'; break;
            case 8: return 'Agustus'; break;
            case 9: return 'September'; break;
            case 10: return 'Oktober'; break;
            case 11: return 'November'; break;
            case 12: return 'Desember'; break;
        }
    }


    public function rupiah($angka, $kurs = '') {
        if ($angka === '') $angka = 0;
        if ($kurs) return $kurs.' '.number_format($angka);
        else return 'Rp.'.number_format($angka, 0, ',', '.').',-';
    }

    public function sebut($angka, $langsung = FALSE, $koma = '.') {
        $angka = explode($koma, trim($angka, $koma));

        if ($langsung) {
            $bulat = str_split($angka[0]);
            for ($i = 0; $i < sizeof($bulat); $i++) { $bulat[$i] = terbilang($bulat[$i]); }
            $huruf = implode(' ', $bulat);
        } else {
            $huruf = trim(terbilang($angka[0]));
        }

        if (sizeof($angka) > 1) {
            $desimal = str_split($angka[1]);
            for ($i = 0; $i < sizeof($desimal); $i++) { $desimal[$i] = terbilang($desimal[$i]); }
            $huruf .= ' koma'.implode(' ', $desimal);
        }

        return $huruf;
    }

    public function terbilang($x) {
        $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
        if ($x === '0') return ' nol';
        elseif ($x < 0) return 'minus'.terbilang($x * -1);
        elseif ($x < 12) return ' '.$huruf[$x];
        elseif ($x < 20) return terbilang($x - 10).' belas';
        elseif ($x < 100) return terbilang($x / 10).' puluh'.terbilang($x % 10);
        elseif ($x < 200) return 'seratus'.terbilang($x - 100);
        elseif ($x < 1000) return terbilang($x / 100).' ratus'.terbilang($x % 100);
        elseif ($x < 2000) return 'seribu'.terbilang($x - 1000);
        elseif ($x < 1000000) return terbilang($x / 1000).' ribu'.terbilang($x % 1000);
        elseif ($x < 1000000000) return terbilang($x / 1000000).' juta'.terbilang($x % 1000000);
        elseif ($x < 1000000000000) return terbilang($x / 1000000000).' miliar'.terbilang($x % 1000000000);
        elseif ($x < 1000000000000000) return terbilang($x / 1000000000000).' triliun'.terbilang($x % 1000000000000);
        elseif ($x < 1000000000000000000) return terbilang($x / 1000000000000000).' kuadriliun'.terbilang($x % 1000000000000000);
        elseif ($x < 1000000000000000000000) return terbilang($x / 1000000000000000000).' kuantiliun'.terbilang($x % 1000000000000000000);
        elseif ($x < 1000000000000000000000000) return terbilang($x / 1000000000000000000000).' sekstiliun'.terbilang($x % 1000000000000000000000);
        elseif ($x < 1000000000000000000000000000) return terbilang($x / 1000000000000000000000000).' septiliun'.terbilang($x % 1000000000000000000000000);
        elseif ($x < 1000000000000000000000000000000) return terbilang($x / 1000000000000000000000000000).' oktiliun'.terbilang($x % 1000000000000000000000000000);
        elseif ($x < 1000000000000000000000000000000000) return terbilang($x / 1000000000000000000000000000000).' noniliun'.terbilang($x % 1000000000000000000000000000000);
        elseif ($x < 1000000000000000000000000000000000000) return terbilang($x / 1000000000000000000000000000000000).' desiliun'.terbilang($x % 1000000000000000000000000000000000);
    }


    public function tambah_nol($num, $size = 2) {
        if ($size == 2) {
            if (strlen($num) == 1) return '0'.$num;
            else return $num;
        } else if ($size == 3) {
            if (strlen($num) == 1) return '00'.$num;
            else if (strlen($num) == 2) return '0'.$num;
            else return $num;
        } else if ($size == 4) {
            if (strlen($num) == 1) return '000'.$num;
            else if (strlen($num) == 2) return '00'.$num;
            else if (strlen($num) == 3) return '0'.$num;
            else return $num;
        } else if ($size == 5) {
            if (strlen($num) == 1) return '0000'.$num;
            else if (strlen($num) == 2) return '000'.$num;
            else if (strlen($num) == 3) return '00'.$num;
            else if (strlen($num) == 4) return '0'.$num;
            else return $num;
        } else return $num;
    }

    public function number_to_roman($num) {
        $n = intval($num);
        $res = '';

        /*** roman_numerals array  ***/
        $roman_numerals = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        );

        foreach ($roman_numerals as $roman => $number) {
            /*** divide to get  matches ***/
            $matches = intval($n / $number);

            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);

            /*** substract from the number ***/
            $n = $n % $number;
        }

        /*** return the res ***/
        return $res;
    }

}
?>
