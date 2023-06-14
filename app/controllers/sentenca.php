<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sentenca extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('sentencamod','sentenca');
		$this->load->library('numescrito');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		ob_start();
		$this->usuario = $this->session->userdata('logged_in');
		if(!$this->usuario['estab'] || !$this->usuario['id'])
		{
			//Se não existir sessão, redireciona à pagina de login.
			redirect('login', 'refresh');
		}
	}
	###################################################/ Sentenca /#######################################################
	//prepara impressão
	function prepara_impressao($id_fk,$pdf = NULL)
	{
		$fk_processo = str_replace('-','/',$id_fk);
		$dados = $this->sentenca->dados_impressao($fk_processo);
		$data['row'] = $dados['processo'];
		$data['dadosDoc'] = $dados['documento'];
		$parcelas = $dados['parcelas'];
		//var_dump($parcelas);
		foreach($data['dadosDoc'] as $docVlDoc)
		{
			$valorTotal += $docVlDoc->vl_documento;
		}
		//valor documento
		$data['vl_totalDoc'] = number_format($valorTotal, 2, ',', '.');
		//valor protocolo
		$vl_protocolo = number_format($data['row']->vl_protocolo,'2',',','.');
		$data['vl_protocolo'] = $vl_protocolo.' '.$this->numescrito->saida($vl_protocolo,1);
		//valor divida
		$vl_divida = number_format($data['row']->vl_divida,'2',',','.');
		$data['vl_divida'] = $vl_divida.' '.$this->numescrito->saida($vl_divida,1);
		//valor total
		$vl_total = $data['row']->vl_protocolo + $data['row']->vl_divida + $data['row']->vl_honorarios + $data['row']->vl_custas;
		$vl_total = number_format($vl_total,'2',',','.');
		$data['vl_total'] = $vl_total.' '.$this->numescrito->saida($vl_total,1);		
		//valor entrada
		$vl_entrada = number_format($data['row']->vl_entrada,'2',',','.');
		$data['vl_entrada'] = $vl_entrada.' '.$this->numescrito->saida($vl_entrada,1);
		//valor da custa da camara
		$vl_custa = number_format($data['row']->vl_custas,'2',',','.');
		$data['vl_custa'] = $vl_custa.' '.$this->numescrito->saida($vl_custa,1);
		//valor de honorarios
		$vl_honorario = number_format($data['row']->vl_honorarios,'2',',','.');
		$data['vl_honorario'] = $vl_honorario.' '.$this->numescrito->saida($vl_honorario,1);
		
		//data vencimento a vista
		$data['dt_venc_vista'] = date("d/m/Y");
		//data vencimento a vista
		$data['dt_venc_parc'] = implode('/',array_reverse(explode('-',$parcelas[0]->dt_vencimento)));
		
		return $this->template->load('print_view', 'sentenca_print_view',$data,$pdf);
	}
	function down_pdf($id,$down)
	{
		$fk_processo = str_replace('-','/',$id);
		$dados = $this->sentenca->dados_impressao($fk_processo);
		$data['row'] = $dados['processo'];
		$html = $this->prepara_impressao($id,TRUE);
		$header = $this->load->view('print_header_view',$data,TRUE);
		
		$this->load->library('pdf');
		$file = $this->pdf->create_pdf($html,"sentenca",$header);
		if($down)
		{
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="sentenca.pdf"');
			readfile($file);
		}
		else
		{
		    redirect("assets/downloads/sentenca.pdf");
		}
	}
}

?>