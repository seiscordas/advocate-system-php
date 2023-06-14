<form action="<?php echo base_url('usuario/procura_usuario/');?>" class="form-ajax" role="form" method="post">
  <div class="pull-left">
  <a href="<?php echo base_url('admin');?>" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
  <a href="<?php echo base_url('usuario/form_add');?>" class="btn btn-default">
    <span class="glyphicon glyphicon-plus"></span> Novo Usuário
  </a>
  <?php if($this->uri->segment(3) == 'a'):?>
  <a href="<?php echo base_url('usuario/lista/i');?>" class="btn btn-default">
    <span class="glyphicon glyphicon-list"></span> Usuários Inativos
  </a>
  <?php else:?>
  <a href="<?php echo base_url('usuario/lista/a');?>" class="btn btn-default">
    <span class="glyphicon glyphicon-list"></span> Usuários Ativos
  </a>
  <?php endif;?>
</div>
  <div class="form-group col-lg-3 media-resp">
    <!--hidden-->
    <input name="bo_ativo" type="hidden" value="<?php echo $this->uri->segment(3)/*bo_ativo*/;?>">
    <!--hidden-->
    <div class="input-group">
      <input name="termo" type="text" class="pesq_key_ajax form-control" placeholder="Procurar usuario">
      <span class="input-group-btn">
        <input type="submit" name="procurar" value="Procurar" class="btn btn-default pesq_btn_ajax">
      </span>
    </div>  
  </div>
  <div class="clearfix"></div>
</form>

<h3>Lista de usuario  <?php echo ($this->uri->segment(3) == 'a')?'Ativo':'Inativo';/*bo_ativo*/?></h3>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Usuário</th>
        <th>Vizualizar / Editar</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_usuario;?></td>
        <td><?php echo $row->nm_usuario;?></td>
        <td>
          <a href="<?php echo base_url("usuario/form_up/".$row->cd_usuario);?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
              <span class="glyphicon glyphicon-edit"></span> Editar
          </a>
        </td>
        <td>
          <a href="<?php echo base_url("usuario/status/".$row->cd_usuario);?>" title="Editar" class="<?php echo ($row->bo_ativo == 'I')?'':'status-conf';?> btn btn-warning">
              <span class="glyphicon glyphicon-<?php echo ($row->bo_ativo == 'I')?'ok-circle':'remove-circle';?>"></span> <?php echo ($row->bo_ativo == 'I')?'Ativar':'Desativar';?>
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