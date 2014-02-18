<?php

class Members extends CI_Controller {
        public $db_pre;

	public function __construct() {
		parent::__construct();
		$this->load->library('asseto');
		$this->load->model('usermdl');
	}
	public function start()
	{
		$this->load->view('header');
		echo "<form action=\"".site_url('login/login')."\" method=\"post\">";
		echo form_input();
		echo "</form>";

		$this->load->view('footer');
		
	}
	
	public function login()
	{
		$data = array();	//check if form submit
		if(!$this->session->userdata('username')) {				
				
			$usr = $this->input->post('username');
            $passwd = $this->input->post('password');
 		  	echo "logging you in...";
			$timestamp = time();
			$mysqldate = date( 'Y-m-d H:i:s',$timestamp); 
			
			if($this->usermdl->check($usr,$passwd)) {
				$data = array('username' => $this->input->post('username'), 'timestamp' => $timestamp );
			//date(T) is timezone
			        $this->db->query("INSERT INTO tbl_logins VALUES (null,'". $usr ."','". $mysqldate. "','".date('T')."','ok')"); 
				$this->session->set_userdata($data);
				$data['result'] =  "<span id=\"loginsuccess\"><strong>success</strong></span>";
			} else {
				$this->db->query("INSERT INTO tbl_logins VALUES (null,'". $usr  ."','". $mysqldate. "','".date('T')."','x')");
        			$data['result'] = "<span id=\"loginfail\"><strong>failed</strong></span>";
			}
		} else {
			$res = $this->db->get_where('expenses',array('expensed >=' => '2014-02-01'));
			$data['results'] = $res;
			$this->load->view('login',$data);
		}
		
		$this->load->view('footer');
	
	}
	//TODO
	public function logout() {
//		$this->session
	}
}
