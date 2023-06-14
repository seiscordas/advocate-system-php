<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CaixaMod extends CI_Model {

	function dados_caixa($fl_caixa)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->where("YEAR(NOW()) = YEAR(dt_caixa) AND MONTH(NOW()) = MONTH(dt_caixa)");
		$this->db->where(array('fl_caixa'=>$fl_caixa));
		$this->db->order_by('dt_caixa','asc');
		return $this->db->get_where('cmr_caixa')->result();
	}
	//pega dados de cliente
	function pesquisa($fl_caixa)
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
			$this->db->where("YEAR(NOW()) = YEAR(dt_caixa) AND MONTH(NOW()) = MONTH(dt_caixa)");
		}
		//filtro por Mês
		elseif(!empty($mes) && empty($procurarDe) && empty($procurarAte) && empty($dia) && empty($ano))
		{
			$this->db->where("YEAR(NOW()) = YEAR(dt_caixa) AND MONTH(dt_caixa) = ".$mes);
		}
		//filtro por ano
		elseif(!empty($ano) && empty($procurarDe) && empty($procurarAte) && empty($dia))
		{
			$this->db->where("YEAR(dt_caixa) = ".$ano);
		}
		//filtro por dia
		elseif(!empty($dia) && empty($procurarDe) && empty($procurarAte) && empty($ano))
		{
			$this->db->where("DATE(dt_caixa) = DATE('".$dataHist."')");
		}
		//filtro por período
		elseif(!empty($procurarDe) && !empty($procurarAte) && empty($dia) && empty($ano) && empty($mes))
		{
			$this->db->where("dt_caixa BETWEEN DATE('".$de."') AND DATE('".$ate."')");
		}
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->where(array('fl_caixa'=>$fl_caixa));
		
		//pega valores do banco de dados
		return $this->db->get('cmr_caixa')->result();
	}
	function anos($fl_caixa)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		$this->db->group_by('YEAR(dt_caixa)','asc');
		if($fl_caixa)
		{
			$this->db->where(array('fl_caixa'=>$fl_caixa));
		}
		return $this->db->get('cmr_caixa')->result();
	}
	function estab_sess($key)
	{
		$estab_sess = $this->session->userdata('logged_in');
		return $estab_sess[$key];
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */