<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExtratoMod extends CI_Model {
	//pega dados de usuario
	function dados_impressao($id)
	{
		$this->db->where(array('cmr_receber.cd_estab'=>$this->estab_sess('estab')));
		$dados['parcelas'] = $this->db->get_where('cmr_receber',array('cd_processo'=>$id))->result();
		
		$this->db->where(array('cmr_processo.cd_estab'=>$this->estab_sess('estab')));
		$dados['processo'] = $this->db->get_where('cmr_processo',array('cmr_processo.cd_processo'=>$id))->row();
		
		return $dados;
	}
	function estab_sess($key)
	{
		$estab_sess = $this->session->userdata('logged_in');
		return $estab_sess[$key];
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */