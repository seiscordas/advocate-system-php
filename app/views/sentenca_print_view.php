<h2 class="center">SENTENÇA ARBITRAL</h2>

<p>Auto............................: <strong><?php echo $row->cd_processo;?></strong></p>
	
<p>Requerido................: <strong><?php echo $row->nm_requerido;?></strong></p>

<p>Árbitro........................: <strong><?php echo $row->nm_juiz;?></strong></p>

<p>Formação.................: <strong><?php echo $row->ds_formacao;?></strong></p>

<p>Estado Civil:.............: <strong><?php echo $row->ds_estadocivsubs;?></strong></p>

<p>Digitador...................: <strong><?php echo $row->nm_digitador;?></strong></p>

<br>

<div class="texto">

<p>No dia <strong><?php echo date("d/m/Y H:i:s");?></strong> compareceu a esta CÂMARA o REQUERENTE <strong><?php echo $row->nm_requerente;?></strong> , inscrito no CPF/CNPJ <strong><?php echo $row->rqt_cpf;?></strong> com endereço à <strong><?php echo $row->rqt_rua . ' Nº ' . $row->rqt_numero;?></strong>, neste ato, e de outro lado o REQUERIDO <strong><?php echo $row->nm_requerido;?></strong>, inscrito no CPF/CNPJ <strong><?php echo $row->rqd_cpf;?></strong> com endereço à <strong><?php echo $row->rqd_rua . ' Nº ' . $row->rqd_numero . ' ' . $row->rqd_complemento . $row->rqd_cidade . ' ' . $row->rqd_estado;?></strong>, telefone <strong><?php echo $row->rqd_telefone;?></strong> . Declara o(a) REQUERIDO(A) que reconhece o débito apresentado bem como a assinatura constante do documento como sua, e que tem interesse em saldar o DÉBITO apresentado, tem entre si justo e contratado o seguinte:</p>
<br>

<table class="table table-zebra">
  <thead>
    <tr>
      <th class="txt-left">Documento</th>
      <th class="txt-left">Número</th>
      <th class="txt-left">Emissão</th>
      <th class="txt-left">Vencimento</th>
      <th class="txt-left">Valor</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($dadosDoc as $rowDoc):?>
    <?php $i += 1;?>
    <tr>
      <td><?php echo $rowDoc->ds_documento;?></td>
      <td><?php echo $rowDoc->nr_documento;?></td>
      <td><?php echo implode('/',array_reverse(explode('-',$rowDoc->dt_emissao)));?></td>
      <td><?php echo implode('/',array_reverse(explode('-',$rowDoc->dt_vencimento)));?></td>
      <td>R$ <?php echo $rowDoc->vl_documento;?></td>
    </tr>
    <?php endforeach;?>
    <tr>
      <td><strong>Total dos Documentos</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><strong>R$ <?php echo $vl_totalDoc;?></strong></td>
    </tr>
  </tbody>
</table>
<br><br>

<p>Valor acrescido de juros convencionados de 1% ao mês e parte do IGP-M(FGV), perfazendo assim o valor de: <strong>R$ <?php echo $vl_divida;?></strong>

acrescido de custas 10%, honorários 10% e protocolo no valor de <strong>R$ <?php echo $vl_protocolo;?></strong> , totalizando um DÉBITO FINAL de <strong>R$ <?php echo $vl_total;?>.</strong></p>
<br>
<p>
<?php if($row->qt_parcelas > 0):?>
Por decisão das partes, fica pactuado o seguinnte valor e forma de pagamento: Entrada no valor de <strong>R$ <?php echo $vl_entrada;?></strong> e o restante em <strong><?php echo $row->qt_parcelas;?></strong> parcelas.
<?php else:?>
PAGARÁ o REQUERIDO ao REQUERENTE o valor de <strong>R$ <?php echo $vl_divida;?></strong> que deverá ser pago à VISTA.
<?php endif;?></p><br>

<p>Em conformidade com o Artigo 290 do CPC, pactuam ainda as partes que o não pagamento de 2 (duas) parcelas mensais e consecutivas ou não, acarretarão o vencimento de todas as demais parcelas e a <strong>QUEBRA DO ACORDO</strong>.</p><br>

<p>Devendo as parcelas serem pagas na tesouraria desta CÂMARA. Na forma do Artigo 27 da LEI 9.307/96 com a concordância das partes, fica pactuado o pagamento referente a custas no valor de <strong>R$ <?php echo $vl_custa;?></strong> e com a concordância das partes, fica pactuado o pagamento de honorários dos Árbitros, no valor de <strong>R$ <?php echo $vl_honorario;?></strong> protocolo no valor de <strong>R$ <?php echo $vl_protocolo;?></strong> concordam ainda com o pagamento de perito quando houver necessidade, bem como a nomeação dos Árbitros, conforme Estatuto e Regulamento Interno desta CÂMARA, na forma do Art. 11, V, da LEI 9.307/96, correrão por conta da parte REQUERIDA, que serão pagas na data de <strong><?php echo ($row->qt_parcelas > 0)? $dt_venc_parc : $dt_venc_vista?></strong> valor total por já se encontrar inclusa na somatória, devendo o pagamento ser efetuado junto à tesouraria desta. O não pagamento incidirá a cláusula penal (multa) de 10% do valor, conforme artigo 290 e 475J do Código Civil. Essa foi a proposta oferecida pelo REQUERIDO e aceita pelo REQUERENTE, baseando-se exclusivamente na vontade autonoma das partes. O REQUERENTE deverá retirar do SCPC o nome do REQUERIDO, reabilitando o crédito, após a quitação do débito.</p><br>

<p>Conforme os Artigos 21, § 4º, 26, I, II, III, IV, 28 e 31, e na forma do Art. 18 da já mencionada LEI e, ainda o Art. 584, VI do CPC, declaramos HOMOLOGADA a presente CONCILIAÇÃO entre as partes, para que produza seus efeitos legais convertendo-a em TITULO EXECUTIVO JUDICIAL.
Colhidos os cientes das partes, na forma do Art. 29 da citada LEI.</p>
<br>
<br>

<p><strong>Registre-se:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mb_strtoupper($row->estab_cidade,'UTF-8').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.date("d/m/Y H:i:s");?></strong></p>
<br>
<br>
	
    <p><strong>Juiz Arbitral:_______________________________________________________________________<?php echo date("d/m/Y H:i:s");?></strong></p>
    <br>
    <br>
    <p><strong>Ciente/REQUERENTE:_____________________________________________________________<?php echo date("d/m/Y H:i:s");?></strong></p>
    <br>
    <br>
    <p><strong>Ciente/REQUERIDO...:_____________________________________________________________<?php echo date("d/m/Y H:i:s");?></strong></p>