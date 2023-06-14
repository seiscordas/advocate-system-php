<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Receber extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('paginator');
		$this->load->model('recebermod','receber');
		//$this->load->model('dadosgeralmod','geral');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		ob_start();
		$this->usuario = $this->session->userdata('logged_in');
		if(!$this->usuario['estab'] || !$this->usuario['id'])
		{
			//Se não existir sessão, redireciona à pagina de login.
			redirect('login', 'refresh');
		}
	}
	###################################################/ Receber /#######################################################
	function lista($pg = 1)
	{
		//pega valores do banco de dados
		$dadosReceber = $this->receber->processo();
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dadosReceber,25,$pg);
		//retorna a paginação
		$link = base_url('receber/lista/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
		
		$dadosAnos = $this->receber->anos();
		$opt[''] = "Por Ano";
		foreach($dadosAnos as $rowAnos)
		{
			$optAno = array_shift(explode('-',$rowAnos->dt_vencimento));
			$opt[$optAno] .= $optAno;
		}
		$data['dadosAnos'] = $opt;
		
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'receber_list_view',$data);
	}
	function parcela($id_fk,$pg = 1)
	{		
		//pega valores do banco de dados
		$id = str_replace('-','/',$id_fk);
		$dadosReceber = $this->receber->parcela($id);
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dadosReceber,25,$pg);
		//retorna a paginação
		$link = base_url('receber/lista/'.$id_fk.'/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'receber_parc_list_view',$data);
	}
	function procura_parcela()
	{
		$dadosAnos = $this->receber->anos();
		$opt[''] = "Por Ano";
		foreach($dadosAnos as $rowAnos)
		{
			$optAno = array_shift(explode('-',$rowAnos->dt_vencimento));
			$opt[$optAno] .= $optAno;
		}
		$data['dadosAnos'] = $opt;
		
		$data['parcelas'] = $this->receber->pesquisa($dt_vencimento);
		//verifica se retornou resultado da pesquisa
		if(empty($data['parcelas']))
		{
			$data['noData'] = 'Não foi encontrado nenhum registro.';
		}
		$data['dt_vencimento'] = $this->input->post('dt_vencimento');
		
		$data['ano'] = $this->input->post('ano');
		$data['de'] = $this->input->post('procurarDe');
		$data['ate'] = $this->input->post('procurarAte');
		$data['dia'] = 	$this->input->post('dia');
		$data['mes'] = 	$this->input->post('mes');
		
		$this->template->load('template_view', 'receber_parc_search_view',$data);
	}
}

?>