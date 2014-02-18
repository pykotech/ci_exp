<?php
class Usermdl extends CI_Model {
  

   function check($usr,$pass) {

      $query = $this->db->get_where('users', array('username' => $usr,'password' => md5($pass)));
      if($query->num_rows() > 0) {
	  foreach($query->result() as $row) { 
	    $uname = $row->username;
	 }
      
         return true;
      } else {
          return false;
      }
      
    }

    function resetpwd($userid,$password) {

       $data = array(
               'password' => md5($password));

	$this->db->where('id', $userid);
	$this->db->update('users', $data); 
    }
	//TODO
    function logout($usr,$timestamp) {

    }

}

