<?php
	defined ('BASEPATH') OR exit('No direct script access allowed');

	class Blog extends CI_Controller{

		
		function __construct(){
			
			parent:: __construct();	
			$this->load->helper('html');
			$this->load->model('blog_model','',TRUE);
			$this->load->driver('session');
		}

		public function render_data($content,$data){
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('contents/'.$content,$data);
			$this->load->view('templates/footer');
		}

		public function render_page($content){
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('contents/'.$content);
			$this->load->view('templates/footer');
		}	

		public function index(){
			$this->load->view('templates/header');
			$this->load->view('contents/index');
			$this->load->view('templates/footer');
		}

		public function main_page(){

			$data['query']= $this->blog_model->getAllPost();
			$this->render_data('blog_main',$data);
		}

		public function mail_page(){

			$this->render_page('mail_page');

		}

		public function other_profile(){
			$fid = $this->uri->segment(3);
			$data['query'] = $this->blog_model->load_other_profile($fid);
			$this->render_data('other_profile',$data);
		}

		public function uploadAttachment(){
			
			
				$config['upload_path']   = './assets/attachments/'; 
		        $config['allowed_types'] = '*'; 
		        $config['remove_spaces'] = FALSE;
		        $this->load->library('upload', $config);

		        if(!$this->upload->do_upload()){

		        	$error = array('error' => $this->upload->display_errors());    
			    	var_dump($error);
		       
		        }else{

		        	$data = array('upload_data' => $this->upload->data()); 
		        	$filename = $_FILES['userfile']['name'];
		        	$id = $this->blog_model->upload_attachment($filename);//get the id of newly inserted record
		        	$this->session->set_userdata('attachment_id',$id);

		        	echo "<script> console.log(".$this->session->userdata('attachment_id').")</script>";

		        }
		    
		   
		}

		public function send_email(){
			
			$this->form_validation->set_rules('subject','Subject:','required');
			$this->form_validation->set_rules('to-email','To:','required|valid_email');
			$this->form_validation->set_rules('message','Message:', 'required');

			if($this->form_validation->run() == FALSE){

				$this->render_page('mail_page');

			}else{
				ini_set('max_execution_time', 0);
				$subject = $this->input->post('subject');
				$to = $this->input->post('to-email');
				$message = $this->input->post('message');
				$config['protocol']  = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_port'] = '465';
				$config['smtp_timeout'] = '59';
				$config['smtp_user'] = 'jeck.labasan@gmail.com';
				$config['smtp_pass'] = 'jecklabasan5895';
				$config['charset']  = 'utf-8';
				$config['newline']  = "\r\n";
				 
				  $this->load->library('email', $config);
				 
					if(empty($_FILES['userfile']['name']))	
					{	  
					  	$this->email->from('jeck.labasan@gmail.com','JECK'); // change it to yours
					  	$this->email->to($to); // change it to yours
					  	$this->email->subject($subject);
					  	$this->email->message($message);
					  	if($this->email->send())
						{
						  echo "Your message has been send! <a href='".base_url('blog/mail_page')."'>Return to Mail page </a>";
						}
						 else
						{
						 // show_error($this->email->print_debugger());
							echo "Message sending Failed <a href='".base_url('blog/send_email')."'>Retry </a>";
						}
				  	}
				  	else{
				  		$this->email->from('jeck.labasan@gmail.com','JECK'); // change it to yours
						$this->email->to($to); // change it to yours
						$this->email->subject($subject);
						$this->email->message($message);
					  	$this->uploadAttachment();
						$attachment_id = $this->session->userdata('attachment_id');
						$data = $this->blog_model->load_attachment($attachment_id);//retrieving single row record
						$path = $_SERVER['DOCUMENT_ROOT']; 	
						$file = $path.'/CIBlog/assets/attachments/'.$data->filename;//retrieving single row record
						$this->email->attach($file);

						if($this->email->send())
						{
						  echo "Your message has been send! <a href='".base_url('blog/mail_page')."'>Return to Mail page </a>";
						}
						 else
						{
						 // show_error($this->email->print_debugger());
							echo "Message sending Failed <a href='".base_url('blog/send_email')."'>Retry </a>";
						}
				  	}

			}
			
		}

		public function add_form(){
			
			$this->load->library('Form_validation');
			$this->load->helper('html');
			$this->load->helper('form');
			$this->render_page('blog_add');

		}

		public function add_post(){
				
			if($this->session->userdata('logged_in')){
				
				$this->form_validation->set_rules('title','Title','trim|required');
				$this->form_validation->set_rules('content','Content','trim|required');

				if($this->form_validation->run() == False){
					$this->render_page('blog_add');
				}
				else{
					
					$title = $this->input->post('title',TRUE); /*Second parameter is XSS filtering*/
					$author = $this->session->userdata['logged_in']['id'];
					$content = $this->input->post('content',TRUE); 
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
		        		
		        		$data = array(
								'title' => $title,
								'author' => $author,
								'content' => $content,
								'image' => $_FILES['userfile']['name']//$this->upload->data(), 
								
								);
		        		
						$query = $this->blog_model->post_data($data);
					}	

				
				if($query){
					
					redirect(base_url('blog/main_page'));
				}
				else{
					echo "Error";
					}
				}
			}
			else{
				echo "<script> alert('Login first');</script>";
				$this->render_page('blog_add');
			}
		}

		public function edit_page(){
			$aid = $this->uri->segment(3);
			
			if($this->session->userdata('logged_in')){	
				$query['query']=$this->blog_model->getPost($aid);
				$this->render_data('edit_page',$query);
			}
			else{
				redirect(base_url()."blog/view_page/".$aid);
			}
		}

		public function view_page(){
			$aid = $this->uri->segment(3);
			$query['query']=$this->blog_model->getPost($aid);
			$this->render_data('view_page',$query);
		}

		public function update(){

			$aid = $this->input->post('aid');
			$title = $this->input->post('title');
			$author = $this->input->post('author');
			$content = $this->input->post('content');

			$query = $this->blog_model->update($aid,$title,$content);
			
			if($query === TRUE){
				$this->db->cache_delete_all();
				redirect(base_url()."blog/view_page/".$aid);
			}

		}

		public function delete(){
			$aid = $this->uri->segment(3);
			
			if($this->session->userdata('logged_in')){
				$query = $this->blog_model->delete($aid);

				if($query === TRUE){
					$this->db->cache_delete_all();
					redirect(base_url('blog/main_page'));
				}
			}
			else{
				redirect(base_url()."blog/view_page/".$aid);
			}
		}

		public function search(){

			$key = $this->input->post('searchkey',TRUE);
			$data['query'] = $this->blog_model->search($key);
		
			$this->render_data('search',$data);	

		}

		public function post_comment(){
			$comment = $this->input->post('comment',TRUE);
			$uid = $this->session->userdata['logged_in']['id'];
			$aid = $this->input->post('aid',TRUE);

			$query = $this->Blog_model->post_comment($uid,$comment,$aid);

			$dataset = $this->blog_model->load_comment($aid);
			$result = array();
			foreach ($dataset as $data) {
				$result[] = array(
					"cid" => $data->cid,
					"comment" => $data->comment,
					"firstname" => $data->firstname,
					"lastname" => $data->firstname
					);
				
			}

			echo json_encode($result);	
			

		}
	}
?>