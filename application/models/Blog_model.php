<?php
	if (! defined('BASEPATH')) exit('No direct script access allowed');
	class Blog_model extends CI_Model{
		
		public function __construct(){
	
			parent:: __construct();
			$this->load->database();
			$this->load->helper('url');
		}	

		public function register($data){

			return ($this->db->insert('accounts',$data));
		}

		public function post_data($data){
			$this->load->database();
			$query = $this->db->insert('articles',$data);
			
			if($this->db->affected_rows() === 1){
				
				$this->db->cache_delete('blog','main_page');
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function update($aid,$title,$content){

			$query = $this->db->query("UPDATE articles SET title ='".$title."',content='".$content."' WHERE aid='".$aid."'");
			if($this->db->affected_rows() === 1){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function delete($aid){

			$query = $this->db->where('aid',$aid)->delete('articles');

			if($this->db->affected_rows() === 1){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public function search($key){

			$query=$this->db->query("SELECT articles.aid AS aid, articles.title AS title, SUBSTRING(articles.content,1,350) AS content, accounts.firstname AS firstname, accounts.lastname AS lastname, articles.date_published AS date_published, accounts.image AS image, articles.image AS blog_image, accounts.id AS author FROM articles INNER JOIN accounts ON accounts.id = articles.author WHERE articles.title LIKE '$key%' OR accounts.firstname LIKE '$key%' ORDER BY articles.date_published DESC");

				return $query->result();
				

		}

		public function getAllPost(){
			
			$query=$this->db->select('articles.aid AS aid, articles.title AS title, SUBSTRING(articles.content,1,350) AS content, accounts.firstname AS firstname, accounts.lastname AS lastname, articles.date_published AS date_published, accounts.image AS image, articles.image AS blog_image, accounts.id AS author')
			->order_by('date_published','DESC')
			->from('articles')
			->join('accounts','accounts.id = articles.author')
			->get();
			return $query->result();
		}

		public function getPost($aid){

			$query = $this->db->select('articles.aid AS aid, articles.title AS title, articles.content AS content, accounts.firstname AS firstname, accounts.lastname AS lastname, articles.date_published AS date_published, accounts.image AS image, articles.image AS blog_image, accounts.id AS author')
			->from("articles")
			->join('accounts','accounts.id = articles.author')
			->where("aid",$aid)->get();
			return $query->row();

		}

		public function getEmail($email,$password){

			 $this->db->select("*");
			 $this->db->from("accounts");
			 $this->db->where('email',$email);
			 $this->db->where('password',$password);

			 $query = $this->db->get();
			 if($query->num_rows() == 1){

			 	return $query->result();
			 }
			 else{
			 	return FALSE;
			 }
		}

		public function get_user($email,$password){
			
			$this->db->select("*");
			$this->db->from("accounts");
			$this->db->where("email",$email);
			$this->db->where("password",$password);

			$query = $this->db->get();
			 if($query->num_rows() == 1){
			 	return $query->result();
			 }
			 else{
			 	return FALSE;
			 }
		}

		public function upload_image($userid,$filename){

			 $this->db->query("UPDATE accounts SET image ='".$filename."' WHERE id ='".$userid."'");

			if($this->db->affected_rows() === 1){

				$this->db->cache_delete('login','load_profile_image');
				return TRUE;
			}
			else{

				return FALSE;
			}

		}

		public function upload_attachment($filename){

			$this->db->query("INSERT INTO `attachment`(`filename`) VALUES ('".$filename."')", FALSE);

			return $this->db->insert_id();

		}

		public function load_attachment($id){

			$this->db->cache_on();
			$data = $this->db->select('*')->from('attachment')->where('id',$id)->get();

			if($data->num_rows() == 1){
				return $this->db->escape($data->row()); //retrieving single row record (1)

			}
			else{
				return FALSE;
			}
		}

		public function load_profile_image($userid){
			$this->db->cache_on();
			$query = $this->db->select("*")->from('accounts')->where('id',$userid)->get();
			
			return $query->result();

		}

		public function load_other_profile($fid){

			$this->db->cache_on();
			$query = $this->db->select("*")->from('accounts')->where('id',$fid)->get();
			
			return $query->row();
		}

		public function post_comment($uid,$comment,$aid){

			$query = $this->db->query("INSERT INTO `comments`(`uid`, `comment`,`aid`) VALUES ('".$uid."','".$comment."','".$aid."')");
			if($this->db->affected_rows() === 1){
				
				$this->db->cache_delete('blog','main_page');
				return $this->db->insert_id();
			}
			else{
				return FALSE;
			}
		}

		public function load_comment($aid){

			$query = $this->db->select("comments.cid AS cid,comments.comment AS comment, comments.date AS date, accounts.firstname AS firstname, accounts.lastname AS lastname, accounts.image AS image")
							->from('comments')
							->join('accounts','accounts.id = comments.uid')
							->join('articles','articles.aid = comments.aid')
							->where('articles.aid',$aid)
							->get();

			return $query->result();
		}

	}
?>