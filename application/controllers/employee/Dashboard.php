<?php
class Dashboard extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['sidebar'] = 'employee/sidebar';
		$this->data['subview'] = 'employee/dashboard';
		$this->load->view('main_layout', $this->data);
	}
}

?>