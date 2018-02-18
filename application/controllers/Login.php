<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index() {
		if(!isset($_SESSION['username'])) {
			$this->load->view('v_login');
		}
		else {
			redirect('admin');
		}
	}

	function action() {
		if($this->input->post('submit')) {
			$username = $this->input->post('uname');
			$password = md5($this->input->post('pass'));

			// var_dump($username, $password);
			$check_data = array (
				'username' => $username,
				'password' => $password
			);
			$rsl = $this->user_m->check_login('user', $check_data)->num_rows();
			if ($rsl>0) {
				$data_session = array (
					'username' => $username,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				redirect('admin');
			}
			else {
				echo "Username or password arex` wrong!";
			}
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	//function admin() {
	//	$this->load->view('adminlte');
	//}

}


?>