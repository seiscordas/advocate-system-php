<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arquivo extends CI_Model {
	function add_img($img,$caminho,$w,$h = NULL)
	{
		$imgPermitido = array('image/jpg','image/jpeg','image/pjpg');
		$imgNome = $img['name'];
		$imgCaminho = $img['tmp_name'];
		$imgTipo = $img['type'];
				
		$dimensao = getimagesize($imgCaminho);
		$x = $dimensao[0];
		$y = $dimensao[1];
		if($x > $w && $x > $y)
		{
			$h = ($w*$y) / $x;
		}
		elseif($y > $w && $x < $y)
		{
			$h = $w;
			$w = ($w*$x) / $y;
		}
		else
		{
			$w = $x;
			$h = $y;
		}
		
		if(in_array($imgTipo, $imgPermitido))
		{
			if(!is_dir($caminho))
			{
				mkdir($caminho, DIR_WRITE_MODE, true);
			}
			$nome = md5(uniqid(rand(), true)).'.jpg';
			$config['image_library'] = 'gd2';
			$config['source_image'] = $imgCaminho;
			$config['new_image'] = $caminho . $nome;
			$config['width'] = $w;
			$config['height'] = $h;
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		}
		return $nome;
	}
	function del_file($file,$caminho)
	{
		$file = $caminho . $file;
		//Verifica se existe o arqivo
		if(is_file($file))
		{
			unlink($file);
		}
	}
	function del_dir($dir)
	{
		//Verifica se existe o diretório
		if(is_dir($dir))
		{
			//Abre o diretorio
			if($handle = opendir($dir))
			{
				//Verifica se tem arquivo e exclui todos
				while(false !== ($file = readdir($handle)))
				{
					if(($file == ".") or ($file == ".."))
					{
						continue;
					}
					if(is_dir($dir . $file))
					{
						$this->del_dir($dir . $file . "/");
					}
					else
					{
						unlink($dir . $file);
					}
				}
			}
			else
			{
				print("nao foi possivel abrir o arquivo.");
				return false;
			}
			// fecha a pasta aberta
			closedir($handle);
			// apaga a pasta, que agora esta vazia
			rmdir($dir);
		}
		else
		{
			print("diretorio informado invalido");
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */