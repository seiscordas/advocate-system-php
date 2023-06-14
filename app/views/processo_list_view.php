<form action="<?php echo base_url('processo/procura_processo/'.$this->uri->segment(3));?>" class="form-ajax" role="form" method="post">
  <div class="pull-left">
    <a href="<?php echo base_url('admin');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
    <a href="<?php echo base_url('processo/form_add');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Novo processo
    </a>
    Filtrar Processo:
    <a href="<?php echo base_url('processo/lista/andamento');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-list"></span> Andamento
    </a>
    <a href="<?php echo base_url('processo/lista/conciliado');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-list"></span> Conciliado
    </a>
    <a href="<?php echo base_url('processo/lista/todos');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-list"></span> Todos
    </a>
  </div>
  <div class="accordion col-lg-3 media-resp">
    <h3>Filtro</h3>
    <div class="form-group h-overflow">
      <input name="termo_rqt" type="text" class="form-control" placeholder="Procurar Por Requerente">
      <input name="termo_rqd" type="text" class="form-control" placeholder="Procurar Por Requerido">
      <input name="termo_auto" type="text" class="form-control" placeholder="Procurar Por Auto">
      <button type="submit" class="btn btn-default pesq_btn_ajax accord-collapse">Procurar</button>
      <span class="close">X</span>
    </div>
  </div>
  <div class="clearfix"></div>
</form>

<?php if($this->uri->segment(3) == 'todos'):?>
<h3>Lista de Todos os Processo</h3>
<?php elseif($this->uri->segment(3) == 'andamento'):?>
<h3>Lista de Processo em Andamento</h3>
<?php else:?>
<h3>Lista de Processo em Conciliado</h3>
<?php endif;?>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Situação</th>
        <th>Requerente</th>
        <th>Requerido</th>
        <th>Vizualizar / Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td ><?php echo $row->cd_processo;?></td>
        <td><?php echo ($row->fl_conciliado == 'N')?'<span class="label label-warning">Andamento</span>':'<span class="label label-success">Conciliado</span>';?></td>
        <td><?php echo $row->nm_requerente;?></td>
        <td><?php echo $row->nm_requerido;?></td>
        <td>
          <a href="<?php echo base_url("processo/form_up/".str_replace('/','-',$row->cd_processo));?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
              <span class="glyphicon glyphicon-edit"></span> Editar
          </a>
        </td>
        <td>
          <a href="<?php echo base_url("processo/del/".str_replace('/','-',$row->cd_processo));?>" title="Editar" class="confirma btn btn-danger">
              <span class="glyphicon glyphicon-trash"></span> Excluir
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