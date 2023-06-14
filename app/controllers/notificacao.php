<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notificacao extends CI_Controller {
	var $usuario = '';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('paginator');
		$this->load->library('klcrud');
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
	###################################################/ Notificacao /#######################################################
	function lista($id_fk,$pg = 1)
	{
		$fk_processo = str_replace('-','/',$id_fk);
		//pega valores do banco de dados
		$dados = $this->geral->notificacao(NULL,$fk_processo);
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('notificacao/lista/'.$id_fk.'/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'notificacao_list_view',$data);
	}
	function form_add()
	{
		$data['dadosJuiz'] = $this->geral->juiz();
		$this->template->load('template_view', 'notificacao_form_add_view',$data);
	}
	function add()
	{
		$id = $this->input->post('cd_processo');
		$id = str_replace('/','-',$id);
		$set = $this->input->post();
		$this->klcrud->auto_add('cmr_notificacao',$set);
		redirect(base_url('notificacao/lista/'.$id));
	}
	function form_up($id)
	{
		$data['row'] = $this->geral->notificacao($id);
		$this->template->load('template_view', 'notificacao_form_up_view',$data);
	}
	function up($id)
	{
		$cd_processo = $this->input->post('cd_processo-no');
		$cd_processo = str_replace('/','-',$cd_processo);
		$set = $this->input->post();
		$this->klcrud->auto_up('cmr_notificacao',$set,array('cd_notificacao'=>$id));
		redirect(base_url('notificacao/lista/'.$cd_processo));
	}
	//prepara impressão
	function prepara_impressao($id, $pdf = NULL)
	{
		$this->load->model('notificacaomod','notificacao');
		$data['row'] = $this->notificacao->dados_impressao($id);
		return $this->load->view('notificacao_print_view',$data,$pdf);
	}
	function down_pdf($id,$down)
	{
		$this->load->model('notificacaomod','notificacao');
		$data['row'] = $this->notificacao->dados_impressao($id);
		$html = $this->prepara_impressao($id,TRUE);
		$header = $this->load->view('print_header_view',$data,TRUE);
		$this->load->library('pdf');
		$file = $this->pdf->create_pdf($html,"notificacao",$header);
		if($down)
		{
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="notificacao.pdf"');
			readfile($file);
		}
		else
		{
		    redirect("assets/downloads/notificacao.pdf");
		}
	}
	function del($id_fk,$id)
	{
		if($this->usuario['perfil'] != 1)
		{
			//Se não tiver permissão, bloqueia a ação.
			$mensagem = utf8_decode('Você não tem permição para concluir esta ação!');
			echo '<script type="text/javascript">alert("'. $mensagem .'")</script>';
			die('<script type="text/javascript">history.back()</script>');
		}
		$this->db->delete('cmr_notificacao',array('cd_notificacao'=>$id));
		redirect(base_url('notificacao/lista/'.$id_fk));
	}
}

?>