<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CompromissoMod extends CI_Model {
	//pega dados de usuario
	function dados_impressao($id)
	{
		$this->db->select("SUM(vl_documento) as vl_doc, COUNT('ds_documento') as qt_ds_doc, cmr_documento.*");
		$this->db->group_by('ds_documento');
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$dados['documento'] = $this->db->get_where('cmr_documento',array('cmr_documento.cd_processo'=>$id))->result();
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$dados['parcelas'] = $this->db->get_where('cmr_receber',array('cmr_receber.cd_processo'=>$id))->result();
		$this->db->select('
			cmr_processo.*,
			cmr_requerente.*,
			cmr_estab.*,
			cmr_juiz.*,
			
			cmr_estab.ds_ender estab_rua,
			cmr_estab.ds_bairro estab_bairro,
			cmr_estab.nr_cep estab_cep,
			cmr_estab.nr_numero estab_numero,
			cmr_estab.ds_cidade estab_cidade,
			cmr_estab.ds_complemento estab_complemento,
			cmr_estab.fl_estado estab_estado,
			
			cmr_requerente.nm_fantasia rqt_fantasia,
			cmr_requerente.nr_telefone rqt_telefone,
			cmr_requerente.nr_cpf rqt_cpf,
			cmr_requerente.nr_rg rqt_rg,
			cmr_requerente.ds_atividade rqt_atividade,
			cmr_requerente.ds_endereco rqt_rua,
			cmr_requerente.ds_bairro rqt_bairro,
			cmr_requerente.nr_cep rqt_cep,
			cmr_requerente.nr_numero rqt_numero,
			cmr_requerente.ds_cidade rqt_cidade,
			cmr_requerente.ds_complemento rqt_complemento,
			cmr_requerente.fl_estado rqt_estado,
			
			cmr_requerido.nm_fantasia rqd_fantasia,
			cmr_requerido.nr_telefone rqd_telefone,
			cmr_requerido.nr_cpf rqd_cpf,
			cmr_requerido.nr_rg rqd_rg,
			cmr_requerido.nm_procurador rqd_procurador,
			cmr_requerido.ds_endereco rqd_rua,
			cmr_requerido.ds_bairro rqd_bairro,
			cmr_requerido.nr_cep rqd_cep,
			cmr_requerido.nr_numero rqd_numero,
			cmr_requerido.ds_cidade rqd_cidade,
			cmr_requerido.ds_complemento rqd_complemento,
			cmr_requerido.fl_estado rqd_estado,
			
			cmr_juiz.nr_rg juiz_rg,
			cmr_juiz.ds_endereco juiz_rua,
			cmr_juiz.ds_bairro juiz_bairro,
			cmr_juiz.nr_cep juiz_cep,
			cmr_juiz.nr_numero juiz_numero,
			cmr_juiz.ds_cidade juiz_cidade,
			cmr_juiz.ds_complemento juiz_complemento,
			cmr_juiz.fl_estado juiz_estado
		');
		$this->db->join('cmr_juiz','cmr_juiz.cd_juiz = cmr_processo.cd_juiz');
		$this->db->join('cmr_requerente','cmr_requerente.cd_requerente = cmr_processo.cd_requerente');
		$this->db->join('cmr_requerido','cmr_requerido.cd_requerido = cmr_processo.cd_requerido');
		$this->db->join('cmr_estab','cmr_estab.cd_estab = cmr_processo.cd_estab');
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