<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
{

	public function get_student()
	{
		$query = $this->db->get("students");
		return $query->result();
	}

	public function insert_student($data)
	{
		return $this->db->insert('students', $data);
	}
}
