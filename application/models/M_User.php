<?php 
class M_User extends MY_Model
{
	protected $_table_name = 'tbl_user_access';
	protected $_primary_key = 'admin_id';
	public $rules = array(
			'username' => array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required'
				),
			'password' => array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required'
				),
			);
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$holidays = $this->db->get('tbl_holidays')->result();
		$dates = array();
		foreach($holidays as $holiday){
			$dates[] = $holiday->date;
		}
		$now = date('Y-m-d');
		if(!in_array($now, $dates)){
			$user = $this->get_by(array(
				'username' => $this->input->post('username'),
				'password' => $this->hash($this->input->post('password'))
				), TRUE);
			if(count($user))
			{
				$data = array(
					'username' => $user->username,
					'id' => $user->id,
					'role' => $user->role,
					'position' => $user->position,
					'logged_in' => TRUE
					);
				$this->session->set_userdata($data);
			}
			else
			{
				$data = array(
					'logged_in' => FALSE
					);
				$this->session->set_userdata($data);
			}
		}else{
			$user = $this->get_by(array(
				'username' => $this->input->post('username'),
				'password' => $this->hash($this->input->post('password'))
				), TRUE);
			if(count($user))
			{
				$role = $user->role;
				if($role == 'admin'){
					$data = array(
					'username' => $user->username,
					'id' => $user->id,
					'role' => $user->role,
					'logged_in' => TRUE
					);
					$this->session->set_userdata($data);
				}else{
					$data = array(
					'logged_in' => FALSE
					);
				$this->session->set_userdata($data);
				}
			}else{
				return FALSE;
			}
		}
		return TRUE;
	}
	public function loggedin()
	{
		return (bool)$this->session->userdata('logged_in');
	}
	public function logout()
	{
		$this->session->sess_destroy();
	}
	public function hash($string)
	{
		return hash('md5',$string);
	}

	public function get_current_user_details(){
		$id = $this->session->userdata('id');
		$this->db->where('user_id', $id);
		return $this->db->get('tbl_user_details')->row();
	}
	public function get_employees(){
		$this->db->where('role', 'employee');
		return $this->db->get('tbl_user_details')->result();
	}
	public function get_employee_details($id){
		$this->db->where('user_id', $id);
		return $this->db->get('tbl_user_details')->row();
	}
	public function get_employee_access($id){
		$this->db->where('id', $id);
		return $this->db->get('tbl_user_access')->row();
	}
	public function count_employees()
	{
		return $this->db->count_all('tbl_user_details');
	}
	public function fetch_employees($limit,$offset)
	{
		$this->db->where('role', 'employee');
		$this->db->limit($limit,$offset);
		$this->db->order_by('user_id','DESC');
		$query = $this->db->get('tbl_user_details');
		if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return $query->result();	
			}
	}
	public function count_logs()
	{
		return $this->db->count_all('tbl_logs');
	}
	public function fetch_logs($limit,$offset)
	{
		$this->db->limit($limit,$offset);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('tbl_logs');
		if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return $query->result();	
			}
	}
	public function search($string){
		$this->db->select('*');
		$this->db->from('tbl_user_details');
		$this->db->like('name', $string);
		$this->db->or_like('position', $string);
		$this->db->or_like('email', $string);
		$this->db->or_like('contact', $string);
		$this->db->or_like('address', $string);
		$this->db->or_having('role','employee');
		$this->db->order_by('user_id','DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}
	public function get_current_user_attendance(){
		$id = $this->session->userdata('id');
		$this->db->where('employee_id', $id);
		return $this->db->get('tbl_attendance')->result();
	}
	public function get_current_user_leave(){
		$id = $this->session->userdata('id');
		$this->db->where('employee_id', $id);
		return $this->db->get('tbl_leave')->result();
	}
	public function get_current_user_bonus(){
		$id = $this->session->userdata('id');
		$this->db->where('employee_id', $id);
		return $this->db->get('tbl_bonus')->result();
	}
	public function get_user_attendance($id){
		$this->db->where('employee_id', $id);
		return $this->db->get('tbl_attendance')->result();
	}
	public function get_user_leave($id){
		$this->db->where('employee_id', $id);
		return $this->db->get('tbl_leave')->result();
	}
	public function get_user_bonus($id){
		$this->db->where('employee_id', $id);
		return $this->db->get('tbl_bonus')->result();
	}
}
?>