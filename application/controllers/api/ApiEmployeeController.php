<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class ApiEmployeeController extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmployeeModel');
	}

	public function index_get()
	{
		// echo "I am Employee inde function API";
		$employee = new EmployeeModel;
		$result_emp = $employee->get_employee();
		$this->response($result_emp, 200);
	}
}

?>
