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

}