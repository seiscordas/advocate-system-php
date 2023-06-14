<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Caixa extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('paginator');
		$this->load->library('klcrud');
		$this->load->model('caixamod','caixa');
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
	###################################################/ Caixa /#######################################################
	function lista($fl_caixa,$pg = 1)
	{		
		//pega valores do banco de dados
		$dadosCaixa = $this->caixa->dados_caixa($fl_caixa);
		foreach($dadosCaixa as $vl_caixa)
		{
			$vl_totalCaixa = $vl_totalCaixa + $vl_caixa->vl_caixa;
		}
		$data['vl_totalCaixa'] = number_format($vl_totalCaixa,'2',',','.');
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dadosCaixa,25,$pg);
		//retorna a paginação
		$link = base_url('caixa/lista/'.$fl_caixa);
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
		
		$dadosAnos = $this->caixa->anos($fl_caixa);
		$opt[''] = "Por Ano";
		foreach($dadosAnos as $rowAnos)
		{
			$optAno = array_shift(explode('-',$rowAnos->dt_caixa));
			$opt[$optAno] .= $optAno;
		}
		$data['dadosAnos'] = $opt;
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'caixa_list_view',$data);
	}
	function form_add()
	{
		$dadosEvento = $this->geral->evento();
		$eventos[''] .= 'Selecione';
		foreach($dadosEvento as $rowEvento)
		{
			$eventos[$rowEvento->cd_evento] .= $rowEvento->ds_evento;
		}
		$data['eventos'] = $eventos;
		$this->template->load('template_view','caixa_form_add_view',$data);
	}
	function add()
	{
		$set = $this->input->post();
		$fl_caixa = strtolower($this->input->post('fl_caixa'));
		$this->klcrud->auto_add('cmr_caixa',$set);
		redirect('caixa/lista/'.$fl_caixa);
	}
	function procura_caixa($fl_caixa)
	{
		$dadosAnos = $this->caixa->anos($fl_caixa);
		$opt[''] = "Por Ano";
		foreach($dadosAnos as $rowAnos)
		{
			$optAno = array_shift(explode('-',$rowAnos->dt_caixa));
			$opt[$optAno] .= $optAno;
		}
		$data['dadosAnos'] = $opt;
		$data['dados'] = $this->caixa->pesquisa($fl_caixa);
		foreach($data['dados'] as $vl_caixa)
		{
			$vl_totalCaixa = $vl_totalCaixa + $vl_caixa->vl_caixa;
		}
		$data['vl_totalCaixa'] = number_format($vl_totalCaixa,'2',',','.');
		//verifica se retornou resultado da pesquisa
		if(empty($data['dados']))
		{
			$data['noData'] = 'Não foi encontrado nenhum registro.';
		}
		$data['dt_caixa'] = $this->input->post('dt_caixa');
		$data['ano'] = $this->input->post('ano');
		$data['de'] = $this->input->post('procurarDe');
		$data['ate'] = $this->input->post('procurarAte');
		$data['dia'] = 	$this->input->post('dia');
		$data['mes'] = 	$this->input->post('mes');	
		$this->template->load('template_view', 'caixa_search_view',$data);
	}
	function fechamento()
	{
		$dadosAnos = $this->caixa->anos();
		$opt[''] = "Por Ano";
		foreach($dadosAnos as $rowAnos)
		{
			$optAno = array_shift(explode('-',$rowAnos->dt_caixa));
			$opt[$optAno] .= $optAno;
		}
		$data['dadosAnos'] = $opt;
		$data['entrada'] = $this->caixa->pesquisa('E');
		$data['saida'] = $this->caixa->pesquisa('S');
		foreach($data['entrada'] as $vl_caixa_e)
		{
			$vl_totalCaixa_e = $vl_totalCaixa_e + $vl_caixa_e->vl_caixa;
		}
		$data['vl_totalCaixa_e'] = number_format($vl_totalCaixa_e,'2',',','.');
		foreach($data['saida'] as $vl_caixa_s)
		{
			$vl_totalCaixa_s = $vl_totalCaixa_s + $vl_caixa_s->vl_caixa;
		}
		$data['vl_totalCaixa_s'] = number_format($vl_totalCaixa_s,'2',',','.');
		$data['vl_totalCaixa'] = number_format($vl_totalCaixa_e - $vl_totalCaixa_s,'2',',','.');
		//verifica se retornou resultado da pesquisa
		if(empty($data['entrada']))
		{
			$data['noData'] = 'Não foi encontrado nenhum registro.';
		}
		$data['dt_caixa'] = $this->input->post('dt_caixa');
		
		$data['ano'] = $this->input->post('ano');
		$data['de'] = $this->input->post('procurarDe');
		$data['ate'] = $this->input->post('procurarAte');
		$data['dia'] = 	$this->input->post('dia');
		$data['mes'] = 	$this->input->post('mes');
		$this->template->load('template_view', 'caixa_fechamento_view',$data);
	}
	function estorno($id,$fl_caixa)
	{
		$this->db->delete('cmr_caixa',array('cd_caixa'=>$id));
		redirect('caixa/lista/'.$fl_caixa);
	}
}

?>