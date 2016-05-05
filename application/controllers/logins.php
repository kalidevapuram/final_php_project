<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Login');

	}

	public function index() {
		$this->session->set_flashdata('oops', "I'm sorry say that again?");
		redirect('/');
	}
	public function signin(){
		$id = $this->Login->get_id_by_email($this->session->userdata('loggedin')['email']);
		$user_data = $this->session->userdata('info');
		$userid=$user_data['id'];
		$other_user = $this->Login->get_otheruser_info($userid);
		$total_pokes = $this->Login->total_pokes($userid);
		$total_poke_count = $this->Login->total_poke_count($userid);
		$people_count = $this->Login->people_count($userid);
		$user_info = array('user_data' => $user_data, 'other_user' => $other_user, 'total_pokes' => $total_pokes, 'total_poke_count' => $total_poke_count, 'people_count' => $people_count);
		
		$this->load->view('login', $user_info);
	}
	public function check(){
		$exists = $this->Login->get_user_by_email($this->input->post('email'));
		$userpassword = $this->input->post('password');
		if($exists){
			$userpassword = $this->input->post('password');
			if($exists['password']==md5($userpassword . ''. $exists['salt'])){
				$usersession = array(
					'id'=>$exists['id'],
					'name' => $exists['name'],
					'alias' => $exists['alias'],
					'email' => $exists['email'],
					'dob' => $exists['dob'],
					'is_logged_in' => true
					);
				$this->session->set_userdata('info', $usersession);
				redirect('/logins/signin');
			}
			else { 
				$this->session->set_flashdata('loginfail', "Sorry, you could not be logged in.");
				redirect('/');
			}
		}
		else {
			$this->session->set_flashdata('loginfail', "Not a valid email, its already in DB");
			redirect('/');
		}
	}
	public function destroy(){
		$this->session->set_flashdata('destroy', "You have been logged off.");
		$this->session->sess_destroy();
		redirect('/');
	}

	
	public function addcount($id)
	{
		$user_data = $this->session->userdata('info');
		$username = $user_data['alias'];
		$userid=$user_data['id'];
		$count =1;	
		$user_count = 1;
		$get_count = $this->Login->add_count($count, $id);
		// $user_count = 0;
		$get_user_count = $this->Login->add_user_count($userid, $id, $username, $user_count);
		
		
		redirect('/logins/signin');
	}




}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */