<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Controller {
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
	////////////////////////////// Usuário ////////////////////////////////
	function lista($ativo,$pg = 1)
	{
		//pega valores do banco de dados
		$bo_ativo = ($ativo == 'a')?'A':'I';
		//verifica usuario
		if($this->usuario['perfil'] != 1)
		{
			$dados = $this->db->get_where('cmr_usuario',array('cd_usuario'=>$this->usuario['id'],'cd_empresa'=>$this->usuario['estab']))->result();
		}
		else
		{
			$dados = $this->db->get_where('cmr_usuario',array('bo_ativo'=>$bo_ativo,'cd_empresa'=>$this->usuario['estab']))->result();
		}
		
		//retorna os arquivo de um pagina
		$retorno = $this->paginator->separa_pag($dados,25,$pg);
		//retorna a paginação
		$link = base_url('usuario/lista/'.$ativo.'/');
		$paginacao = $this->paginator->paginacao($retorno['numPg'],$link,$pg);
				
		$data['paginacao'] = $paginacao;
		$data['dados'] = $retorno['arquivoPg'];
		$data['paginacao'] = $paginacao;
		$this->template->load('template_view', 'usuario_list_view',$data);
	}
	function form_add()
	{
		$data['estab'] = $this->geral->estab();
		$this->template->load('template_view', 'usuario_form_add_view',$data);
	}
	function add()
	{
		//retira input do klcrud
		$unSet = array('cd_estab','ds_senha');
		//criptogra a senha
		$senha = md5($this->input->post('ds_senha'));	
		//pega dados inputs para klcrud
		$set = $this->input->post();		
		//insere os dados em cmr_usuario
		$this->klcrud->auto_add('cmr_usuario',$set,array('ds_senha'=>$senha),$unSet,NULL);
		//inputs manual para klcrud
		$set_manual = array('cd_usuario','bo_ativo');
		//outros imputs
		$data = $this->klcrud->data_db($this->input->post('dt_cadast-dt'));
		//pega dados input cd_estab array
		$cd_estab = $this->input->post('cd_estab');
		foreach($cd_estab as $row_estab)
		{
			$outros = array('cd_estab' => $row_estab,'dt_cadastro'=>$data);
			//insere os dados em cmr_estab
			$this->klcrud->add('cmr_usuestab',$set_manual,$outros);
		}
		redirect(base_url('usuario/lista/a'));
	}
	function form_up($id)
	{
		if($this->usuario['perfil'] != 1 && $this->usuario['id'] != $id)
		{
			//Se não tiver permissão, bloqueia a ação.
			$mensagem = utf8_decode('Você não tem permição para concluir esta ação!');
			echo '<script type="text/javascript">alert("'. $mensagem .'")</script>';
			echo '<script type="text/javascript">history.back()</script>';
			die;
		}
		$data['usuario'] = $this->db->get_where('cmr_usuario',array('cd_usuario'=>$id))->row();
		$data['usuestab'] = $this->geral->usuestab($id);
		//Pega todos estabelecimentos
		$estab = $this->geral->estab();
		//Compara e remove os cadastrados para usuário
		$qtdReg = count($estab);
		foreach($data['usuestab'] as $row_ususatab)
		{
			for($i=0; $i <= $qtdReg;$i++)
			{
				if($row_ususatab->cd_estab === $estab[$i]->cd_estab)
				{
					unset($estab[$i]);
				}					
			}
		}
		//Atribui a varivável os não cadastrados a usuáorio
		$data['estab'] = $estab;
		
		$this->template->load('template_view', 'usuario_form_up_view',$data);
	}
	function up($id)
	{
		$set = array('nm_usuario','bo_ativo','cd_nivel');
		//trata a senha
		$senha = $this->input->post('ds_senha');
		if($senha)
		{
			$senha = array('ds_senha'=>md5($senha));
			$this->klcrud->up('cmr_usuario',$set,array('cd_usuario'=>$id),$senha);
		}
		else
		{
			$this->klcrud->up('cmr_usuario',$set,array('cd_usuario'=>$id));
		}
		//inputs manual para klcrud
		$set_manual = array('cd_usuario','bo_ativo');
		//outros imputs
		$data = date("Y-m-d");
		//pega dados da tabela usuestab e faz um array para compara com input
		$this->db->select('cd_estab');
		$usuestab = $this->db->get_where('cmr_usuestab',array('cd_usuario'=>$id))->result();
		foreach($usuestab as $row_usuestab)
		{
			$array_usuestab[] .= $row_usuestab->cd_estab;
		}
		//pega dados input cd_estab array
		$cd_estab = $this->input->post('cd_estab');
		//compara valor do input com banco para inserir valor
		foreach($cd_estab as $row_estab)
		{
			if(!in_array($row_estab,$array_usuestab))
			{
				$outros = array('cd_usuario'=>$id,'cd_estab'=>$row_estab,'dt_cadastro'=>$data);
				//insere os dados em cmr_estab
				$this->klcrud->add('cmr_usuestab',$set_manual,$outros);
			}
		}
		//compara valor do banco com input para excluir valor
		foreach($array_usuestab as $row_array_usuestab)
		{
			if(!in_array($row_array_usuestab,$cd_estab))
			{
				$this->db->delete('cmr_usuestab',array('cd_estab'=>$row_array_usuestab,'cd_usuario'=>$id));
			}
		}
		$bo_ativo = ($this->input->post('bo_ativo') == 'A')?'a':'i';
		redirect(base_url('usuario/lista/'.$bo_ativo));
	}
	function procura_usuario()
	{
		$this->db->where(array('cd_empresa'=>$this->usuario['estab']));
		$termo = $this->input->post('termo');
		$bo_ativo = $this->input->post('bo_ativo');
		$this->db->where(array('bo_ativo'=>$bo_ativo));
		$separa = explode('%20',$termo);
		if(is_numeric($termo))
		{
			$this->db->like('cd_usuario',$termo);
		}
		else
		{
			foreach($separa as $row)
			{
				$this->db->like('nm_usuario',$row);
			}
		}
		$this->db->group_by('nm_usuario','asc');
		$this->db->where(array('bo_ativo'=>$bo_ativo));
		$data['dados'] = $this->db->get('cmr_usuario')->result();
		$this->load->view('usuario_search_view',$data);
	}
	function verifica_registro($tabela = 'cmr_usuario')
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
		$usuario = $this->geral->usuario($id);
		if($usuario->bo_ativo == 'A')
		{
			$this->klcrud->up('cmr_usuario',NULL,array('cd_usuario'=>$id),array('bo_ativo'=>'I'));
		}
		else
		{
			$this->klcrud->up('cmr_usuario',NULL,array('cd_usuario'=>$id),array('bo_ativo'=>'A'));
		}
		redirect(base_url('usuario/lista/a'));
	}
}

?>