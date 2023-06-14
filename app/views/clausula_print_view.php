<h2 class="center">Cláusula Compromissória</h2>
<br>

<p>REQUERENTE..............................: <strong><?php echo $row->nm_requerente;?></strong></p>
	
<p>REQUERIDO.................................: <strong><?php echo $row->nm_requerido;?></strong></p>

<p>ENDEREÇO..................................: <strong><?php echo $row->rqd_rua;?></strong></p>

<p>BAIRRO.........................................: <strong><?php echo $row->rqd_bairro;?></strong></p>

<br>

<p>As partes de comum acordo, elegem para dirimir quaisquer questões decorrentes deste contrato:</p>

<br>

<div class="texto">
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
<br>
<p><strong><?php echo $row->nm_fantasia;?></strong>, localizada à - <strong><?php echo mb_strtoupper($row->estab_bairro .' '. $row->estab_cidade .' ( '. $row->estab_estado.' )','UTF-8');?></strong>, aderindo aos seus regimentos.</p><br>
	
	
<p>"As pastes convenionaram entre si, livremente e amparadas na lei 9.307/96, que qualquer questão oriunda deste contrato, as partes de comum acordo elegem para dirimir quaisquer litígios decorrentes dessa negociação o Tribunal de Conciliação, Mediação e Juizado Arbitral de Apucarana Paraná, situado à Avenida Curitiba, nº 1433 no Edifício Comercial Rosa 1º Andar sala 113, Aderindo aos seus regimentos e regulamentos conforme artigos 5º II, aplicando quando couber o disposto no artigo 22, 3º todos da lei 9.307/96 e ainda o artigo 461 do CPC em todos os seus efeitos, na forma do regulamento arbitral desta Câmara."</p>
<br>	
<p>Nomeamos por livre e espontânea vontade o Arbitro <strong><?php echo mb_strtoupper($row->nm_juiz,'UTF-8');?></strong>, RG nº <strong><?php echo $row->juiz_rg;?></strong>, <strong><?php echo $row->juiz_cidade;?></strong>, <strong><?php echo $row->juiz_estado;?></strong>, residente e domiciliado à <strong><?php echo $row->juiz_cidade.' - '.$row->juiz_estado.' - '.$row->juiz_rua.' - '.$row->juiz_numero ;?>.</strong></p>

<br>
	
<p>Juiz Arbitral para CONCILIAÇÃO, MEDIAÇÃO E JULGAMENTO deste contrato.</p><br>

<br>	
	
<div class="assinatura">
  <div class="box-ass por-left">
    <div class="campo-ass">
      <p class="center"><strong><?php echo mb_strtoupper($row->nm_requerente,'UTF-8');?></strong></p>
    </div>
    
    <br>
      
    <div class="campo-ass">
      <p class="center"><strong>1ª TESTEMUNHA</strong></p>
    </div>  
  </div>  
  
  <div class="box-ass por-right">
    <div class="campo-ass">
      <p class="center"><strong><?php echo mb_strtoupper($row->nm_requerido,'UTF-8');?></strong></p>
    </div>
    
    <br>
              
    <div class="campo-ass">
      <p class="center"><strong>2ª TESTEMUNHA</strong></p>
    </div>
  </div>  
</div> 
 

</div>