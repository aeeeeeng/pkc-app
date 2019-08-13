<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General {

    public function __construct() {
        $this->CI = get_instance();
    }

    public function number_beautify($number) {
        if($number == '' || $number == null || empty($number)) {
            return '';
        }
        $out = number_format($number, 0, ',', '.');
        return $out;
    }

    public function tgl_ind($date){
        if($date === null || $date == '' || empty($date)){
            return '';
        }
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni",
                       "Juli","Agustus","September","Oktober","November","Desember");
        $tahun = substr($date,0,4);
        $bulan = substr($date,5,2);
        $tgl = substr($date,8,2);
        $waktu = substr($date,11,5);
        $hari = date("w",strtotime($date));
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." "."Wib";
        return $result;
    }

    public function bln_ind($bln) {
        switch ($bln) {
            case '01': return 'Januari';
            case '02': return 'Februari';
            case '03': return 'Maret';
            case '04': return 'April';
            case '05': return 'Mei';
            case '06': return 'Juni';
            case '07': return 'Juli';
            case '08': return 'Agustus';
            case '09': return 'September';
            case '10': return 'Oktober';
            case '11': return 'November';
            case '12': return 'Desember';
            default: return '';
        }
    }

}