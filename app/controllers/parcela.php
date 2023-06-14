<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Parcela extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('paginator');
		$this->load->library('klcrud');
		$this->load->model('parcelamod','parcela');
		$this->load->model('dadosgeralmod','geral');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		ob_start();
		$this->usuario = $this->session->userdata('logged_in');
		if(!$this->usuario['estab'] || !$this->usuario['id'])
		{
			//Se não existir sessão, redireciona à pagina de login.
			redirect('login', 'refresh');
		}
	}
	###################################################/ Parcelas /#######################################################
	function lista($id_fk,$pg = 1)
	{		
		//pega valores do banco de dados
		$id = str_replace('-','/',$id_fk);
		$dados = $this->parcela->parcelas($id);
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('parcela/lista/'.$id_fk.'/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'parcela_list_view',$data);
	}
	function form_add($idProcesso,$idParcela)
	{
		$dadosEvento = $this->geral->evento($cd_evento);
		$eventos[''] .= 'Selecione';
		foreach($dadosEvento as $rowEvento)
		{
			$eventos[$rowEvento->cd_evento] .= $rowEvento->ds_evento;
		}
		$data['eventos'] = $eventos;
		$data['row'] = $this->parcela->dados_parcela($idParcela);
		$this->template->load('template_view', 'parcela_form_add_view',$data);
	}
	function add($idProcesso,$idParcela)
	{
		$skip = array('cd_evento','nr_parcela');
		$setReceber = $this->input->post();
		$this->klcrud->auto_up('cmr_receber',$setReceber,array('cd_receber'=>$idParcela),NULL,$skip);
		
		$dadosParcela = $this->parcela->dados_parcela($idParcela);
		$cd_evento = $this->input->post('cd_evento');
		$dadosEvento = $this->geral->evento($cd_evento);
		$ds_caixa = $dadosEvento->ds_evento.' Auto '.$idProcesso;
		$vl_caixa = str_replace(',','.',$dadosParcela->vl_camara);
		$dt_pagamento = $this->input->post('dt_pagamento-dt');
		$dt_pagamento = implode('-',array_reverse(explode('/',$dt_pagamento)));
		$dadosCaixa = array(
		  "cd_estab" => $this->usuario['estab'],
		  "cd_usuario" => $this->usuario['id'],
		  "cd_evento" => $cd_evento,
		  "dt_caixa" => $dt_pagamento,
		  "vl_caixa" => $vl_caixa,
		  "ds_caixa" => $ds_caixa,
		  "fl_caixa" => 'E'
		);
		$this->klcrud->add('cmr_caixa',NULL,$dadosCaixa);
		
		redirect(base_url('parcela/lista/'.$idProcesso));
	}
	function del($idProcesso,$idParcela)
	{
		$this->db->delete('cmr_receber',array('cd_receber'=>$idParcela));
		redirect(base_url('parcela/lista/'.$idProcesso));
	}
}

?>