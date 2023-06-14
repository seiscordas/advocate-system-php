<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Conciliacao extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('klcrud');
		$this->load->model('dadosgeralmod','geral');
		$this->load->model('conciliacaomod','conciliacao');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		ob_start();
		$this->usuario = $this->session->userdata('logged_in');
		if(!$this->usuario['estab'] || !$this->usuario['id'])
		{
			//Se não existir sessão, redireciona à pagina de login.
			redirect('login', 'refresh');
		}
	}
	###################################################/ conciliacao /#######################################################
	function form($id)
	{
		$cd_processo = str_replace('-','/',$id);
		$data['dadosProcesso'] = $this->geral->processo(NULL,$cd_processo);
		$data['dadosDoc'] = $this->geral->documento(NULL,$cd_processo);
		$dadosEvento = $this->geral->evento();
		// Calcular juros dos documentos
		foreach($data['dadosDoc'] as $docRow)
		{
			$valDoc = $valDoc + $docRow->vl_documento;
			$dias = (((strtotime(date("d-m-Y 00:59:30")) - strtotime($docRow->dt_vencimento)) / 60) / 60) / 24;
			$juros = $juros + (($docRow->vl_documento * (0.042 * $dias)) / 100);
		}
		$divida = $valDoc + $juros;
		$juros = $juros + ($divida * (0.033 * $dias) / 100); //Compensatorio
		$juros = $juros + ($divida * (0.033 * $dias) / 100); //Moratório
		$eventos[''] .= 'Selecione';
		foreach($dadosEvento as $rowEvento)
		{
			$eventos[$rowEvento->cd_evento] .= $rowEvento->ds_evento;
		}
		$data['eventos'] = $eventos;
		$data['valDoc'] = $valDoc;
		$data['juros'] = $juros;
		$data['divida'] = $valDoc + $juros;
		$data['honorario'] = $data['divida'] * 0.1;
		$data['custas'] = $data['divida'] * 0.1;
		$data['protocolo'] = $data['dadosProcesso']->vl_protocolo;
		$data['total'] = $data['divida'] + $data['honorario'] + $data['custas'] + $data['protocolo'];
		$this->template->load('template_view', 'conciliacao_form_view',$data);
	}
	function conciliar($id)
	{
		$tipoPag = $this->conciliacao->conciliar($id);		
		if($tipoPag == 'P')
		{
			redirect("parcela/lista/".$id);
		}
		else
		{
			redirect("processo/form_up/".$id);
		}
	}
}

?>