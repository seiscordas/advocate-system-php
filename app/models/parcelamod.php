<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ParcelaMod extends CI_Model {
	//pega parcelas
	function parcelas($id)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		return $this->db->get_where('cmr_receber',array('cd_processo'=>$id))->result();
	}
	function dados_parcela($id)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		return $this->db->get_where('cmr_receber',array('cd_receber'=>$id))->row();
	}
	function estab_sess($key)
	{
		$estab_sess = $this->session->userdata('logged_in');
		return $estab_sess[$key];
	}
	function gerar_parc($id)
	{
		
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */