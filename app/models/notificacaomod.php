<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotificacaoMod extends CI_Model {
	//pega dados de usuario
	function dados_impressao($id)
	{
		$this->db->select('
			cmr_processo.*,
			cmr_requerente.*,
			cmr_estab.*,
			cmr_notificacao.*,
			cmr_juiz.*,
			
			cmr_estab.ds_ender estab_rua,
			cmr_estab.ds_bairro estab_bairro,
			cmr_estab.nr_cep estab_cep,
			cmr_estab.nr_numero estab_numero,
			cmr_estab.ds_cidade estab_cidade,
			cmr_estab.ds_complemento estab_complemento,
			cmr_estab.fl_estado estab_estado
		');
		$this->db->join('cmr_processo','cmr_processo.cd_processo = cmr_notificacao.cd_processo');
		$this->db->join('cmr_juiz','cmr_juiz.cd_juiz = cmr_processo.cd_juiz');
		$this->db->join('cmr_requerente','cmr_requerente.cd_requerente = cmr_processo.cd_requerente');
		$this->db->join('cmr_estab','cmr_estab.cd_estab = cmr_processo.cd_estab');
		$this->db->where(array('cmr_notificacao.cd_estab'=>$this->estab_sess('estab')));
		return $this->db->get_where('cmr_notificacao',array('cd_notificacao'=>$id))->row();
	}
	function estab_sess($key)
	{
		$estab_sess = $this->session->userdata('logged_in');
		return $estab_sess[$key];
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */