<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Estab extends CI_Controller {
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
	###################################################/ estab /#######################################################
	function lista($ativo, $pg = 1)
	{		
		//pega valores do banco de dados
		$bo_ativo = ($ativo == 'a')?'A':'I';
		//$dados = $this->db->get('cmr_estab')->result();
		$dados = $this->db->get_where('cmr_estab',array('bo_ativo'=>$bo_ativo))->result();
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('usuario/lista/'.$ativo.'/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'estab_list_view',$data);
	}
	function form_add()
	{
		$data['usuario'] = $this->geral->usuario($this->usuario['id']);
		$this->template->load('template_view', 'estab_form_add_view',$data);
	}
	function add()
	{
		$set = $this->input->post();
		$this->klcrud->auto_add('cmr_estab',$set);
		redirect(base_url('estab/lista/a'));
	}
	function form_up($id)
	{
		$data['row'] = $this->geral->estab($id);
		$this->template->load('template_view', 'estab_form_up_view',$data);
	}
	function up($id)
	{
		$set = $this->input->post();
		$this->klcrud->auto_up('cmr_estab',$set,array('cd_estab'=>$id));
		redirect(base_url('estab/lista/a'));
	}
	function procura_estab()
	{
		$bo_ativo = $this->input->post('bo_ativo');
		$this->db->where(array('bo_ativo'=>$bo_ativo));
		$termo = $this->input->post('termo');
		$separa = explode('%20',$termo);
		if(is_numeric($termo))
		{
			$this->db->like('cd_estab',$termo);
		}
		else
		{
			foreach($separa as $row)
			{
				$this->db->like('nm_fantasia',$row);
			}
		}
		$this->db->group_by('nm_fantasia','asc');
		$data['dados'] = $this->db->get('cmr_estab')->result();
		$this->load->view('estab_search_view',$data);
	}
	function verifica_registro($tabela = 'cmr_estab')
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
	function status($id)
	{
		if($this->usuario['perfil'] != 1)
		{
			//Se não tiver permissão, bloqueia a ação.
			$mensagem = utf8_decode('Você não tem permição para concluir esta ação!');
			echo '<script type="text/javascript">alert("'. $mensagem .'")</script>';
			die('<script type="text/javascript">history.back()</script>');
		}
		$usuario = $this->geral->estab($id);
		if($usuario->bo_ativo == 'A')
		{
			$this->klcrud->up('cmr_estab',NULL,array('cd_estab'=>$id),array('bo_ativo'=>'I'));
		}
		else
		{
			$this->klcrud->up('cmr_estab',NULL,array('cd_estab'=>$id),array('bo_ativo'=>'A'));
		}
		redirect(base_url('estab/lista/a'));
	}
}

?>