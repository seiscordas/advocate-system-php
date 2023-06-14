<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TrocarSenha extends CI_Controller {
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
	###################################################/ Troca Senha /################################################
	function trocar_senha()
	{
		$data['usuario'] = $session_data = $this->session->userdata('logged_in');
	    $this->template->load('template_view', 'troca_senha_view',$data);
	}
	function up_senha($id)
	{
		$data['usuario'] = $session_data = $this->session->userdata('logged_in');
		$this->load->model('trocasenha');
		$retorno = $this->trocasenha->trocar($id);
		if($retorno === false)
		{
			$data['erro'] = '<h2 class="error">Senha antiga não confere.</h2>';
			$this->template->load('template_view', 'troca_senha_view',$data);
		}
		else
		redirect('login', 'refresh');
	}
}

?>