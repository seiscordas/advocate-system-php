<a href="javascript:history.back(1)" class="btn btn-default">
  <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
</a>
<a href="<?php echo base_url('notificacao/form_add/'.$this->uri->segment(3))/*fk_prcesso*/;?>" class="btn btn-default">
  <span class="glyphicon glyphicon-plus"></span> Nova Notificacao
</a>
<h3>Lista de Notificacão</h3>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Auto</th>
        <th>Tipo</th>
        <th>Dt. Notificação</th>
        <th>Dt. Audiência</th>
        <th>Hora</th>
        <th>Notificador</th>
        <th>Impressão</th>
        <th>Vizualizar / Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_notificacao;?></td>
        <td><?php echo $row->cd_processo;?></td>
        <?php if($row->fl_notificacao == 'N'):?>
        <td>Notificação</td>
        <?php elseif($row->fl_notificacao == 'R'):?>
        <td>Renotificação</td>
        <?php elseif($row->fl_notificacao == 'T'):?>
        <td>Transferencia</td>
        <?php endif;?>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_notificacao)));?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_audiencia)));?></td>
        <td><?php echo $row->hr_audiencia;?></td>
        <td><?php echo $row->nm_notificador;?></td>
        <td>
          <a href="<?php echo base_url("notificacao/prepara_impressao/".$row->cd_notificacao);?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-print"></span> Impressão
          </a>
        </td>
        <td>
          <a href="<?php echo base_url("notificacao/form_up/".$row->cd_notificacao);?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
              <span class="glyphicon glyphicon-edit"></span> Editar
          </a>
        </td>
        <td>
          <a href="<?php echo base_url("notificacao/del/".$this->uri->segment(3)/*fk_prcesso*/.'/'.$row->cd_notificacao);?>" title="Editar" class="confirma btn btn-danger">
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