<?php


class Sportoviska_model extends CI_Model
{

	public function __construct() {
		parent::__construct();
	}


	function getRows($id = "")
	{
		if (!empty($id)) {
			$query = $this->db->get_where('sportoviska', array('idsport' => $id));
			return $query->row_array();
		} else {
			$query = $this->db->get('sportoviska');
			return $query->result_array();
		}
	}

	public function insert($data = array())
	{
		$insert = $this->db->insert('sportoviska', $data);
		if ($insert) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}



	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('sportoviska', $data,
				array('idsport'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}



	public function delete($id){
		$delete = $this->db->delete('sportoviska',array('idsport'=>$id));
		return $delete?true:false;
	}
}
