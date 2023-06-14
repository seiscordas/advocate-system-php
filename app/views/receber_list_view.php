<form action="<?php echo base_url('receber/procura_parcela');?>" role="form" method="post">
  <div class="pull-left">
    <a href="<?php echo base_url('admin');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
  </div>
  <?php include('statico/filtro_drop_view.php');?>
  <div class="clearfix"></div>
</form>

<h3>Lista de Processos a Receber</h3>

<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Cd. Processo</th>
        <th>Qtd. Parc.</th>
        <th>Vlr. Parcela</th>
        <th>Vlr. Total</th>
        <th>Vizualizar</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_processo;?></td>
        <td><?php echo $row->qt_parcCamara;?></td>
        <td>R$ <?php echo number_format($row->vl_camara,'2',',','.');?></td>
        <td>R$ <?php echo number_format($row->vl_totalCamara,'2',',','.');?></td>
        <td>
        <?php if ($row->fl_pago == "N"):?>
          <a href="<?php echo base_url("receber/parcela/".str_replace('/','-',$row->cd_processo));?>" title="Dar Baixa na Parcela" class="btn btn-primary">
            <span class="glyphicon glyphicon-ok"></span> Vizualizar
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