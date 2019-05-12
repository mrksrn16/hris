<?php
class Profile extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$id = $this->session->userdata('id');
		$this->data['employee'] = $this->M_User->get_employee_details($id);
		$this->data['employee_details'] = $this->M_User->get_employee_details($id);
		$this->data['employee_access'] = $this->M_User->get_employee_access($id);
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/profile/index';
		$this->load->view('main_layout', $this->data);
	}
}

?>