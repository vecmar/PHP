<?php


class Zakaznici_model extends CI_Model
{
	function getRows($id = "")
	{
		if (!empty($id)) {
			$query = $this->db->get_where('zakaznici', array('idzak' => $id));
			return $query->row_array();
		} else {
			$query = $this->db->get('zakaznici');
			return $query->result_array();
		}
	}

	public function insert($data = array())
	{
		$insert = $this->db->insert('zakaznici', $data);
		if ($insert) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}



	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('zakaznici', $data,
				array('idzak'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}



	public function delete($id){
		$delete = $this->db->delete('zakaznici',array('idzak'=>$id));
		return $delete?true:false;
	}
}
