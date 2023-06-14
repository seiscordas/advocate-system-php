<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dadosgeralmod','geral');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		ob_start();
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
	}
	function index()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['usuario'] = $session_data;
		$data['username'] = $session_data['username'];
		$estab = $this->input->post('estab');
		if($estab)
		{
			$session_data['estab'] = $estab;
			$this->session->set_userdata('logged_in',$session_data);
		}
		if(!$session_data['estab'])
		{
			$where = array('cd_usuario'=>$data['usuario']['id'],'cmr_usuestab.bo_ativo'=>'A');
			$this->db->select('
				cmr_usuestab.*,
				cmr_estab.*,
				cmr_estab.cd_estab id_estab,
				cmr_usuestab.cd_estab id_usuestab
				');
			$this->db->join('cmr_estab','cmr_estab.cd_estab = cmr_usuestab.cd_estab');
			$data['estab'] = $this->db->get_where('cmr_usuestab',$where)->result();
			$data['estabBox'] = '<script type="text/javascript">estab_select();</script>';
		}
		$this->template->load('template_view','home_view', $data);
	}
}

?>