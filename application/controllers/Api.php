<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("mod_global_case");
    }
    
    function index(){
        $this->http_response("success","Server ON",array());
    }

    function http_response($severity, $message, $content){
        header("Content-type:json");
        echo json_encode(
            array(
                "severity" => $severity,
                "message" => $message,
                "content" => $content,
            )
            ,JSON_PRETTY_PRINT);
    }

	function global_cases($date = null){
        $data = $this->mod_global_case->global_cases($date);
        if(sizeof($data) > 0){
            $this->http_response("success","Load data berhasil",$data);
        }else{
            $this->http_response("warning","Load data gagal",array());
        } 
    }


    

}
