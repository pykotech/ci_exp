<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username')) {
				redirect('dashboard');		
		} else {
		
			$this->load->view('welcome_message');
		}
	}
    
	public function dashboard() {
	   if($this->session->userdata('username')) {	
			   $this->load->view('expenses');
	   }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
