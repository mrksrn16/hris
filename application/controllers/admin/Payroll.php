<?php
class Payroll extends User_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}
	public function index(){
		//Pagination
		$config['base_url'] = base_url() . 'admin/payroll/index/';
		$config['per_page'] = 15;
		$config['total_rows'] = $this->M_User->count_employees();
		$offset = $this->uri->segment(4);
		$this->data['offset'] = $offset;
		$this->pagination->initialize($config);
		$this->data['employees'] = $this->M_User->fetch_employees($config['per_page'],$offset);
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/payroll/index';
		$this->load->view('main_layout', $this->data);
	}
	public function view($id){
		//attendance
		if($this->input->post('start_date') && $this->input->post('end_date')){
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			//attendance
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$this->data['attendance'] = $this->db->get('tbl_attendance')->result();
			//overtime
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and status='not-paid'";
			$this->db->where($where);
			$this->data['overtime'] = $this->db->get('tbl_overtime')->result();
			//count_all_over_time_pay
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and status='not-paid'";
			$this->db->select_sum('total_pay')->where($where);
			$query = $this->db->get('tbl_overtime')->result();
			$total_overtime_pay = $query[0]->total_pay;
			$this->data['total_overtime_pay'] = $total_overtime_pay;
			//count_all_over_time
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and status='not-paid'";
			$this->db->select_sum('number_of_hours')->where($where);
			$query = $this->db->get('tbl_overtime')->result();
			$this->data['count_all_over_time'] = $query[0]->number_of_hours;
			//count attendance
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$total_number_of_days = $this->db->count_all_results('tbl_attendance');
			$this->data['total_number_of_days'] = $total_number_of_days;
			//employee rate
			$employee_details = $this->M_User->get_employee_details($id);
			$this->db->where('position', $employee_details->position);
			$res = $this->db->get('tbl_employee_rate')->row();
			$employee_rate = $res->rate;
			$this->data['employee_rate'] = $employee_rate;
			//leave
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id'";
			$this->db->where($where);
			$this->data['leave'] = $this->db->get('tbl_leave')->result();
			//holidays
			$where = "date >= '$start_date' and date <= '$end_date'";
			$this->db->where($where);
			$this->data['holidays'] = $this->db->get('tbl_holidays')->result();
			//leave
			$this->data['leave'] = $this->M_User->get_user_leave($id);
			//bonus
			$where = "date >= '$start_date' and date <= '$end_date' and isPaid='not-paid' and employee_id='$id'";
			$this->db->where($where);
			$this->data['bonus'] = $this->db->get('tbl_bonus')->result();
			//count_all_over_time
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid' and employee_id='$id'";
			$this->db->select_sum('amount')->where($where);
			$query = $this->db->get('tbl_bonus')->result();
			$total_bonus = $query[0]->amount;
			$this->data['total_bonus'] = $total_bonus;
			//total earnings
			$this->data['total_earnings'] = $total_overtime_pay + ($total_number_of_days * $employee_rate) + $total_bonus;
			
			
		}else{
			$end_date = date('Y-m-d');
			$start_date = date('Y-m-d' ,strtotime('-15 day', strtotime($end_date)));
			//attendance
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$this->data['attendance'] = $this->db->get('tbl_attendance')->result();
			//overtime
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and status='not-paid'";
			$this->db->where($where);
			$this->data['overtime'] = $this->db->get('tbl_overtime')->result();
			//count_all_over_time_pay
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and status='not-paid'";
			$this->db->select_sum('total_pay')->where($where);
			$query = $this->db->get('tbl_overtime')->result();
			$total_overtime_pay = $query[0]->total_pay;
			$this->data['total_overtime_pay'] = $total_overtime_pay;
			//count_all_over_time
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and status='not-paid'";
			$this->db->select_sum('number_of_hours')->where($where);
			$query = $this->db->get('tbl_overtime')->result();
			$this->data['count_all_over_time'] = $query[0]->number_of_hours;
			//count attendance
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid'";
			$this->db->where($where);
			$total_number_of_days = $this->db->count_all_results('tbl_attendance');
			$this->data['total_number_of_days'] = $total_number_of_days;
			//employee rate
			$employee_details = $this->M_User->get_employee_details($id);
			$this->db->where('position', $employee_details->position);
			$res = $this->db->get('tbl_employee_rate')->row();
			$employee_rate = $res->rate;
			$this->data['employee_rate'] = $employee_rate;
			//leave
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id'";
			$this->db->where($where);
			$this->data['leave'] = $this->db->get('tbl_leave')->result();
			//holidays
			$where = "date >= '$start_date' and date <= '$end_date'";
			$this->db->where($where);
			$this->data['holidays'] = $this->db->get('tbl_holidays')->result();
			//leave
			$this->data['leave'] = $this->M_User->get_user_leave($id);
			//bonus
			$where = "date >= '$start_date' and date <= '$end_date' and isPaid='not-paid' and employee_id='$id'";
			$this->db->where($where);
			$this->data['bonus'] = $this->db->get('tbl_bonus')->result();
			//count_all_over_time
			$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$id' and isPaid='not-paid' and employee_id='$id'";
			$this->db->select_sum('amount')->where($where);
			$query = $this->db->get('tbl_bonus')->result();
			$total_bonus = $query[0]->amount;
			$this->data['total_bonus'] = $total_bonus;

			//total earnings
			$this->data['total_earnings'] = $total_overtime_pay + ($total_number_of_days * $employee_rate) + $total_bonus;

		}
		//deductions - sss
		// $employee_details = $this->M_User->get_employee_details($id);
		// $this->db->where('position', $employee_details->position);
		// $res =  $this->db->get('tbl_sss')->row();
		// $sss = $res->amount;
		// $this->data['sss']  = $sss;
		// //deductions - pagibig
		// $employee_details = $this->M_User->get_employee_details($id);
		// $this->db->where('position', $employee_details->position);
		// $res =  $this->db->get('tbl_pagibig')->row();
		// $pagibig = $res->amount;
		// $this->data['pagibig'] = $pagibig;
		// //deductions - philhealth
		// $employee_details = $this->M_User->get_employee_details($id);
		// $this->db->where('position', $employee_details->position);
		// $res =  $this->db->get('tbl_philhealth')->row();
		// $philhealth = $res->amount;
		// $this->data['philhealth'] = $philhealth;
		
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
		//total deductions
		$this->data['total_deductions'] = $sss + $pagibig + $philhealth + $tax;
		//total deductions divide by two
		$total_deductions_divide_by_two = ($sss + $pagibig + $philhealth + $tax) / 2;
		$this->data['total_deductions_divide_by_two'] = $total_deductions_divide_by_two;
		//total net pay
		$this->data['total_net_pay'] = ($total_overtime_pay + ($total_number_of_days * $employee_rate) + $total_bonus) - ($total_deductions_divide_by_two);
		//details
		$this->data['employee'] = $this->M_User->get_employee_details($id);
		
		$this->data['employee_id'] = $id;
		$this->data['start_date'] = $start_date;
		$this->data['end_date'] = $end_date;
		$this->data['sidebar'] = 'admin/sidebar';
		$this->data['subview'] = 'admin/payroll/view';
		$this->load->view('main_layout', $this->data);
	}
	public function pay($employee_id, $start_date, $end_date, $salary){
		echo $employee_id . $start_date . $end_date;
		//attendance
		$attendance = array(
			'isPaid' => 'paid'
			);
		$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$employee_id' and isPaid='not-paid'";
		$this->db->where($where);
		$this->db->update('tbl_attendance', $attendance);
		//ot
		$ot = array(
			'status' => 'paid'
			);
		$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$employee_id' and status='not-paid'";
		$this->db->where($where);
		$this->db->update('tbl_overtime', $ot);
		//bonus
		$bonus = array(
			'isPaid' => 'paid'
			);
		$where = "date >= '$start_date' and date <= '$end_date' and employee_id='$employee_id' and isPaid='not-paid'";
		$this->db->where($where);
		$this->db->update('tbl_bonus', $bonus);

		$data = array(
			'date' => date('Y-m-d'),
			'employee_id' => $employee_id,
			'salary' => $salary,
			'status' => 'paid'
			);
		$this->db->insert('tbl_logs', $data);
		redirect('admin/payroll/view/'. $employee_id);

	}

}
?>