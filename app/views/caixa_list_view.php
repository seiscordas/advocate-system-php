<?php $fl_caixa = ($this->uri->segment(3) == 'e')? 'Entrada':'Saída';/*fl_caixa*/?>
<form action="<?php echo base_url('caixa/procura_caixa/'.$this->uri->segment(3))/*fl_caixa*/;?>" role="form" method="post">
  <div class="pull-left">
    <a href="<?php echo base_url('admin');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
    <a href="<?php echo base_url('caixa/form_add');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Lançar
    </a>
    <a href="<?php echo base_url('caixa/fechamento');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-usd"></span> Fechamento
    </a>
    <a href="<?php echo base_url('caixa/lista');?>/<?php echo ($this->uri->segment(3) == 'e')?'s':'e';/*fl_caixa*/?>" class="btn btn-default">
      <span class="glyphicon glyphicon-tasks"></span> <?php echo ($this->uri->segment(3) == 'e')?'Saída':'Entrada';/*fl_caixa*/?>
    </a>
  </div>
  <?php include('statico/filtro_drop_view.php');?>
  <div class="clearfix"></div>
</form>

<h3>Lista de <?php echo $fl_caixa;?> de Caixa do mês <?php echo date("m/Y");?> Valor total: R$ <?php echo $vl_totalCaixa;?></h3>

<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Descrição <?php echo $fl_caixa;?></th>
        <th>Dt. <?php echo $fl_caixa;?></th>
        <th>Vl. <?php echo $fl_caixa;?></th>
        <th>Estorno</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->ds_caixa;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_caixa)));?></td>
        <td>R$ <?php echo number_format($row->vl_caixa,'2',',','.');?></td>
        <td>
          <a href="<?php echo base_url("caixa/estorno/".$row->cd_caixa.'/'.strtolower($row->fl_caixa));?>" title="Extornar Valor" class="confirma btn btn-primary">
            <span class="glyphicon glyphicon-ok"></span> Estornar
          </a>
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