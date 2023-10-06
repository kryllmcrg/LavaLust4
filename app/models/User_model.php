<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
    }
	public function insert($username, $email, $password)
{
    $bind = array(
        'username' => $username,
        'email' => $email,
        'password' => $password,
    );
    
    $this->db->table('users')->insert($bind);
}
public function getUser()
{
    $data = $this->db->table('users')->get_all();
    return $data;
}
public function delete($data)
{
    $this->db->table('users')->where("id", $data)->delete();
}
public function seteditdata($id)
{
    $data = $this->db->table('users')->where('id', $id)->get();
    return $data;
}
  public function edit($id, $username, $email, $password)
  {
    $data = [
        'id' => $id,
        'username' => $username,
        'email' => $email,
        'password' => $password,
    ];

    $this->db->table('users')->where('id', $id)->update($data);
}
}
?>
