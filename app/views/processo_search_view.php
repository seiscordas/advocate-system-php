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