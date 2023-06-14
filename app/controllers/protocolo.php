<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Protocolo extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		ob_start();
		$this->usuario = $this->session->userdata('logged_in');
		if(!$this->usuario['estab'] || !$this->usuario['id'])
		{
			//Se não existir sessão, redireciona à pagina de login.
			redirect('login', 'refresh');
		}
	}
	###################################################/ Protocolo /#######################################################
	//prepara impressão
	function prepara_impressao($id_fk,$pdf = NULL)
	{
		$fk_processo = str_replace('-','/',$id_fk);
		$this->load->model('protocolomod','protocolo');
		$dados = $this->protocolo->dados_impressao($fk_processo);
		$data['row'] = $dados['processo'];
		$data['dadosDoc'] = $dados['documento'];
		foreach($data['dadosDoc'] as $docVlDoc)
		{
			$valorTotal += $docVlDoc->vl_documento;
		}
		$data['vl_totalDoc'] = number_format($valorTotal, 2, ',', '.');
		return $this->template->load('print_view', 'protocolo_print_view',$data,$pdf);
	}
	function down_pdf($id,$down)
	{
		$fk_processo = str_replace('-','/',$id);
		$this->load->model('protocolomod','protocolo');
		//dados Header
		$dadosHeader = $this->protocolo->dados_impressao($fk_processo);
		$data['row'] = $dadosHeader['processo'];
		//html
		$html = $this->prepara_impressao($id,TRUE);
		//header
		$header = $this->load->view('print_header_view',$data,TRUE);
		
		$this->load->library('pdf');
		$file = $this->pdf->create_pdf($html,"protocolo",$header);
		if($down)
		{
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="protocolo.pdf"');
			readfile($file);
		}
		else
		{
		    redirect("assets/downloads/protocolo.pdf");
		}
	}
}

?>