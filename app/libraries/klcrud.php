<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KlCrud {
	function add($table = '', $set = NULL, $outros = NULL)
	{
		$CI =& get_instance();
		if($set)
		{
			foreach($set as $input)
			{
				$value = $CI->input->post($input);
				if(strpos($input,'-') === false)
				{
					$nomeColuna = $input;
					$dado = $value;			
				}
				else
				{
					$array = explode('-',$input);
					$tratar = array_pop($array);
					$nomeInput = array_shift($array);
					if($tratar == 'dt')
					{
						$value;
						$nomeColuna = $nomeInput;
						$dado = implode("-",array_reverse(explode("/",$value)));
					}
					else if($tratar == 'md')
					{
						$nomeColuna = $nomeInput;
						$dado = str_replace('.','',$value);
						$dado = str_replace(',','.',$dado);
					}
					else if($tratar == 'no')
					{
						$dado = NULL;
					}
				}
				if(!empty($dado))
				{
					$post_array[$nomeColuna] .= $dado;
				}
			}
		}
		if($outros)
		{
			foreach($outros as $inputOutros => $key)
			{
				$post_array[$inputOutros] .= $key;
			}
		}
		$insert = $CI->db->insert($table, $post_array);
    	if($insert)
    	{
    		return $CI->db->insert_id();
    	}
		else
		{
			return false;
		}
	}
	function up($table = '', $set = NULL, $where = 'not null', $outros = NULL)
	{
		$CI =& get_instance();
		if($set)
		{
			foreach($set as $input)
			{
				$post_array[$input] .= $CI->input->post($input);
			}
		}
		if($outros)
		{
			foreach($outros as $inputOutros => $key)
			{
				$post_array[$inputOutros] .= $key;
			}
		}
		$CI->db->update($table, $post_array, $where);
	}
	function del($table = '', $where)
	{
		$this->db->delete($table, $where);
	}
	#
	#
	#
	# Adiciona registro no banco de dados de forma automatica se necessidade de cetar inputs
	# trata "data, moeda" para banco de dados, utilizando os parametros -dt para data e -md para moeda.
	#
	# Exemplo:
	# Data: <input type="text" name="data_cadastro-dt" value="01/12/2020"> convertido para 2020-12-01
	# Moeda: <input type="text" name="valo_compra-md" value="1.000,25"> convertido para 1.000.00
	#
	#
	#
	function auto_add($table = '',$set,$outros = NULL,$exclue = array())
	{
		$CI =& get_instance();
		if($set)
		{
			if($exclue)
			{
				foreach($exclue as $del)
				{
					unset($set[$del]);
				}
			}
			foreach($set as $input => $value)
			{
				if(strpos($input,'-') === false)
				{
					$nomeColuna = $input;
					$dado = $value;					
				}
				else
				{
					$array = explode('-',$input);
					$tratar = array_pop($array);
					$nomeInput = array_shift($array);
					if($tratar == 'dt')
					{
						$nomeColuna = $nomeInput;
						$dado = $this->data_db($value);
					}
					else if($tratar == 'md')
					{
						$nomeColuna = $nomeInput;
						$dado = str_replace('.','',$value);
						$dado = str_replace(',','.',$dado);
					}
					else if($tratar == 'no')
					{
						$dado = NULL;
					}
				}
				if(!empty($dado))
				{
					$post_array[$nomeColuna] .= $dado;
				}
			}
		}
		if($outros)
		{
			foreach($outros as $inputOutros => $key)
			{
				$post_array[$inputOutros] .= $key;
			}
		}
		$insert = $CI->db->insert($table, $post_array);
    	if($insert)
    	{
    		return $CI->db->insert_id();
    	}
		else
		{
			return false;
		}
	}	
	function auto_up($table = '',$set,$where,$outros,$exclue = array())
	{
		$CI =& get_instance();
		if($set)
		{
			if($exclue)
			{
				foreach($exclue as $del)
				{
					unset($set[$del]);
				}
			}
			foreach($set as $input => $value)
			{
				
				if(strpos($input,'-') === false)
				{
					$nomeColuna = $input;
					$dado = $value;					
				}
				else
				{
					$array = explode('-',$input);
					$tratar = array_pop($array);
					$nomeInput = array_shift($array);
					if($tratar == 'dt')
					{
						$nomeColuna = $nomeInput;
						$dado = $this->data_db($value);

					}
					else if($tratar == 'md')
					{
						$nomeColuna = $nomeInput;
						$dado = str_replace('.','',$value);
						$dado = str_replace(',','.',$dado);
					}
					else if($tratar == 'no')
					{
						$dado = 'no';
					}
				}
				if($dado != 'no')
				{
					$post_array[$nomeColuna] .= $dado;
				}
			}
		}
		if($outros)
		{
			foreach($outros as $inputOutros => $key)
			{
				$post_array[$inputOutros] .= $key;
			}
		}
		$CI->db->update($table, $post_array, $where);
	}
	function data_db($data)
	{
		return implode("-",array_reverse(explode("/",$data)));
	}
	function db_data($data)
	{
		return implode("/",array_reverse(explode("-",$data)));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */