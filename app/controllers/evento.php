<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Evento extends CI_Controller {
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
	###################################################/ evento /#######################################################
	function lista($pg = 1)
	{		
		//pega valores do banco de dados
		$dados = $this->geral->evento();
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('evento/lista/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'evento_list_view',$data);
	}
	function form_add()
	{
		$this->template->load('template_view', 'evento_form_add_view',$data);
	}
	function add()
	{
		$set = array('cd_estab','cd_usuario','ds_evento','fl_evento');
		$this->klcrud->add('cmr_evento',$set);
		redirect(base_url('evento/lista'));
	}
	function form_up($id)
	{
		$data['row'] = $this->geral->evento($id);
		$this->template->load('template_view', 'evento_form_up_view',$data);
	}
	function up($id)
	{
		$set = array('ds_evento','fl_evento');
		$this->klcrud->up('cmr_evento',$set,array('cd_evento'=>$id));
		redirect(base_url('evento/lista'));
	}
	function procura_evento()
	{
		$this->db->where(array('cd_estab'=>$this->usuario['estab']));
		$termo = $this->input->post('termo');
		$separa = explode('%20',$termo);
		if(is_numeric($termo))
		{
			$this->db->like('cd_evento',$termo);
			$this->db->group_by('cd_evento','asc');
		}
		else
		{
			foreach($separa as $row)
			{
				$this->db->like('ds_evento',$row);
			}
			$this->db->group_by('ds_evento','asc');
		}
		$data['dados'] = $this->db->get('cmr_evento')->result();
		$this->load->view('evento_search_view',$data);
	}
	function verifica_registro($tabela = 'cmr_evento')
	{
		//Verifica se um dado já está cadastrado
		foreach($this->input->post() as $row => $input)
		{
			$this->db->or_where(array($row => $input));
		}
		$verifica = $this->db->get($tabela)->row();
		//var_dump($verifica);
		if(!empty($verifica))
		{
			echo json_encode(1);
		}
	}
	function del($id)
	{
		if($this->usuario['perfil'] != 1)
		{
			//Se não tiver permissão, bloqueia a ação.
			$mensagem = utf8_decode('Você não tem permição para concluir esta ação!');
			echo '<script type="text/javascript">alert("'. $mensagem .'")</script>';
			die('<script type="text/javascript">history.back()</script>');
		}
		$this->db->delete('cmr_caixa',array('cd_evento'=>$id));
		$this->db->delete('cmr_evento',array('cd_evento'=>$id));
		redirect(base_url('evento/lista'));
	}
}

?>