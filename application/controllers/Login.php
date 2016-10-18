<?php
	defined('BASEPATH') OR exit('No direct script acess allowed');

	class Login extends CI_Controller{

		function __construct(){
			
			parent::__construct();
			$this->load->model('blog_model','',TRUE);
			$this->load->driver('session');
			
		}

		public function load_page($page){
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('modal/'.$page);
			$this->load->view('templates/footer');
		}

		public function index(){
			
			$this->load_page('modal_login');
			
			
		}

		public function register_page(){
			
			$this->load_page('register');
		}

		public function register(){

			$this->load->helper('security');
			$this->form_validation->set_rules('firstname','Firstname','required|trim');
			$this->form_validation->set_rules('lastname','Lastname','required|trim');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|trim|callback_check_password_length');
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|callback_compare_passwords');

			if($this->form_validation->run()==FALSE){
				$this->load_page('register');
			}
			else{
				 
				$firstname = $this->security->xss_clean($this->input->post('firstname'));
				$lastname = $this->security->xss_clean($this->input->post('lastname'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$password = hash("sha256", $this->input->post('password').SALT);

				$data = array(
						"firstname" => $firstname,
						"lastname" => $lastname,
						"email" => $email,
						"password" => $password

					);

				$this->blog_model->register($data);
				redirect(base_url('login/'));
			}
		}

		public function load_profile_image(){

			header('Content-type: application/json');
			
			$userid = $this->session->userdata['logged_in']['id'];
			$dataset = $this->blog_model->load_profile_image($userid);
			$result = array();
			
			foreach ($dataset as $data) {
				$result[] = array(
					"image" => $data->image,
					"firstname" => $data->firstname,
					"lastname" =>$data->lastname
					); 
			}

			echo json_encode($result);
		}

		public function profile_page(){

			// if($this->session->userdata('logged_in')){	

				$this->load_page('profile');
			
			// }else{
			// 	redirect(base_url('login/'));
			// }

		}

		public function uploadImage(){
			
			if($this->session->userdata('logged_in')){
				$config['upload_path']   = './assets/uploads/'; 
		        $config['allowed_types'] = '*'; 
		        $config['max_size']      = 10000; 
		        $config['max_width']     = 1024; 
		        $config['max_height']    = 768;  
		        $this->load->library('upload', $config);

		        if(!$this->upload->do_upload()){

		        	$error = array('error' => $this->upload->display_errors());    
			    	var_dump($error);
		       
		        }else{

		        	$data = array('upload_data' => $this->upload->data()); 
		        	$filename = $_FILES['userfile']['name'];
		        	$userid = $this->session->userdata['logged_in']['id'];
		        	$this->blog_model->upload_image($userid,$filename);
		        	redirect(base_url('login/profile_page'));
		        }
		    }
		    else{
		    	redirect(base_url('login/'));
		    }    
		}

		public function auth(){


			$this->form_validation->set_rules('email','Email','required|is_email|callback_check_email|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|callback_check_password_length'); 

			if($this->form_validation->run() == FALSE){
				
				$this->load->view('templates/header');
				$this->load->view('templates/navigation');
				$this->load->view('modal/modal_login');
				$this->load->view('templates/footer');
			 }
			 else{
			 	$email = $this->input->post('email');
			 	$password = $this->input->post('password');
			 	redirect('blog/main_page');
			 	// echo "<pre>";
			 	// print_r($this->session->all_userdata());
			 	// echo "</pre>";
			 }
		}

		function compare_passwords(){
			
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			if(strcmp($password, $confirm_password)==0){
				
				return TRUE;
			}
			else{

				$this->form_validation->set_message('compare_passwords','Password does not match');
				return FALSE;
			}
		}

		function check_password_length(){
			$password = $this->input->post('password');
			$length = strlen($password);

			if($length >= 5){
				return TRUE;
			}
			else{

				$this->form_validation->set_message('check_password_length','Password must be at least 5 characters');
				return FALSE;
			}

		}

		function check_email($email){

			$password = hash("sha256",$this->input->post('password').SALT);
			$results = $this->blog_model->getEmail($email,$password);

			if($results){
				
				foreach ($results as $result) {
					$session = array('id'=>$result->id,
									'email'=>$result->email,
									'password' => $this->encrypt->encode($result->password),
						);
				}

				$this->session->set_userdata('logged_in', $session);
				// $this->session->mark_as_temp('logged_in',300);
				//$this->session->unset_userdata('logged_in');
				return TRUE;

			}	
			else{
				$this->form_validation->set_message('check_email','Account does not exists');
				return FALSE;
			}
			
		}

		function check_user($password){

			$email = $this->input->post('email');
			$results = $this->blog_model->get_user($email,$password);

			if($results){
				
				foreach ($results as $result) {
					$session = array('id'=>$result->id,
									'email'=>$result->email,
									'password' => $result->password,
						);
				}

				$this->session->set_userdata('logged_in', $session);
				return TRUE;
			}
			else{

				$this->form_validation->set_message('check_user','Invalid email and password');
				return FALSE;
			}
		}

		public function logout(){

			$this->session->unset_userdata('logged_in');
			redirect(base_url());
		}

			
	}

?>