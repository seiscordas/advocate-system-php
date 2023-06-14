<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConciliacaoMod extends CI_Model {

	function conciliar($id)
	{
		$cd_processo    = str_replace('-','/',$id);
		$fl_conciliado  = 'S';
		$vl_honorarios  = $this->valor($this->input->post('vl_honorarios'));
		$vl_custas      = $this->valor($this->input->post('vl_custas'));
		$vl_protocolo   = $this->valor($this->input->post('vl_protocolo'));
		$vl_divida      = $this->valor($this->input->post('vl_divida'));
		$vl_desconto    = $this->valor($this->input->post('vl_desconto'));
		$ds_sentenca    = $this->input->post('ds_sentenca');
		$tipoPag        = $this->input->post('tipoPag');
		$vl_entrada     = $this->valor($this->input->post('vl_entrada'));
		$dt_sentenca    = $this->input->post('dt_sentenca');
		$dt_vencimento  = implode('-',array_reverse(explode('/',$this->input->post('dt_vencimento'))));
		$cd_evento      = $this->input->post('cd_evento');
		
		$dadosEvento = $this->geral->evento($cd_evento);
		//se tiver desconto tira da divida
		if($vl_desconto)
		{
			$vl_divida = $vl_divida - $vl_desconto;
		}
		//se for parcelado cria parcelas
		if($tipoPag == 'P')
		{
			//se tiver entrada tira valor da divida
			if($vl_entrada > 0)
			{
				$vl_divida = $vl_divida - $vl_entrada;
				$ds_caixa = $dadosEvento->ds_evento.' Auto '.$id;
				$vl_entrada = number_format($vl_entrada,'2','.','');
				$dadosCaixa = array(
				  "cd_estab" => $this->usuario['estab'],
				  "cd_usuario" => $this->usuario['id'],
				  "cd_evento" => $cd_evento,
				  "dt_caixa" => $dt_sentenca,
				  "vl_caixa" => $vl_entrada,
				  "ds_caixa" => $ds_caixa,
				  "fl_caixa" => 'E'
				);
				$this->klcrud->add('cmr_caixa',NULL,$dadosCaixa);
			}
			$qt_parcelas  = $this->input->post('qt_parcelas');
			$vl_parcela   = number_format($vl_divida / $qt_parcelas,"2",".","");
			
			$dia_vencimento = $this->input->post('dia_vencimento');
			$mes = date("m");  
			$ano = date("Y");
			
			////////// Calcular quantidade de parcelas camara //////////
			if(($vl_parcela / 4) * $qt_parcelas > $vl_custas)
			{
				$parcCamara = $vl_parcela / 4;
				$parcelajuiz = $vl_parcela / 4;
			}
			elseif(($vl_parcela / 2) * $qt_parcelas > $vl_custas)
			{
				$parcCamara = $vl_parcela / 2;
				$parcelajuiz = $vl_parcela / 2;
			}
			elseif($vl_parcela * $qt_parcelas > $vl_custas)
			{
				$parcCamara = $vl_parcela;
				$parcelajuiz = $vl_parcela;
			}
			$vl_camara = $vl_custas + $vl_protocolo;
			$validaParcCamara = true;
			for($x = 1; $x <= $qt_parcelas; $x++)
			{
				if($parcCamara <= $vl_camara)
				{
					$vl_camara -= $parcCamara;
				}
				else
				{
					$validaParcCamara = false;
				}
				if($validaParcCamara == true)
				{
					$qtd_parcCamara += 1;
				}
			}
			$vl_TotalCamara = number_format($vl_custas + $vl_protocolo,'2','.','');
			$vl_parcJuiz = number_format(($vl_custas + $vl_protocolo) / $qtd_parcCamara,'2','.','');
			$vl_parcCamara = $vl_parcJuiz;
			$vl_TotalJuiz = number_format($vl_honorarios,'2','.','');
			$vl_requerente =  number_format($vl_parcela - ($vl_juiz + $vl_camara),'2','.','');
			
			for($i = 1; $i <= $qt_parcelas; $i++)
			{
				if($vl_TotalCamara >= $vl_parcCamara)
				{
					$vl_TotalCamara -= $vl_parcCamara;
				}
				elseif($vl_TotalCamara > 0)
				{
					$vl_parcCamara = $vl_TotalCamara;
					$vl_TotalCamara -= $vl_parcCamara;
				}
				else
				{
					$vl_parcCamara = '';
				}
				if($vl_TotalJuiz >= $vl_parcJuiz)
				{
					$vl_TotalJuiz -= $vl_parcJuiz;
				}
				else
				{
					$vl_parcJuiz = $vl_TotalJuiz;
					$vl_TotalJuiz -= $vl_parcJuiz;
				}
				$vl_parcRequerente = $vl_parcela - ($vl_parcCamara + $vl_parcJuiz);
				$nr_parcela = $i;
				$dia = $dia_vencimento;
				$mes = $mes + 1;  
				$ano = $ano;
				if ($mes == 13)
				{
					$mes = 1;  
					$ano = $ano + 1;    
				}
				if ($dia > 28 && $mes == 2)
				{
					$dt_vencimento = date("Y-m-d",strtotime($ano."-".$mes."-28"));  
				}
				else
				{  
					$dt_vencimento = date("Y-m-d",strtotime($ano."-".$mes."-".$dia));  
				}
				$dadosParcela = array(
				  "cd_estab" => $this->usuario['estab'],
				  "cd_usuario" => $this->usuario['id'],
				  "cd_processo" => $cd_processo,
				  "nr_parcela" => $nr_parcela,
				  "vl_parcela" => $vl_parcela,
				  "dt_emissao" => date("Y-m-d"),
				  "dt_vencimento" => $dt_vencimento,
				  "vl_camara" => $vl_parcCamara,
				  "vl_juiz" => $vl_parcJuiz,
				  "vl_requerente" => $vl_parcRequerente,
				  "fl_pago" => 'N',
				  "fl_pagojuiz" => 'N',
				  "fl_pagorec" => 'N'
				);
				$this->klcrud->add('cmr_receber',NULL,$dadosParcela);
			}
		}
		else
		{
			$ds_caixa = $dadosEvento->ds_evento.' Auto '.$id;
			$vl_TotalCamara = number_format($vl_custas + $vl_protocolo,'2','.','');
			$dadosCaixa = array(
			  "cd_estab" => $this->usuario['estab'],
			  "cd_usuario" => $this->usuario['id'],
			  "cd_evento" => $cd_evento,
			  "dt_caixa" => $dt_sentenca,
			  "vl_caixa" => $vl_TotalCamara,
			  "ds_caixa" => $ds_caixa,
			  "fl_caixa" => 'E'
			);
			$this->klcrud->add('cmr_caixa',NULL,$dadosCaixa);
		}
		$vl_custas = $vl_custas + $vl_protocolo;
		$dadosProcesso = array(
		  "fl_conciliado" => $fl_conciliado,
		  "vl_honorarios" => $vl_honorarios,
		  "dt_sentenca" => $dt_sentenca,
		  "vl_custas" => $vl_custas,
		  "vl_divida" => $vl_divida,
		  "ds_sentenca" => $ds_sentenca,
		  "qt_parcelas" => $qt_parcelas
		);
		$this->klcrud->up('cmr_processo',NULL,array('cd_processo'=>$cd_processo),$dadosProcesso);
		return $tipoPag;
	}
	function valor($vl)
	{
		$vl = str_replace('.','',$vl);
		$vl = str_replace(',','.',$vl);
		return $vl;
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */