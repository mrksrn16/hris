<?php
class Employees extends User_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	public function index(){
		//Pagination
		$config['base_url'] = base_url() . 'admin/employees/index/';
		$config['per_page'] = 15;
		$config['total_rows'] = $this->M_User->count_employees();
		$offset = $this->uri->segment(4);
		$this->data['offset'] = $offset;
		$this->pagination->initialize($config);

		$this->data['employees'] = $this->M_User->fetch_employees($config['per_page'],$offset);
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/employees/index';
		$this->load->view('main_layout', $this->data);
	}
	public function add(){
		$credentials = array(
			'username' => $this->input->post('username'),
			'password' => $this->M_User->hash($this->input->post('password')),
			'role' => 'employee'
			);
		$this->db->insert('tbl_user_access', $credentials);
		$details = array(
			'user_id' => $this->db->insert_id(),
			'name' => $this->input->post('name'),
			'position' => $this->input->post('position'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'birthday' => $this->input->post('birthday'),
			'date_created' => date('Y-m-d'),
			'role' => 'employee',
			);
		$this->db->insert('tbl_user_details', $details);
		redirect('admin/employees');
	}
	public function view($id){
		//attendance
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
		$this->data['employee_id'] = $id;
		$this->data['start_date'] = $start_date;
		$this->data['end_date'] = $end_date;
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/employees/view';
		$this->load->view('main_layout', $this->data);
	}
	public function edit($id){
		$this->data['employee_details'] = $this->M_User->get_employee_details($id);
		$this->data['employee_access'] = $this->M_User->get_employee_access($id);
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/employees/edit';
		$this->load->view('main_layout', $this->data);
	}
	public function update($id){
		$credentials = array(
			'username' => $this->input->post('username'),
			'password' => $this->M_User->hash($this->input->post('password')),
			'role' => 'employee'
			);
		$this->db->where('id',$id);
		$this->db->update('tbl_user_access', $credentials);
		$details = array(
			'name' => $this->input->post('name'),
			'position' => $this->input->post('position'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'birthday' => $this->input->post('birthday'),
			);
		$this->db->where('user_id',$id);
		$this->db->update('tbl_user_details', $details);
		redirect('admin/employees');
	}
	public function delete($id)
	{
		if(!$id)
		{
			return FALSE;
		}
		$this->db->where('user_id', $id);
		$this->db->limit(1);
		$this->db->delete('tbl_user_details');
		redirect('admin/employees');
	}
	public function search(){
		$search_string = $this->input->post('input_search');

		if(isset($search_string) and !empty($search_string))
		{
			$this->data['employees'] = $this->M_User->search($search_string);
			$this->data['sidebar'] = 'admin/sidebar';
			$this->data['subview'] = 'admin/employees/index';
			$this->load->view('main_layout', $this->data);
		}
		else
		{
			redirect('admin/employees');
		}
	}

	public function download($id=NULL)
	{
		if($id==NULL)
		{
		 ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        // retrieve data from model
        $offset = $this->uri->segment(3);

        $data['employees'] = $this->M_User->get_employees();
        $data['title'] = "items";

         // boost the memory limit if it's low ;)
        $html = $this->load->view('mpdf/list', $data, true);
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    	}
    	else
    	{
		ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        // retrieve data from model

        $where = "category=1 AND category_id='$id'";
        $this->db->where($where);
        $this->db->limit(1);
		$data['image'] = $this->db->get('tbl_images')->row();

        $data['news'] = $this->M_News->get_by_id($id);
        $data['title'] = "items";

         // boost the memory limit if it's low ;)
        $html = $this->load->view('mpdf/pdf_item', $data, true);
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    	}
	}
	public function get_attendance($id)
	{
		$this->db->where('id', $id);
		$attendance = $this->db->get('tbl_attendance')->row();
		echo json_encode($attendance);	
	}
	public function add_attendance($id){
		$employee_id = $id;
		$input_date = $this->input->post('date');
		$where = "date='$input_date' AND 'employee_id'='$employee_id'";
		$this->db->where($where);
		$result = $this->db->get('tbl_attendance')->row();
		if($result != NULL){
			$data = array(
					'employee_id' => $id,
					'time_in' => $this->input->post('time_in'),
					'time_out' => $this->input->post('time_out'),
					'date' => $this->input->post('date')
				);
			$this->db->insert('tbl_attendance', $data);
			redirect('admin/employees/view/'.$id);
		}else{
			echo "<script>alert('Input date already exists.');</script>";
			redirect('admin/employees/view/'.$id);
		}
	}
	public function update_attendance($emp_id){
		date_default_timezone_set('Asia/Manila');
		$time_out = $this->input->post('attendance_out');
		$time_in = $this->input->post('attendance_in');
		$overTime = ((strtotime($time_out) - strtotime($time_in)) / 3600)-9;
		// $time_out_plus_12 = new DateTime($this->input->post('attendance_out'));		
		// $time_out_plus_12->add(new DateInterval('PT12H'));
		// $time_out = $time_out_plus_12->format('H:i:s');
		// $workingHours = ((strtotime($time_out) - strtotime($this->input->post('attendance_in'))) / 3600) -9;
		$check_employee_role = $this->M_User->get_employee_details($emp_id);
		$ot_rate;
		if($check_employee_role->position == 'Cashier' || $check_employee_role->position == 'Cashier'){
			$ot_rate = 70;
		}else if($check_employee_role->position == 'Manager'){
			$ot_rate = 90;
		}else if($check_employee_role->position == 'Supervisor'){
			$ot_rate = 100;
		}
		$data = array(
				'time_in' => $this->input->post('attendance_in'),
				'time_out' => $this->input->post('attendance_out'),
				'overtime' => $overTime
			);
		$id = $this->input->post('attendance_id');
		$this->db->where('id',$id);
		$this->db->update('tbl_attendance', $data);
			$last_id = $this->db->insert_id();
			$this->db->where('id',$id);
			$last_attendance_details = $this->db->get('tbl_attendance')->row();
			if($overTime > 0){
				$this->db->where('date', $last_attendance_details->date);
				$result = $this->db->get('tbl_overtime')->row();
				if(empty($result)){
					//insert
					$overtimeData = array(
						'employee_id' => $last_attendance_details->employee_id,
						'number_of_hours' => $overTime,
						'employee_rate' => $ot_rate,
						'date' => $last_attendance_details->date,
						'total_pay' => (int)$overTime * (int)$ot_rate,
						);
					$this->db->insert('tbl_overtime',$overtimeData);
				}else{
					//update
					$overtimeData = array(
						'employee_id' => $last_attendance_details->employee_id,
						'number_of_hours' => $overTime,
						'employee_rate' => $ot_rate,
						'date' => $last_attendance_details->date,
						'total_pay' => (int)$overTime * (int)$ot_rate,
						);
					$this->db->where('id',$result->id);
					$this->db->update('tbl_overtime',$overtimeData);
				}
			}else{
				$this->db->where('date', $last_attendance_details->date);
				$result = $this->db->get('tbl_overtime')->row();
				if($result){
					$this->db->limit(1);
					$this->db->where('id',$result->id);
					$this->db->delete('tbl_overtime');
				}
			}
		echo json_encode(array("status" => TRUE));
		redirect('admin/employees/view/' . $emp_id);
		// $attendance_in = $this->input->post('attendance_in');
		// $attendance_out =  $this->input->post('attendance_out');
		// echo json_encode(array('in'=> $attendance_in, 'out'=> $attendance_out));
	}
	public function add_leave($id){
		$data = array(
			'employee_id' => $id,
			'date' => $this->input->post('leave_date'),
			'notes' => $this->input->post('notes'),
			);
		$this->db->insert('tbl_leave',$data);
		redirect('admin/employees/view/'.$id);
	}
	public function get_leave($id)
	{
		$this->db->where('id', $id);
		$leave = $this->db->get('tbl_leave')->row();
		echo json_encode($leave);	
	}
	public function update_leave(){
		$data = array(
				'date' => $this->input->post('leave_date'),
				'notes' => $this->input->post('notes'),
			);
		$notes = $this->input->post('leave_date');
		$id = $this->input->post('leave_id');
		$this->db->where('id',$id);
		$this->db->update('tbl_leave', $data);
		redirect('admin/employees/view/'.$this->input->post('employee_id'));
	}
	public function add_bonus($id){
		$data = array(
				'employee_id' => $id,
				'amount' => $this->input->post('bonus_amount'),
				'notes' => $this->input->post('notes'),
				'date' => date('Y-m-d')
			);
		$this->db->insert('tbl_bonus',$data);
		redirect('admin/employees/view/'.$id);
	}
	public function get_bonus($id)
	{
		$this->db->where('id', $id);
		$bonus = $this->db->get('tbl_bonus')->row();
		echo json_encode($bonus);	
	}
	public function update_bonus()
	{
		$data = array(
			'amount' => $this->input->post('bonus_amount'),
			'notes' => $this->input->post('bonus_notes'),
			'date' => date('Y-m-d')
		);
		$this->db->where('id', $this->input->post('bonus_id'));
		$this->db->update('tbl_bonus',$data);
		redirect('admin/employees/view/'.$this->input->post('employee_id'));
	}
	public function delete_attendance($id,$employee_id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('tbl_attendance');
		redirect('admin/employees/view/'.$employee_id);
	}
	public function delete_leave($id,$employee_id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('tbl_leave');
		redirect('admin/employees/view/'.$employee_id);
	}
	public function delete_bonus($id,$employee_id){
		$this->db->where('id',$id);
		$this->db->limit(1);
		$this->db->delete('tbl_bonus');
		redirect('admin/employees/view/'.$employee_id);
	}
}

?>