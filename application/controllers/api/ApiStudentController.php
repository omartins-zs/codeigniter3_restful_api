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
}
