<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HistoricoMod extends CI_Model {
	
	//pega dados de cliente
	function pesquisa($status)
	{
		$ano = $this->input->post('ano');
		$dia = $this->input->post('dia');
		$cliente =  $this->input->post('cliente');
		$procurarDe = $this->input->post('procurarDe');
		$procurarAte = $this->input->post('procurarAte');
		$dataHist = implode('-',array_reverse(explode('/',$dia)));
		$de = implode('-',array_reverse(explode('/',$procurarDe)));
		$ate = implode('-',array_reverse(explode('/',$procurarAte)));
		//mostra dados do mês
		if(empty($procurarDe) && empty($procurarAte) && empty($dia) && empty($ano))
		{
			$this->db->where("YEAR(NOW()) = YEAR(dataHistorico) AND MONTH(NOW()) = MONTH(dataHistorico)");
		}
		//filtro por ano
		else if(!empty($ano) && empty($procurarDe) && empty($procurarAte) && empty($dia))
		{
			$this->db->where("YEAR(dataHistorico) = ".$ano);
		}
		//filtro por dia
		else if(!empty($dia) && empty($procurarDe) && empty($procurarAte) && empty($ano))
		{
			$this->db->where("DATE(dataHistorico) = DATE('".$dataHist."')");
		}
		//filtro por período
		else if(!empty($procurarDe) && !empty($procurarAte) && empty($dia) && empty($ano))
		{
			$this->db->where("dataHistorico BETWEEN DATE('".$de."') AND DATE('".$ate."')");
		}
		//filtro por cliente
		if(!empty($cliente))
		{
			$this->db->where(array('idcliente'=>$cliente));
		}
		//pega valores do banco de dados
		$this->db->join('pedido','pedido.idpedido = historico.pedido_idpedido');
		$this->db->join('users','users.id = pedido.users_id','left');
		$this->db->join('cliente','cliente.idcliente = pedido.cliente_idcliente');
		$this->db->join('status','status.idstatus = historico.status_idstatus');
		$this->db->where(array('status_idstatus'=>$status));
		return $this->db->get('historico')->result();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */