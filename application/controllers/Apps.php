<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("mod_kasus_global");
    }
    
    function index(){
        $data["data"] = $this->mod_kasus_global->get();
        $this->load->view("apps/index",$data);
    }

    function jabar(){
        // $data["data"] = $this->mod_kasus_global->get();
        $this->load->view("apps/jabar");
    }

  


    

}
