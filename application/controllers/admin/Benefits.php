<?php
class Benefits extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['benefits'] = $this->db->get('tbl_benefits')->result();
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/benefits/index';
		$this->load->view('main_layout', $this->data);
	}
	public function get_benefit($id){
		$this->db->where('id', $id);
		$data = $this->db->get('tbl_benefits')->row();
		echo json_encode($data);
	}
	public function update_benefit(){
		$data = array(
			'position' => $this->input->post('position'),
			'sss' => $this->input->post('sss'),
			'pagibig' => $this->input->post('pagibig'),
			'philhealth' => $this->input->post('philhealth'),
			'tax' => $this->input->post('tax'),
			);
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->update('tbl_benefits',$data);
		// echo json_encode(array("status" => true));
		//echo json_encode($data);
		redirect('admin/benefits');
	}
}

?>