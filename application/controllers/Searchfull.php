<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchfull extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('booking_m');
	}

	public function index()
	{
		if ($this->input->get('from')) {
			$rute_from = $this->input->get('from');
			$rute_to = $this->input->get('to');
			$depart_date = $this->input->get('depart_date');
			$passengers = $this->input->get('passengers');
			$flight_class = $this->input->get('flight_class');

			$date_Formatted = explode("/", $depart_date); //format date from get
			$depart_date = "$date_Formatted[2]-$date_Formatted[0]-$date_Formatted[1]";

			$data = [ //make data to array
				'date(depart_on)' => $depart_date,
				'rute_from' => $rute_from,
				'rute_to' => $rute_to,
				'class' => $flight_class,
			];

			$data_session = [
				'flight' => [
					'passengers' => $passengers
				]
			];

			$search = $this->booking_m->search_rute($data); //search

			//var_dump($data);

			if(count($search) == 0){
				echo "Tidak ditemukan Rutenya :("; //if rute == 0
			}

			else{
				$v_data = [
					'data' => $search
				];
				$this->load->view('v_searchfull', $v_data);
			}

		}
		else{
			echo "Urung Search!";
		}
	}
}

?>