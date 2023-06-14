<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DadosGeralMod extends CI_Model {
	//pega dados de usuario
	function usuario($id)
	{
		$this->db->where(array('cd_empresa'=>$this->estab_sess('estab')));
		if($id)
		{
			return $this->db->get_where('cmr_usuario',array('cd_usuario'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_usuario','desc');
			return $this->db->get('cmr_usuario')->result();
		}
	}
	//pega dados do requerente
	function requerente($id = NULL)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		if($id)
		{
			return $this->db->get_where('cmr_requerente',array('cd_requerente'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_requerente','desc');
			return $this->db->get('cmr_requerente')->result();
		}
	}
	//pega dados do requerido
	function requerido($id = NULL)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		if($id)
		{
			return $this->db->get_where('cmr_requerido',array('cd_requerido'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_requerido','desc');
			return $this->db->get('cmr_requerido')->result();
		}
	}
	//pega dados do requerido
	function juiz($id = NULL)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		if($id)
		{
			return $this->db->get_where('cmr_juiz',array('cd_juiz'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_juiz','desc');
			return $this->db->get('cmr_juiz')->result();
		}
	}
	//pega dados de estabelecimento
	function estab($id = null)
	{
		if($id)
		{
			return $this->db->get_where('cmr_estab',array('cd_estab'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_estab','desc');
			return $this->db->get('cmr_estab')->result();
		}
	}
	//pega dados de estabelecimentos cadastrados para um usuário
	function usuestab($id = NULL)
	{
		if($id)
		{
			$this->db->select('
				cmr_usuestab.*,
				cmr_estab.*,
				cmr_estab.cd_estab id_estab,
				cmr_usuestab.cd_estab id_usuestab
				');
			$this->db->join('cmr_estab','cmr_estab.cd_estab = cmr_usuestab.cd_estab');
			return $this->db->get_where('cmr_usuestab',array('cd_usuario'=>$id))->result();
		}
		else
		{
			$this->db->order_by('cd_usuario','desc');
			return $this->db->get('cmr_usuestab')->result();
		}
	}
	//pega dados do Evento
	function evento($id = NULL)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		if($id)
		{
			return $this->db->get_where('cmr_evento',array('cd_evento'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_evento','desc');
			return $this->db->get('cmr_evento')->result();
		}
	}
	//pega dados do Processo
	function processo($status = NULL, $id = NULL)
	{
		$this->db->where(array('cmr_processo.cd_estab'=>$this->estab_sess('estab')));
		if($status != 'todos' && $status != NULL)
		{
			$this->db->where(array('fl_conciliado'=>$status));
		}
		if($id)
		{
			$this->db->join('cmr_documento','cmr_documento.cd_processo = cmr_processo.cd_processo','right');		
			return $this->db->get_where('cmr_processo',array('cmr_processo.cd_processo'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_processo','desc');
			return $this->db->get('cmr_processo')->result();
		}
	}
	//pega dados do Documento
	function documento($id = NULL, $fk_processo = NULL)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		if($id != NULL)
		{
			return $this->db->get_where('cmr_documento',array('cd_documento'=>$id))->row();
		}
		elseif($fk_processo != NULL)
		{
			$this->db->order_by('cd_documento','desc');
			return $this->db->get_where('cmr_documento',array('cd_processo'=>$fk_processo))->result();
		}
	}
	//pega dados do Notificação
	function notificacao($id = NULL,$fk_processo = NULL)
	{
		$this->db->where(array('cd_estab'=>$this->estab_sess('estab')));
		if($id != NULL)
		{
			return $this->db->get_where('cmr_notificacao',array('cd_notificacao'=>$id))->row();
		}
		else
		{
			$this->db->order_by('cd_notificacao','desc');
			return $this->db->get_where('cmr_notificacao',array('cd_processo'=>$fk_processo))->result();
		}
	}
	function estab_sess($key)
	{
		$estab_sess = $this->session->userdata('logged_in');
		return $estab_sess[$key];
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */