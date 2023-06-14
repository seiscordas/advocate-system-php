<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Extrato extends CI_Controller {
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
	###################################################/ Extrato /#######################################################
	//prepara impressão
	function prepara_impressao($id_fk,$pdf = NULL)
	{
		$fk_processo = str_replace('-','/',$id_fk);
		$this->load->model('extratomod','extrato');
		$dados = $this->extrato->dados_impressao($fk_processo);
		$data['row'] = $dados['processo'];
		$data['dadosParc'] = $dados['parcelas'];
		foreach($data['dadosParc'] as $parc)
		{
			$valorTotal += $parc->vl_parcela;
			$totalVlPago += $parc->vl_pago;
		}
		$data['vl_totalParc'] = number_format($valorTotal, 2, ',', '.');
		$data['vl_totalVlPago'] = number_format($totalVlPago, 2, ',', '.');
		return $this->template->load('print_view', 'extrato_print_view',$data,$pdf);
	}
	function down_pdf($id,$down)
	{
		$this->load->model('extratomod','extrato');
		$data['row'] = $this->extrato->dados_impressao($id);
		$html = $this->prepara_impressao($id,TRUE);
		$header = $this->load->view('print_header_view',$data,TRUE);
		
		$this->load->library('pdf');
		$file = $this->pdf->create_pdf($html,"extrato",$header);
		if($down)
		{
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="extrato.pdf"');
			readfile($file);
		}
		else
		{
		    redirect("assets/downloads/extrato.pdf");
		}
	}
}

?>