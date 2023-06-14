<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Documento extends CI_Controller {
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
	###################################################/ Documento /#######################################################
	function lista($id_fk,$pg = 1)
	{
		$fk_processo = str_replace('-','/',$id_fk);
		//pega valores do banco de dados
		$dados = $this->geral->documento(NULL,$fk_processo);
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('documento/lista/'.$id_fk.'/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'documento_list_view',$data);
	}
	function form_add()
	{
		$data['dadosJuiz'] = $this->geral->juiz();
		$this->template->load('template_view', 'documento_form_add_view',$data);
	}
	function add()
	{
		$id = $this->input->post('cd_processo');
		$id = str_replace('/','-',$id);
		$set = $this->input->post();
		$this->klcrud->auto_add('cmr_documento',$set);
		redirect(base_url('documento/lista/'.$id));
	}
	function form_up($id)
	{
		$data['row'] = $this->geral->documento($id);
		$this->template->load('template_view', 'documento_form_up_view',$data);
	}
	function up($id)
	{
		$cd_processo = $this->input->post('cd_processo-no');
		$cd_processo = str_replace('/','-',$cd_processo);
		$set = $this->input->post();
		$this->klcrud->auto_up('cmr_documento',$set,array('cd_documento'=>$id));
		redirect(base_url('documento/lista/'.$cd_processo));
	}
	function procura_documento($status)
	{
		$requerente = $this->input->post('termo_rqt');
		$requerido = $this->input->post('termo_rqd');
		$auto = $this->input->post('termo_auto');
		if($requerente)
		{
			$this->db->like('nm_requerente',$requerente);
		}
		if($requerido)
		{
			$this->db->like('nm_requerido',$requerido);
		}
		if($auto)
		{
			$this->db->like('cd_documento',$auto);
		}
		if($status)
		{
			$fl_conciliacao = ($status == 'andamento')?'N':'S';
			$this->db->where(array('fl_conciliado'=>$fl_conciliacao));
		}
		$this->db->where(array('cd_estab'=>$this->usuario['estab']));
		$termo = $this->input->post('termo');
		$data['dados'] = $this->db->get('cmr_documento')->result();
		$this->load->view('documento_search_view',$data);
	}
	function procura_requerente()
	{
		$this->db->where(array('cd_estab'=>$this->usuario['estab']));
		$termo = $this->input->post('termo');
		$separa = explode('%20',$termo);
		if(is_numeric($termo))
		{
			$this->db->like('cd_requerente',$termo);
		}
		else
		{
			foreach($separa as $row)
			{
				$this->db->like('nm_requerente',$row);
			}
		}
		$this->db->group_by('nm_requerente','asc');
		$data['dados'] = $this->db->get('cmr_requerente')->result();
		$this->load->view('documento_rqt_search_view',$data);
	}
	function procura_requerido()
	{
		$this->db->where(array('cd_estab'=>$this->usuario['estab']));
		$termo = $this->input->post('termo');
		$separa = explode('%20',$termo);
		if(is_numeric($termo))
		{
			$this->db->like('cd_requerido',$termo);
		}
		else
		{
			foreach($separa as $row)
			{
				$this->db->like('nm_requerido',$row);
			}
		}
		$this->db->group_by('nm_requerido','asc');
		$data['dados'] = $this->db->get('cmr_requerido')->result();
		$this->load->view('documento_rqd_search_view',$data);
	}
	function verifica_registro($tabela = 'cmr_documento')
	{
		//Verifica se um dado já está cadastrado
		foreach($this->input->post() as $row => $input)
		{
			$this->db->or_where(array($row => $input));
		}
		$verifica = $this->db->get($tabela)->row();
		if(!empty($verifica))
		{
			echo json_encode(1);
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
		$this->db->delete('cmr_documento',array('cd_documento'=>$id));
		redirect(base_url('documento/lista/'.$id_fk));
	}
}

?>