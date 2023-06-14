<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReceberMod extends CI_Model {
	//pega parcelas
	function processo()
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->where(array('fl_pago'=>'N'));
		$this->db->where(array('vl_camara >' => 0));
		$this->db->select("cmr_receber.*, SUM(vl_camara) as vl_totalCamara, COUNT('vl_camara') as qt_parcCamara");
		$this->db->group_by('cd_processo');
		
		return $this->db->get('cmr_receber')->result();
	}
	function parcela($id)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->where(array('fl_pago'=>'N'));
		$this->db->where(array('vl_camara >' => 0));
		
		return $this->db->get_where('cmr_receber',array('cd_processo'=>$id))->result();
	}
	//pega dados de cliente
	function pesquisa()
	{
		$ano = $this->input->post('ano');
		$dia = $this->input->post('dia');
		$mes = $this->input->post('mes');
		$procurarDe = $this->input->post('procurarDe');
		$procurarAte = $this->input->post('procurarAte');
		$dataHist = implode('-',array_reverse(explode('/',$dia)));
		$de = implode('-',array_reverse(explode('/',$procurarDe)));
		$ate = implode('-',array_reverse(explode('/',$procurarAte)));
		
		//mostra dados do mês atual
		if(empty($procurarDe) && empty($procurarAte) && empty($dia) && empty($ano) && empty($mes))
		{
			$this->db->where("YEAR(NOW()) = YEAR(dt_vencimento) AND MONTH(NOW()) = MONTH(dt_vencimento)");
		}
		//filtro por Mês
		elseif(!empty($mes) && empty($procurarDe) && empty($procurarAte) && empty($dia) && empty($ano))
		{
			$this->db->where("YEAR(NOW()) = YEAR(dt_vencimento) AND MONTH(dt_vencimento) = ".$mes);
		}
		//filtro por ano
		elseif(!empty($ano) && empty($procurarDe) && empty($procurarAte) && empty($dia))
		{
			$this->db->where("YEAR(dt_vencimento) = ".$ano);
		}
		//filtro por dia
		elseif(!empty($dia) && empty($procurarDe) && empty($procurarAte) && empty($ano))
		{
			$this->db->where("DATE(dt_vencimento) = DATE('".$dataHist."')");
		}
		//filtro por período
		elseif(!empty($procurarDe) && !empty($procurarAte) && empty($dia) && empty($ano) && empty($mes))
		{
			$this->db->where("dt_vencimento BETWEEN DATE('".$de."') AND DATE('".$ate."')");
		}
		
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->where(array('fl_pago'=>'N'));
		$this->db->where(array('vl_camara >' => 0));
		//pega valores do banco de dados
		return $this->db->get('cmr_receber')->result();
	}
	function anos()
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->where(array('fl_pago'=>'N'));
		$this->db->where(array('vl_camara >' => 0));
		$this->db->group_by('YEAR(dt_vencimento)','asc');
		
		return $this->db->get('cmr_receber')->result();
	}
	function estab_sess($key)
	{
		$estab_sess = $this->session->userdata('logged_in');
		return $estab_sess[$key];
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */