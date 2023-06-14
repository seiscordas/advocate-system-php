<form action="<?php echo base_url('receber/procura_parcela');?>" role="form" method="post">
  <div class="pull-left">
  <a href="<?php echo base_url('receber/lista');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
  </div>
  <?php include('statico/filtro_drop_view.php');?>
  <div class="clearfix"></div>
</form>

<?php if(!empty($de) && !empty($ate)):?>
<h4>Lista de Parcelas com Vencimento no período de <?php echo $de;?> até <?php echo $ate;?></h4>
<?php endif;?>
<?php if(!empty($dia)):?>
<h4>Lista de Parcelas com Vencimento em <?php echo $dia;?></h4>
<?php endif;?>
<?php if(!empty($mes)):?>
<h4>Lista de Parcelas com Vencimento no Mês <?php echo $mes.'/'.date("Y");?></h4>
<?php endif;?>
<?php if(!empty($ano)):?>
<h4>Lista de Parcelas com Vencimento no Ano <?php echo $ano;?></h4>
<?php endif;?>
<?php if(empty($ano) && empty($de) && empty($ate) && empty($dia) && empty($mes)):?>
<h4>Lista de Parcelas com Vencimento no Mês <?php echo date("m/Y");?></h4>
<?php endif;?>
<?php if(!empty($noData)):?>
<h4><?php echo $noData;?></h4>
<?php else:?>

<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Cd. Processo</th>
        <th>Parcela</th>
        <th>Emissão</th>
        <th>Valor</th>
        <th>Dt. Vencimento</th>
        <th>Baixa</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($parcelas as $row):?>
      <tr>
        <td><?php echo $row->cd_receber;?></td>
        <td><?php echo $row->cd_processo;?></td>
        <td><?php echo $row->nr_parcela;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_emissao)));?></td>
        <td>R$ <?php echo number_format($row->vl_camara,'2',',','.');?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_vencimento)));?></td>
        <td>
          <a href="<?php echo base_url("parcela/form_add/".str_replace('/','-',$row->cd_processo).'/'.$row->cd_receber);?>" title="Dar Baixa na Parcela">
            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Baixa
          </a>
        </td>
    <?php endforeach;?>
    </tbody>
  </table>
  <div class="text-center">
    <ul class="pagination pagination-sm">
      <?php echo $paginacao;?>
    </ul>
  </div>
</div><!-- pg ajax-->
<?php endif;?>