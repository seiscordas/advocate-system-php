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