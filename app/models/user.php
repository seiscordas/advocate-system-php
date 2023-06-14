<?php
class User extends CI_Model
{
	function login($username, $password)
	{
		$this->db->where('nm_usuario', $username);
		$this->db->where('ds_senha', $password);
		$this->db->limit(1);
		$query = $this->db->get('cmr_usuario');
		
		if($query)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>
