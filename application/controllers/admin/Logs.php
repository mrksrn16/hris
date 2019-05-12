<?php
class Logs extends User_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	public function index(){
		//Pagination
		$config['base_url'] = base_url() . 'admin/logs/index/';
		$config['per_page'] = 15;
		$config['total_rows'] = $this->M_User->count_logs();
		$offset = $this->uri->segment(4);
		$this->data['offset'] = $offset;
		$this->pagination->initialize($config);

		$this->data['logs'] = $this->M_User->fetch_logs($config['per_page'],$offset);

		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/logs/index';
		$this->load->view('main_layout', $this->data);
	}
}

?>