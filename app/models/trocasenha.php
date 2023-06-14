<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TrocaSenha extends CI_Model {
	function trocar($id)
	{
		$query = $this->db->select('password')->get_where('users',array('id'=>$id));
		$row = $query->row();
		$senha_db = $row->password;
		$senha_antiga = md5($this->input->post('senha_antiga'));
		$senha_nova = md5($this->input->post('senha_nova'));
		if($senha_db == $senha_antiga)
		{
			$this->db->update('users',array('password' => $senha_nova),array('id'=>$id));
		}
		else
		{
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */