<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_rating extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
        // $this->load->model('m_rating');
	}

	public function index(){
    	$this->template->utama('v_input_rating');
  	}

    public function add_rating(){
        //data isi text review
        $_POST["review"];
        //data isi angka rating
        $_POST["rating"];
    }
}
