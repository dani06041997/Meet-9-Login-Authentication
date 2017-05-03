<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function daftar() //create user
	{
		$username = $this->input->POST('username');
		$password = md5($this->input->POST('password'));
		$data = array (
   			'username' => $username,
   			'password'  => $password,
  			
  		); 
		$this->db->insert('user',$data);
	}

	public function login($username,$password)
	{
		$this->db->select('id,username,password');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	public function select_username($username) //filter username
	{		 
		$this->db->select('id,username,password');
		$this->db->from('user');
    	$this->db->where('username', $username);
    	$query = $this->db->get();

    	if ($query->num_rows() > 0) {
        	return true;
    	} else {
        	return false;
    	}
	}
	

}

/* End of file User.php */
/* Location: ./application/models/User.php */

 ?>