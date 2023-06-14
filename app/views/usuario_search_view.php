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