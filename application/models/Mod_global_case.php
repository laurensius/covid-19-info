<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_global_case extends CI_Model {

    private function global_daily_report($delta){
        return  date("m-") . (date("d") - $delta) . "-" . date("Y");
    }

	function global_cases($date = null){
        $delta = 1;
        $global_case = array();
        if($date == null){
            $date = $this->global_daily_report($delta) . CSV_EXT;
        }else{
            $date .= CSV_EXT;
        }
        $file = CCSE_DAILY_DETAIL . $date;
        $csv = file_get_contents($file);
        $mapped = array_map("str_getcsv", explode("\n", $csv)); 
        $confirmed = 0;
        $deaths = 0;
        $recovered = 0;
        if($csv != null || $csv != ""){
            for($x=1;$x<sizeof($mapped)-1;$x++){
                $current = array(
                    $mapped[0][0] => $mapped[$x][0],
                    $mapped[0][1] => $mapped[$x][1],
                    $mapped[0][2] => $mapped[$x][2],
                    $mapped[0][3] => $mapped[$x][3],
                    $mapped[0][4] => $mapped[$x][4],
                    $mapped[0][5] => $mapped[$x][5],
                    $mapped[0][6] => $mapped[$x][6],
                    $mapped[0][7] => $mapped[$x][7]
                );
                $confirmed += $mapped[$x][3];
                $deaths += $mapped[$x][4];
                $recovered += $mapped[$x][5];
                array_push($global_case,$current);
            }
            return array(
                "data_source" => $file,
                "summary" => 
                    array(
                        "confirmed" => $confirmed,
                        "deaths" => $deaths,
                        "recovered" => $recovered
                    ),
                "cases" => $global_case
                );
        }else{
            return $this->global_cases(null);
        }
    }


    function indonesia_cases(){

    }

}
