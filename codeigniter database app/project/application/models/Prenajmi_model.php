<?php


class Prenajmi_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}


	function getRows($id = "")
	{
		if (!empty($id)) {
			$query = $this->db->get_where('prenajom', array('idpren' => $id));
			return $query->row_array();
		} else {
			$query = $this->db->get('prenajom');
			return $query->result_array();
		}
	}

	public function insert($data = array())
	{
		$insert = $this->db->insert('prenajom', $data);
		if ($insert) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}


	public function update($data, $id)
	{
		if (!empty($data) && !empty($id)) {
			$update = $this->db->update('prenajom', $data,
				array('idpren' => $id));
			return $update ? true : false;
		} else {
			return false;
		}
	}


	public function delete($id)
	{
		$delete = $this->db->delete('prenajom', array('idpren' => $id));
		return $delete ? true : false;
	}


}

