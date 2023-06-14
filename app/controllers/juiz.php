<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Juiz extends CI_Controller {
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
	###################################################/ juiz /#######################################################
	function lista($pg = 1)
	{		
		//pega valores do banco de dados
		$dados = $this->geral->juiz();
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('juiz/lista/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'juiz_list_view',$data);
	}
	function form_add()
	{
		$this->template->load('template_view', 'juiz_form_add_view',$data);
	}
	function add()
	{
		$set = $this->input->post();
		$this->klcrud->auto_add('cmr_juiz',$set);
		redirect(base_url('juiz/lista'));
	}
	function form_up($id)
	{
		$data['row'] = $this->geral->juiz($id);
		$this->template->load('template_view', 'juiz_form_up_view',$data);
	}
	function up($id)
	{
		$set = $this->input->post();
		$this->klcrud->auto_up('cmr_juiz',$set,array('cd_juiz'=>$id));
		redirect(base_url('juiz/lista'));
	}
	function procura_juiz()
	{
		$this->db->where(array('cd_estab'=>$this->usuario['estab']));
		$termo = $this->input->post('termo');
		$separa = explode('%20',$termo);
		if(is_numeric($termo))
		{
			$this->db->like('cd_juiz',$termo);
		}
		else
		{
			foreach($separa as $row)
			{
				$this->db->like('nm_juiz',$row);
			}
		}
		$this->db->group_by('nm_juiz','asc');
		$data['dados'] = $this->db->get('cmr_juiz')->result();
		$this->load->view('juiz_search_view',$data);
	}
	function verifica_registro($tabela = 'cmr_juiz')
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
		$processo = $this->db->get_where('cmr_processo',array('cd_juiz'=>$id))->result();
		foreach($processo as $id_processo)
		{
			$this->db->delete('cmr_receber',array('cd_processo'=>$id_processo->cd_processo));
			$this->db->delete('cmr_documento',array('cd_processo'=>$id_processo->cd_processo));
			$this->db->delete('cmr_notificacao',array('cd_processo'=>$id_processo->cd_processo));
		}
		$this->db->delete('cmr_processo',array('cd_juiz'=>$id));
		$this->db->delete('cmr_juiz',array('cd_juiz'=>$id));
		redirect(base_url('juiz/lista'));
	}
}

?>