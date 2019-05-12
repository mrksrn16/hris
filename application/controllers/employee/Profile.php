<?php
class Profile extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		//attendance
		$id = $this->session->userdata('id');
		if($this->input->post('start_date') && $this->input->post('end_date')){
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$this->data['attendance'] = $this->db->get('tbl_attendance')->result();
			//leave
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id'";
			$this->db->where($where);
			$this->data['leave'] = $this->M_User->get_user_leave($id);
			//bonus
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$this->data['bonus'] = $this->db->get('tbl_bonus')->result();
		}else{
			$end_date = date('Y-m-d');
			$start_date = date('Y-m-d' ,strtotime('-15 day', strtotime($end_date)));
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$this->data['attendance'] = $this->db->get('tbl_attendance')->result();
			//leave
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id'";
			$this->db->where($where);
			$this->data['leave'] = $this->M_User->get_user_leave($id);
			//bonus
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$this->data['bonus'] = $this->db->get('tbl_bonus')->result();
		}
		//Benefits
		$employee_details = $this->M_User->get_employee_details($id);
		$this->db->where('position', $employee_details->position);
		$res = $this->db->get('tbl_benefits')->row();
		$sss = $res->sss;
		$philhealth = $res->philhealth;
		$tax = $res->tax;
		$pagibig = $res->pagibig;
		$this->data['sss'] = $sss;
		$this->data['philhealth'] = $philhealth;
		$this->data['tax'] = $tax;
		$this->data['pagibig'] = $pagibig;
		
		//details
		$this->data['employee'] = $this->M_User->get_employee_details($id);
		$this->data['employee_details'] = $this->M_User->get_employee_details($id);
		$this->data['employee_access'] = $this->M_User->get_employee_access($id);
		$this->data['employee_id'] = $id;
		$this->data['start_date'] = $start_date;
		$this->data['end_date'] = $end_date;

		$this->data['sidebar'] = 'employee/sidebar';
		$this->data['subview'] = 'employee/profile/index';
		$this->load->view('main_layout', $this->data);
	}
	public function update_profile(){
		$id = $this->session->userdata('id');
		//if password is changed
		if($this->input->post('password')){
			$details = array(
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'birthday' => $this->input->post('birthday'),
				);
			$this->db->where('user_id', $id);
			if($this->db->update('tbl_user_details', $details)){
				$credentials = array(
					'username' => $this->input->post('username'),
					'password' => $this->M_User->hash($this->input->post('password')),
					);
				$this->db->where('id',$id);
				$this->db->update('tbl_user_access', $credentials);
			}
		}else{
			$details = array(
				'name' => $this->input->post('name'),
				'position' => $this->input->post('position'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'birthday' => $this->input->post('birthday'),
				);
			$this->db->where('user_id', $id);
			if($this->db->update('tbl_user_details', $details)){
				$credentials = array(
					'username' => $this->input->post('username'),
					);
				$this->db->where('id',$id);
				$this->db->update('tbl_user_access', $credentials);
			}
		}
		redirect('employee/profile');
	}
}
?>