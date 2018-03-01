<?php

class booking_m extends CI_Model{
	
	public function get_all_rute(){
		$this->db->select('rute_from, rute_to');
		$this->db->from('rute');
		$this->db->distinct();
		return $this->db->get()->result_array();
	}

	public function search_rute($data){
		$this->db->select('rute.ruteid, rute.rute_from, rute.rute_to, rute.depart_on, rute.arrive, rute.price, rute.class, transportation.code');
		$this->db->from('rute');
		$this->db->join('transportation', 'rute.transportid = transportation.transportid');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_rute($id){
		$this->db->select('*');
		$this->db->from('rute');
		$this->db->join('transportation', 'rute.transportid = transportation.transportid');
		$this->db->where('rute.ruteid =' . $id);
		return $this->db->get()->result_array();
	}

	public function get_seat_booked($id){
		$this->db->select('passengers.seat');
		$this->db->from('rute');
		$this->db->join('reservation', 'rute.ruteid = reservation.rute_id');
		$this->db->join('passengers', 'reservation.id = passengers.reservation_id');
		$this->db->where(['rute.ruteid' => $id]);
		return $this->db->get()->result_array();
	}


	public function get_seat_total(){
		$this->db->select('transportation.seat_qty');
		$this->db->from('rute');
		$this->db->join('transportation', 'rute.transportid = transportation.transportid');
		$this->db->where(['rute.ruteid' => $id]);
		return $this->db->get()->result_array();
	}









}

?>