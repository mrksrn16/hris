<?php
class Dashboard extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
}

?>