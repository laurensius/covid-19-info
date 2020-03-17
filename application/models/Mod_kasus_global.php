<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kasus_global extends CI_Model {

    function get(){
        $raw = file_get_contents("https://api.kawalcorona.com/");
        $array = json_decode($raw,true);
        $data = array(); 
        $total_kasus = 0;
        $total_meninggal = 0;
        $total_sembuh = 0;
        if(sizeof($array) > 0){
            for($x=0;$x<sizeof($array);$x++){
                $current = array(
                    "regional_negara" => $array[$x]["attributes"]["Country_Region"],
                    "lat" => $array[$x]["attributes"]["Lat"],
                    "lon" => $array[$x]["attributes"]["Long_"],
                    "terkonfirmasi" => $array[$x]["attributes"]["Confirmed"],
                    "meninggal" => $array[$x]["attributes"]["Deaths"],
                    "sembuh" => $array[$x]["attributes"]["Recovered"],
                    "aktif" => $array[$x]["attributes"]["Active"]
                );
                $total_kasus += $array[$x]["attributes"]["Confirmed"];
                $total_meninggal += $array[$x]["attributes"]["Deaths"];
                $total_sembuh += $array[$x]["attributes"]["Recovered"];
                array_push($data,$current);
            }   
        }
        return array(
            "kesimpulan" =>
                array(
                    "total_kasus" => $total_kasus,
                    "total_meninggal" => $total_meninggal,
                    "total_sembuh" => $total_sembuh
                ),
            "detail_kasus" => $data
            );
    }
    

}
