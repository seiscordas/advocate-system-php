<h2 class="center">COMPROMISSO ARBITRAL</h2>

<p>Auto.: <strong><?php echo $row->cd_processo;?></strong></p>

<br>

<div class="texto">
<p>Por este instrumento de Compromisso Arbitral conforme Art. 10 da LEI FEDE-RAL 9.307/96, de um lado o REQUERENTE <strong><?php echo $row->nm_requerente;?></strong>, inscrito no CPF/CNPJ <strong><?php echo $row->rqt_cpf;?></strong> com endereço à <strong><?php echo $row->rqt_rua . ' Nº ' . $row->rqt_numero;?></strong>, e de outro lado o REQUERIDO <strong><?php echo $row->nm_requerido;?></strong>, inscrito no CPF/CNPJ <strong><?php echo $row->rqd_cpf;?></strong> com endereço à <strong><?php echo $row->rqd_rua . ' Nº ' . $row->rqd_numero . ' ' . $row->rqd_complemento . $row->rqd_cidade . ' ' . $row->rqd_estado;?></strong>, telefone <strong><?php echo $row->rqd_telefone;?></strong> . Declara o(a) REQUERIDO(A) que reconhece o débito apresentado bem como a assinatura constante do documento como sua, e que tem interesse em saldar o DÉBITO apresentado, tem entre si justo e contratado o seguinte:</p>
<br>
<p>1 - Os Compromitentes resolvem submeter o presente litígio ao Juizo Arbitral em conformidade com os Artigos 9º § 1º, 13º § 3º e 21 da LEI 9.307/96, optando pelo Estatuto e Regulamento da <strong><?php echo $row->nm_fantasia.' - '.$row->fl_estado;?></strong>, localizada à - <strong><?php echo mb_strtoupper($row->estab_bairro .' '. $row->estab_cidade .' ( '. $row->estab_estado.' )','UTF-8');?>.</strong></p>
<br>
<p>2 - Conforme Art. 10, III da Lei já nominada, a matéria que será objeto da arbitragem refere-se a <strong><?php echo $documentos;?></strong> no valor total de <strong>R$ <?php echo $vl_totalDoc;?></strong> Valor acrescido de juros convencionados de 1% ao mês e parte do IGP-M(FGV), perfazendo assim o valor de: <strong>R$ <?php echo $vl_divida;?></strong>

acrescido de custas 10%, honorários 10% e protocolo no valor de <strong>R$ <?php echo $vl_protocolo;?></strong> , totalizando um DÉBITO FINAL de <strong>R$ <?php echo $vl_total;?>.</strong>.</p>
<br>
<p>3 - Conforme Art. 13 § 3º da Lei já mencionada e Regulamento da <strong><?php echo $row->nm_fantasia.' - '.$row->fl_estado;?></strong>, os Árbitros aceitos para este litígio são: <strong><?php echo mb_strtoupper($row->nm_juiz,'UTF-8');?></strong>, </strong>, formado em <strong><?php echo mb_strtoupper($row->ds_formacao,'UTF-8');?></strong>, <strong><?php echo mb_strtoupper($row->ds_estcivil,'UTF-8');?></strong>, <strong>BRASILEIRO(A)</strong>, RG nº <strong><?php echo $row->juiz_rg;?></strong>, residente e domiciliado(a) à <strong><?php echo $row->juiz_cidade.' - '.$row->juiz_estado;?></strong>. E como Árbitro Substituto <strong><?php echo mb_strtoupper($row->ds_nomesubs,'UTF-8');?></strong>, BRASILEIRO(A), RG nº <strong><?php echo $row->nr_rgsubs;?></strong>, residente e domiciliado(a) em <strong><?php echo $row->ds_cidadesubs;?></strong>.</p>
<br>
<p>4 - Na forma do Art. 11, II da Lei acima nominada as partes expressamente autorizam os Árbitros a julgarem por equidade, devendo a sentença arbitral ser proferida em <strong><?php echo mb_strtoupper($row->estab_cidade .' ( '. $row->estab_estado.' )','UTF-8');?></strong> , conforme artigos 10, IV e 28 da Lei já mensionada e 125 do CPC.</p>
<br>
<p>5 - O não comparecimento das partes para as audiências marcadas implicará na aplicação, da revelia, em conformidade com o Art. 22 § 3º da LEI FEDERAL 9.307/96.</p>
<br>
<p>6 - Por decisão das partes, DECIDIRAM que o valor total de <strong>R$ <?php echo $vl_total;?></strong> valor que deverá ser pago
<?php if($row->qt_parcelas > 0):?>
 em entrada de <strong>R$ <?php echo $vl_entrada;?></strong>, e o restante no seguinte parcelamento:</p>

<br>

<table class="table table-zebra">
  <thead>
    <tr>
      <th class="txt-left">Nº Parc.</th>
      <th class="txt-left">Emissão</th>
      <th class="txt-left">Valor</th>
      <th class="txt-left">Dt. Vencimento</th>
      <th class="txt-left">Dt. Pagamento</th>
      <th class="txt-left">Vl. Pago</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($dadosParc as $rowParc):?>
    <?php $i += 1;?>
    <tr>
      <td><?php echo $rowParc->nr_parcela;?></td>
      <td><?php echo $rowParc->dt_emissao;?></td>
      <td>R$<?php echo number_format($rowParc->vl_parcela,'2',',','.');?></td>
      <td><?php echo implode('/',array_reverse(explode('-',$rowParc->dt_vencimento)));?></td>
      <td><?php echo implode('/',array_reverse(explode('-',$rowParc->dt_pagamento)));?></td>
      <td>R$<?php echo number_format($rowParc->vl_pago,'2',',','.');?></td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td><strong>Total</strong></td>
      <td></td>
      <td><strong>R$<?php echo $vl_totalParc;?></strong></td>
      <td></td>
      <td></td>
      <td><strong>R$<?php echo $vl_totalVlPago;?></strong></td>
    </tr>
  </tbody>
</table>
<br>
<p>Ciente as partes que o não pagamento de 2(duas) parcelas mensais e consecutivas ou não, acarretarão o vencimento de todas as demais parcelas e QUEBRA DO ACORDO, devendo as parcelas serem pagas na tesouraria desta CÂMARA. O não pagamento incidirá a cláusula penal (multa) de 10% do valor, conforme Art. 290 e 475J do CPC.</p>
<br>
<?php else:?>
 à VISTA. O não pagamento incidirá a cláusula penal (multa) de 10% do valor, conforme Art. 290 e 475J do CPC.
<?php endif;?>
<p>7 - Na forma do Art. 27 da Lei 9.307/96, com a concordância das partes, fica pactuado o pagamento referente a custas no valor de <strong>R$ <?php echo $vl_custa;?></strong>. E com a concordância das partes, fica pactuado o pagamento de honorários dos Árbitros, no valor de <strong>R$ <?php echo $vl_honorario;?></strong>.</p>
<br>
<p>8 - Bem como a taxa de protocolo no valor de <strong>R$ <?php echo $vl_protocolo;?></strong> conforme Estatuto e Regulamento Interno desta Câmara, na forma do Art. 11,V da Lei 9.307/96, correrão por conta da parte REQUERIDA, que serão pagas na data de <strong><?php echo ($row->qt_parcelas > 0)? $dt_venc_parc : $dt_venc_vista?></strong>, valor total por já se encontrar inclusa na somatória total, devendo o pagamento ser efetuado junto à tesouraria desta.</p>
<br>
<p>E, assim por estarem justas e contratadas, firmam este instrumento de compromisso, para que este surta seus efeitos legais e de direito.</p>

<br>

<p><strong><?php echo mb_strtoupper($row->estab_cidade,'UTF-8').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("d/m/Y H:i:s");?></strong></p>
<br>
	
<div class="assinatura">
  <div class="box-ass por-left">
    <div class="campo-ass">
      <p class="center"><strong><?php echo mb_strtoupper($row->nm_requerente,'UTF-8');?></strong></p>
    </div>  
  </div>  
  
  <div class="box-ass por-right">
    <div class="campo-ass">
      <p class="center"><strong><?php echo mb_strtoupper($row->nm_requerido,'UTF-8');?></strong></p>
    </div> 
</div> 