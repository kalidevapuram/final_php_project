<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Login extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");

	}

	public function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users where email=?", array($email))->row_array();
	}
	public function get_id_by_email($email){
		return $this->db->query("SELECT id FROM users where email=?", array($email))->row_array();
	}
	function get_otheruser_info($userid)
	{
		$query = "SELECT users.id, users.name,users.alias,users.email,users.poke_count FROM users WHERE NOT users.id = ? ";
		$values = array($userid);
		return $this->db->query($query, $values)->result_array();
	}
	function add_count($count, $id)
	{
		$query = "UPDATE users SET users.poke_count = users.poke_count+? WHERE  users.id =?";
		$values = array($count, $id);
		return $this->db->query($query,$values);
	}
	function add_user_count($userid, $id, $username, $user_count)
	{
		$query = "INSERT INTO others(user_id, other_id, created_at, updated_at,user_name, users_count) values
		(?, ?, NOW(), NOW(),?, ?);";
		$values = array($userid, $id, $username, $user_count);
		return $this->db->query($query, $values);
		
	}
	function total_pokes($userid){
		$query = "SELECT * from others WHERE other_id = ?";
		$values = array($userid);
		return $this->db->query($query,$values)->result_array();
	}
	function total_poke_count($userid)
	{
		$query = "SELECT  COUNT(*) FROM 
(SELECT COUNT(others.user_name) as count
FROM users
LEFT JOIN others
ON users.id = others.user_id
LEFT JOIN users as users2
ON users2.id = others.other_id
WHERE others.other_id =1
GROUP BY users.id) as count;";
		$values = array($userid);
		return $this->db->query($query,$values)->row_array();
	}
	function people_count($userid)
	{
		$query = "SELECT others.user_name as user_name, COUNT(others.user_name) as count
				FROM users
				LEFT JOIN others
				ON users.id = others.user_id
				LEFT JOIN users as users2
				ON users.id = others.other_id
				WHERE others.other_id = ?
				GROUP BY users.id
				ORDER BY count DESC;";
		$values = array($userid);
		return $this->db->query($query,$values)->result_array();
	}


}