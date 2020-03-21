<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kasus_jabar extends CI_Model {

    function get(){
        $raw = file_get_contents("https://coredata.jabarprov.go.id/analytics/covid19/longlat.json");
        $array = array();
        if(json_decode($raw,true) != null){
            $array = json_decode($raw,true);
            $array["total_data"] = sizeof($array["data"]);
        }
        return array(
            "detail_kasus" => $array
            );
    }
    

}
