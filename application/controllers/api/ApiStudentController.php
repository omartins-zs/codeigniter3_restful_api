<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class ApiStudentController extends RestController
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
	}

	public function storeStudent_post()
	{
		$students = new StudentModel;
		$data = [
			'name' =>  $this->input->post('name'),
			'class' => $this->input->post('class'),
			'email' => $this->input->post('email')
		];
		$result = $students->insert_student($data);
		if ($result > 0) {
			$this->response([
				'status' => true,
				'message' => 'NEW STUDENT CREATED'
			], RestController::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'FAILED TO CREATE NEW STUDENT'
			], RestController::HTTP_BAD_REQUEST);
		}
	}
}
