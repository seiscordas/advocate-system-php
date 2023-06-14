  <a href="<?php echo base_url('receber/lista');?>" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
  <a href="<?php echo base_url('parcela/lista').'/'.$this->uri->segment(3)/*Codigo Processo*/;?>" class="btn btn-default">
    <span class="glyphicon glyphicon-list"></span> Ver Parcleas do Processo
  </a>

<h3>Lista de Parcelas Nº Auto: <?php echo str_replace('-','/',$this->uri->segment(3))/*Codigo Processo*/;?></h3>

<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Parcela</th>
        <th>Emissão</th>
        <th>Valor</th>
        <th>Dt. Vencimento</th>
        <th>Baixa</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_receber;?></td>
        <td><?php echo $row->nr_parcela;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_emissao)));?></td>
        <td>R$ <?php echo number_format($row->vl_camara,'2',',','.');?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_vencimento)));?></td>
        <td>
          <a href="<?php echo base_url("parcela/form_add/".$this->uri->segment(3)/*Codigo Processo*/.'/'.$row->cd_receber);?>" title="Dar Baixa na Parcela" class="btn btn-primary">
            <span class="glyphicon glyphicon-ok"></span> Baixa
          </a>
        </td>
    <?php endforeach;?>
    </tbody>
  </table>
  <div class="text-center">
    <ul class="pagination pagination-sm">
      <?php echo $paginacao;?>
    </ul>
  </div>
</div><!-- pg ajax-->