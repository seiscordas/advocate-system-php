<h2 class="center">Relação de Parcelas</h2>

<p>REQUERENTE..............................: <strong><?php echo $row->nm_requerente;?></strong></p>
	
<p>REQUERIDO.................................: <strong><?php echo $row->nm_requerido;?></strong></p>

<br>

<div class="texto">
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
      <td><?php echo implode('/',array_reverse(explode('-',$rowParc->dt_emissao)));?></td>
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
</div>