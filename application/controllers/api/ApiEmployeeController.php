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

	public function store_employee_post()
	{
		$employee = new EmployeeModel;

		$data = [
			'nome' => $this->input->post('nome'),
			'sobrenome' => $this->input->post('sobrenome'),
			'celular' => $this->input->post('celular'),
			'email' => $this->input->post('email'),
		];
		$result = $employee->insertEmployee($data);
		if ($result > 0) {
			$this->response([
				'status' => true,
				'message' => 'NEW EMPLOYEE CREATED'
			], RestController::HTTP_CREATED);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'FAILED TO CREATED EMPLOYEE'
			], RestController::HTTP_BAD_REQUEST);
		}

		$this->response($data, 200);
	}

	// Get By ID
	public function find_employee_get($id)
	{
		$employee = new EmployeeModel;
		$result = $employee->editEmployee($id);
		$this->response($result, 200);
	}
}
