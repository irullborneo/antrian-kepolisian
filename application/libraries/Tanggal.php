<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tanggal {

  private $ci;
  public function __construct(){
    $this->ci =& get_instance();
  }

  public function hari_sekarang(){
  	$hari==date('w');
  	$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
  	return $seminggu[$hari];
  }

  public function bulan_sekarang(){
  	$bulan=date('n');
  	$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
  	return $nama_bln[$bulan];
  }

  public function hari($tgl=''){
    $hari=date('w',strtotime($tgl));
    $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    return $seminggu[$hari];
  }

  public function bulan($bulan=''){
    $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
    return $nama_bln[$bulan];
  }
    
}
//d - The day of the month (from 01 to 31)
//j - The day of the month without leading zeros (1 to 31)
//w - A numeric representation of the day (0 for Sunday, 6 for Saturday)
//z - The day of the year (from 0 through 365)
//W - The ISO-8601 week number of year (weeks starting on Monday)
//F - A full textual representation of a month (January through December)
//m - A numeric representation of a month (from 01 to 12)
//M - A short textual representation of a month (three letters)
//n - A numeric representation of a month, without leading zeros (1 to 12)
//t - The number of days in the given month
//L - Whether it's a leap year (1 if it is a leap year, 0 otherwise)
//o - The ISO-8601 year number
//Y - A four digit representation of a year
//y - A two digit representation of a year
//a - Lowercase am or pm
//A - Uppercase AM or PM
//B - Swatch Internet time (000 to 999)
//g - 12-hour format of an hour (1 to 12)
//G - 24-hour format of an hour (0 to 23)
//h - 12-hour format of an hour (01 to 12)
//H - 24-hour format of an hour (00 to 23)
//i - Minutes with leading zeros (00 to 59)
//s - Seconds, with leading zeros (00 to 59)