<form action="<?php echo base_url('evento/procura_evento');?>" class="form-ajax" role="form" method="post">
  <div class="pull-left">
    <a href="<?php echo base_url('admin');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
    <a href="<?php echo base_url('evento/form_add');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Novo evento
    </a>  
  </div>
  <div class="form-group col-lg-3 media-resp">
    <!--hidden-->
    <input name="bo_ativo" type="hidden" value="<?php echo $this->uri->segment(3)/*bo_ativo*/;?>">
    <!--hidden-->
    <div class="input-group">
      <input name="termo" type="text" class="pesq_key_ajax form-control" placeholder="Procurar evento">
      <span class="input-group-btn">
        <input type="submit" name="procurar" value="Procurar" class="btn btn-default pesq_btn_ajax">
      </span>
    </div>  
  </div>
  <div class="clearfix"></div>
</form>
<h3>Lista de Eventos</h3>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Descrição do Evento</th>
        <th>Vizualizar / Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_evento;?></td>
        <td><?php echo $row->ds_evento;?></td>
        <td>
          <a href="<?php echo base_url("evento/form_up/".$row->cd_evento);?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
              <span class="glyphicon glyphicon-edit"></span> Editar
          </a>
        </td>
        <td>
          <a href="<?php echo base_url("evento/del/".$row->cd_evento);?>" title="Editar" class="status-conf btn btn-danger">
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