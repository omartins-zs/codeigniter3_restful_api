<?php
defined('BASEPATH') or exit('No direct script access allowed');


class EmployeeModel extends CI_Model
{
	public function get_employee()
	{
		$query = $this->db->get('employee');
		return $query->result();
	}
}
