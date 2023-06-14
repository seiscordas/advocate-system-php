<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Requerido extends CI_Controller {
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
	###################################################/ Requerido /#######################################################
	function lista($pg = 1)
	{		
		//pega valores do banco de dados
		$dados = $this->geral->requerido();
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('requerido/lista/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'requerido_list_view',$data);
	}
	function form_add()
	{
		$this->template->load('template_view', 'requerido_form_add_view',$data);
	}
	function add()
	{
		$set = $this->input->post();
		$this->klcrud->auto_add('cmr_requerido',$set,NULL,NULL);
		redirect(base_url('requerido/lista'));
	}
	function form_up($id)
	{
		$data['row'] = $this->geral->requerido($id);
		$this->template->load('template_view', 'requerido_form_up_view',$data);
	}
	function up($id)
	{
		$set = $this->input->post();
		$this->klcrud->auto_up('cmr_requerido',$set,array('cd_requerido'=>$id),NULL,NULL);
		redirect(base_url('requerido/lista'));
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
		$this->load->view('requerido_search_view',$data);
	}
	function verifica_registro($tabela = 'cmr_requerido')
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
		$processo = $this->db->get_where('cmr_processo',array('cd_requerido'=>$id))->result();
		foreach($processo as $id_processo)
		{
			$this->db->delete('cmr_receber',array('cd_processo'=>$id_processo->cd_processo));
			$this->db->delete('cmr_documento',array('cd_processo'=>$id_processo->cd_processo));
			$this->db->delete('cmr_notificacao',array('cd_processo'=>$id_processo->cd_processo));
		}
		$this->db->delete('cmr_processo',array('cd_requerido'=>$id));
		$this->db->delete('cmr_requerido',array('cd_requerido'=>$id));
		redirect(base_url('requerido/lista'));
	}
}

?>