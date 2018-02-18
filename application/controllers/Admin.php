<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		$data['user'] = $this->user_m->tampil_user()->result();
		$this->load->view('adminlte', $data);
	}
}
?>