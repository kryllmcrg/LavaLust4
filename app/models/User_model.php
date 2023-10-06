<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model 
{
	public function insert($username, $email, $password)
    {
        $bind = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            );
        
        $this->db->table('users')->insert($bind);
    }
}
?>
