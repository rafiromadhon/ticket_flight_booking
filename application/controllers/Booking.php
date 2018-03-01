<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('booking_m');
	}

	public function index(){
		$session_key = $this->input->get('key');
		$data['data'] = $this->session->userdata($session_key);
		$data['data_rute'] = $this->booking_m->get_rute($this->session->userdata($session_key)['id'])[0];

		//var_dump($data);	

		$this->load->view('v_booking', $data);
	}

	public function insert_customer(){
		$key = $this->input->post('key');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');

		$form_customer = [
			'nama' => $name,
			'alamat' => $address,
			'nohp' => $phone,
			'gender' => $gender,
			'email' => $email
		];

		$value = $this->session->userdata($key);

		$value['form_customer'] = $form_customer; //menambahkan customer_id ke session
		$this->session->set_userdata($key, $value);

		redirect(base_url() . 'booking/seat/key?=' . $key);
	}

	public function seat(){
		//$session_key = $this->input->get('key');
		$customer_data = $this->session->userdata($_GET['key']);

		var_dump($customer_data);
		//die;

		$rute = $this->booking_m->get_rute($customer_data['rute_id'][0]);

		$transportation_seat = $rute['seat_qty'];

		$seat_booked = $this->booking_m->get_seat_booked($customer_data['rute_id']);

		$seat_booked_2 = [];

		for ($i=0; $i < count($seat_booked); $i++) { 
			$seat_booked_2[] = $seat_booked[$i]['seat'];
		}

		$seat_total = $this->booking_m->get_seat_total($customer_data['rute_id'])[0]['seat_qty'];

		$data['seat'] = [
			'seat_booked_2' => $seat_booked_2,
			'seat_total' => $seat_total
		];

		$data['data_form'] = $customer_data['form_customer']['name'];
		$data['data'] = $customer_data;
		$data['transportation_seat'] = $transportation_seat;
		$data['data_rute'] = $this->booking_m->get_rute($customer_data['rute_id'])[0];

		$this->load->view('v_seat', $data);
	}
}

?>