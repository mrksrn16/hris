<?php
class User extends User_Controller
{
	function __construct(){
		parent::__construct();
		//echo $this->M_User->hash('admin123');
	}
	public function login(){
		$this->M_User->loggedin() == FALSE || redirect($dashboard);

		if(isset($_POST['submit'])){
			if($this->M_User->login() === TRUE)
			{
				//Add time in
				if($this->session->userdata('id')){
					// $today = date('Y-m-d');
					// $employee_id = $this->session->userdata('id');
					// $where = "employee_id='$employee_id' AND date='$today'";
					// $this->db->where($where);
					// $query = $this->db->get('tbl_attendance');
					// // var_dump($query->num_rows());
					// if($query->num_rows() == 0){	
					// 	$data = array(
					// 		'employee_id' => $this->session->userdata('id'),
					// 		'time_in' => date('Y-m-d h:i'),
					// 		'date' => date('Y-m-d')
					// 		);
					// 	$this->db->insert('tbl_attendance', $data);
					// }
				}
				if($this->session->userdata('role') == 'admin'){
					redirect('admin/dashboard');
				}else{
					redirect('employee/dashboard');
				}
			}
			if($this->session->userdata('logged_in') == FALSE)
			{
				$holidays = $this->db->get('tbl_holidays')->result();
				$dates = array();
				foreach($holidays as $holiday){
					$dates[] = $holiday->date;
				}
				$now = date('Y-m-d');
				if(in_array($now, $dates)){
				echo '<script>alert("Today is holiday");</script>';
				}else{
					echo '<script>alert("Username/Password didn`t exists.");</script>';
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Username and Password dont exists');
				redirect('user/login' , 'refresh');
			}
		}
		$this->load->view('login');
	}
	public function logout(){
		//add time out
		$today = date('Y-m-d');
		$employee_id = $this->session->userdata('id');
		$where = "employee_id='$employee_id' AND date='$today'";
		$this->db->select('time_out');
		$this->db->from('tbl_attendance');
		$this->db->where($where);
		$result = $this->db->get()->row();
		if(empty($result->time_out)){
			$workingHours = ((strtotime($time_out) - strtotime($result->time_in)) /3600) - 1;
			$data = array(
				'time_out' => date('Y-m-d h:i'),
				'overtime' => $workingHours,
				);
			$this->db->where('employee_id', $employee_id);
			$this->db->update('tbl_attendance', $data);
		}
		$this->M_User->logout();
		redirect('user/login');
		
	}
	public function profile(){
		if($this->session->role == 'admin'){
			redirect('admin/profile');
		}else{
			redirect('employee/profile');
		}
	}
	public function update_picture(){
		if($_FILES['image']['name']){
			$config =  array(
              'upload_path'     => "./uploads/users/",
              'allowed_types'   => "jpg|png|jpeg",
              'overwrite'       => TRUE,
              'max_size'        => "2048000"
            );    
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$image = $_FILES['image']['name'];
				$data = array('upload_data' => $this->upload->data());
				$update = array(
					'photo' => $image
					);
				$this->db->where('user_id', $this->session->userdata('id'));
				$this->db->update('tbl_user_details', $update);
			}
			else
			{
				$image = NULL;
				$error = array('error' => $this->upload->display_errors());
				echo json_encode($error);
			}
		}
		redirect('user/profile');
	}
}

?>