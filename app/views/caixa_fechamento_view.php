<form action="<?php echo base_url('caixa/fechamento/'.$this->uri->segment(3))/*fl_caixa*/;?>" role="form" method="post">
  <div class="btn-group pull-left">
    <a href="<?php echo base_url('admin');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
    <a href="<?php echo base_url('caixa/form_add');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Lançar
    </a>
    <a href="<?php echo base_url('caixa/lista/e');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-tasks"></span> Entrada
    </a>
  </div>
  <?php include('statico/filtro_drop_view.php');?>
  <div class="clearfix"></div>
</form>

<?php if(!empty($de) && !empty($ate)):?>
<h4>Fechamento do Caixa no período de <?php echo $de;?> até <?php echo $ate;?></h4>
<?php endif;?>
<?php if(!empty($dia)):?>
<h4>Fechamento do Caixa de <?php echo $dia;?></h4>
<?php endif;?>
<?php if(!empty($mes)):?>
<h4>Fechamento do Caixa do mês <?php echo $mes;?>/<?php echo date("Y");?></h4>
<?php endif;?>
<?php if(!empty($ano)):?>
<h4>Fechamento do Caixa Ano <?php echo $ano;?></h4>
<?php endif;?>
<?php if(empty($ano) && empty($de) && empty($ate) && empty($dia)  && empty($mes)) :?>
<h4>Fechamento do Caixa do Mês <?php echo date("m/Y");?></h4>
<?php endif;?>
<?php if(!empty($noData)):?>
<h4><?php echo $noData;?></h4>
<?php else:?>
<h4>Total Entrada: R$ <?php echo $vl_totalCaixa_e;?></h4>
<h4>Total Saída: R$ <?php echo $vl_totalCaixa_s;?></h4>
<h4>Total Caixa: R$ <?php echo $vl_totalCaixa;?></h4>
<hr>
<h4>Lista de Entrada no Caixa</h4>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Descrição Entrada</th>
        <th>Dt. Entrada</th>
        <th>Vl. Entrada</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($entrada as $row):?>
      <tr>
        <td><?php echo $row->ds_caixa;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_caixa)));?></td>
        <td>R$ <?php echo number_format($row->vl_caixa,'2',',','.');?></td>
      </tr>
    <?php endforeach;?>
    </tbody>
  </table>
<hr>
<h4>Lista de Saída do Caixa</h4>  
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Descrição Saída</th>
        <th>Dt. Saída</th>
        <th>Vl. Saída</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($saida as $row):?>
      <tr>
        <td><?php echo $row->ds_caixa;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_caixa)));?></td>
        <td>R$ <?php echo number_format($row->vl_caixa,'2',',','.');?></td>
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
<?php endif;?>