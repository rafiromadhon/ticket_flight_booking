<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('booking_m');
	}

	public function index()
	{
		$rute_all = $this->booking_m->get_all_rute();
		$data['rute_all'] = $rute_all;
		
		$this->load->view('index', $data);
	}
}
