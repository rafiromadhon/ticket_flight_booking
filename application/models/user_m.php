<?php 

class user_m extends CI_Model {

	function tampil_user(){
		return $this->db->get('user');// user adalah nama tabelnya
	}
	
	function check_login($table, $where) {
		return $this->db->get_where($table, $where);
	}

}

?>