<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginator {
	#############################################/ Ver Produtos Cadastrados /#################################################
	function separa_pag($arquivos,$qtd,$pg)
	{
		$pagArquivo = array_chunk($arquivos, $qtd);
		$retorno['numPg']     = count($pagArquivo);
		$retorno['arquivoPg']  = $pagArquivo[$pg-1];
		return $retorno;
	}
	function paginacao($numPg, $link,$pg = 1)
	{
		if($pg != 1)
		{
			$prev = $pg-1;
			$paginacao .= '<li><a href="'.$link.'/'. $prev .'"><strong>Anterior</strong></a></li>'."\n";
		}
		
		if($numPg > 1)
		{
			for($i = 1; $i <= $numPg; $i++){
				if($i == $pg){
					$paginacao .= '<li class="active"><a href="#" class="nolink"><strong>'. $i .'</strong></a></li>'."\n";
				}else{
					$paginacao .= '<li><a href="'.$link.'/'.$i.'">'. $i .'</a></li>'."\n";
				}
			}
		}
		
		if(!empty($numPg) && $pg != $numPg)
		{
			$next = $pg+1;
			$paginacao .= '<li><a href="'.$link.'/'. $next .'"><strong>Proxima</strong></a></li>'."\n";
		}
		return $paginacao;
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */