<?php
class Rate extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['rate'] = $this->db->get('tbl_employee_rate')->result();
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/rate/index';
		$this->load->view('main_layout', $this->data);
	}
	public function get_rate($id){
		$this->db->where('id', $id);
		$data = $this->db->get('tbl_employee_rate')->row();
		echo json_encode($data);
	}
	public function update_rate(){
		$data = array(
			'position' => $this->input->post('position'),
			'rate' => $this->input->post('rate'),
			);
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->update('tbl_employee_rate',$data);
		echo json_encode(array("status" => true));
		//echo json_encode($data);
	}
}

?>