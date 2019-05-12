<?php
class Holidays extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['holidays'] = $this->db->get('tbl_holidays')->result();
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/holidays/index';
		$this->load->view('main_layout', $this->data);
	}
	public function add(){
		$data = array(
			'name' => $this->input->post('name'),
			'date' => $this->input->post('date'),
			);
		$this->db->insert('tbl_holidays', $data);
		redirect('admin/holidays');
	}
	public function edit($id){
		$this->db->where('id', $id);
		$this->data['holiday'] = $this->db->get('tbl_holidays')->row();
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/holidays/edit';
		$this->load->view('main_layout', $this->data);
	}
	public function update($id){
		$data = array(
			'name' => $this->input->post('name'),
			'date' => $this->input->post('date'),
			);
		$this->db->where('id', $id);
		$this->db->update('tbl_holidays', $data);
		redirect('admin/holidays');
	}
	public function delete($id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('tbl_holidays');
		redirect('admin/holidays');
	}

}
?>