<div class="btn-group">
  <a href="<?php echo base_url('processo/form_up/'.$this->uri->segment(3))/*codigo processo*/;?>">
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</button>
  </a>
</div>

<h3>Lista de Parcelas Nº Auto: <?php echo str_replace('-','/',$this->uri->segment(3))/*Codigo Processo*/;?></h3>

<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Parc.</th>
        <th>Emissão</th>
        <th>Valor</th>
        <th>Dt. Vencimento</th>
        <th>Dt. Pagamento</th>
        <th>Valor Pago</th>
        <th>Vl. Câmara</th>
        <th>Vl. Arbitro</th>
        <th>Vl. Requerente</th>
        <th>Baixa</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_receber;?></td>
        <td><?php echo $row->nr_parcela;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_emissao)));?></td>
        <td>R$ <?php echo number_format($row->vl_parcela,'2',',','.');?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_vencimento)));?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_pagamento)));?></td>
        <td>R$ <?php echo number_format($row->vl_pago,'2',',','.');?></td>
        <td>R$ <?php echo number_format($row->vl_camara,'2',',','.');?></td>
        <td>R$ <?php echo number_format($row->vl_juiz,'2',',','.');?></td>
        <td>R$ <?php echo number_format($row->vl_requerente,'2',',','.');?></td>
        <td>
        <?php if ($row->fl_pago == "N"):?>
          <a href="<?php echo base_url("parcela/form_add/".$this->uri->segment(3)/*Codigo Processo*/.'/'.$row->cd_receber);?>" title="Dar Baixa na Parcela">
            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Baixa</button>
          </a>
        <?php elseif ($row->fl_pago == "S"):?>
          <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
        <?php endif;?>
        </td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
  <div class="text-center">
    <ul class="pagination pagination-sm">
      <?php echo $paginacao;?>
    </ul>
  </div>
</div><!-- pg ajax-->