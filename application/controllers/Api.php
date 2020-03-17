<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("mod_kasus_global");
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

	function kasus_global(){
        $data = $this->mod_kasus_global->get();
        if(sizeof($data["detail_kasus"]) > 0){
            $this->http_response(
                "success","Load data berhasil",$data
            );
        }else{
            $this->http_response(
                "warning","Load data gagal", $data
            );
        }
    }


    

}
