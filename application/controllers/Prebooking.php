<?php 
class Prebooking extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('booking_m');
	}

	public function index(){
		$rute_id = $this->input->get('id'); //get rute from method get
		$passengers = $this->input->get('passengers'); // get passengers from method get
		$data_rute = $this->booking_m->get_rute($rute_id); //get data rute from id

		if($data_rute > 0){
			$data_rute_price = $data_rute[0]['price']; //get price from data rute
			$total_payment = $data_rute_price * $passengers;


			var_dump($data_rute);

			$data['data'] = [
				'data_rute' => $data_rute[0], //data rute from array 0
				'total_payment' => $total_payment //total payment
			];

			$this->load->view('v_prebooking', $data);
		}
		else{
			echo "rute tidak ada!";
		}
	}

	public function make_booking(){
		$passengers = $this->input->post('passengers');
		$rute_id = $this->input->post('rute_id');

		//var_dump($this->input->post());
		//die;

		$session_name = 'R-'.md5(rand(1,9999));
		$value = [
			'passengers' => $passengers,
			'id' => $rute_id
		];

		$this->session->set_userdata($session_name, $value);

		redirect(base_url().'booking/?key='.$session_name);
	}
}

?>	