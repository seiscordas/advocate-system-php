<form action="<?php echo base_url('estab/procura_estab');?>" class="form-ajax" role="form" method="post">
  <div class="pull-left">
    <a href="<?php echo base_url('admin');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
    <a href="<?php echo base_url('estab/form_add');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Novo Estabelecimento
    </a>
  
    <?php if($this->uri->segment(3) == 'a'):?>
    <a href="<?php echo base_url('estab/lista/i');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-list"></span> Estab. Inativos
    </a>
    <?php else:?>
    <a href="<?php echo base_url('estab/lista/a');?>" class="btn btn-default">
      <span class="glyphicon glyphicon-list"></span> Estab. Ativos
    </a>
    <?php endif;?>
  </div>
  <div class="form-group col-lg-3 media-resp">
    <!--hidden-->
    <input name="bo_ativo" class="media-resp" type="hidden" value="<?php echo $this->uri->segment(3)/*bo_ativo*/;?>">
    <!--hidden-->
    <div class="input-group">
      <input name="termo" type="text" class="pesq_key_ajax form-control" placeholder="Procurar estab">
      <span class="input-group-btn">
        <input type="submit" name="procurar" value="Procurar" class="btn btn-default pesq_btn_ajax">
      </span>
    </div>  
  </div>
  <div class="clearfix"></div>
</form>

<h3>Lista de Estabelecimento <?php echo ($this->uri->segment(3) == 'a')?'Ativo':'Inativo';/*bo_ativo*/?></h3>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Estabelecimento</th>
        <th>Vizualizar / Editar</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_estab;?></td>
        <td><?php echo $row->nm_razao;?></td>
        <td>
          <a href="<?php echo base_url("estab/form_up/".$row->cd_estab);?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
              <span class="glyphicon glyphicon-edit"></span> Editar
          </a>
        </td>
        <td>
        <?php if($row->cd_estab != 1):?>
          <a href="<?php echo base_url("estab/status/".$row->cd_estab);?>" title="Editar" class="<?php echo ($row->bo_ativo == 'I')?'':'status-conf';?> btn btn-warning">
              <span class="glyphicon glyphicon-<?php echo ($row->bo_ativo == 'I')?'ok-circle':'remove-circle';?>"></span> <?php echo ($row->bo_ativo == 'I')?'Ativar':'Desativar';?>
          </a>
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