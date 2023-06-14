<form action="<?php echo base_url('documento/procura_documento');?>" class="form-ajax" role="form" method="post">
  <div class="pull-left">
    <a href="javascript:history.back(1)" class="btn btn-default">
      <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
    </a>
    <a href="<?php echo base_url('documento/form_add/'.$this->uri->segment(3))/*fk_prcesso*/;?>" class="btn btn-default">
      <span class="glyphicon glyphicon-plus"></span> Novo documento
    </a>
  </div>
  <div class="form-group col-lg-3 media-resp">
    <div class="input-group">
      <input name="termo" type="text" class="pesq_key_ajax form-control" placeholder="Procurar documento">
      <span class="input-group-btn">
        <input type="submit" name="procurar" value="Procurar" class="btn btn-default pesq_btn_ajax">
      </span>
    </div>  
  </div>
  <div class="clearfix"></div>
</form>
<h3>Lista de Documento</h3>
<div class="pg-ajax">
  <table class="tablesorter table table-striped">
    <thead>
      <tr>
        <th>Código</th>
        <th>Auto</th>
        <th>Númento</th>
        <th>Descrição</th>
        <th>Dt. Emissão</th>
        <th>Dt. Vencimento</th>
        <th>Valor</th>
        <th>Vizualizar / Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($dados as $row):?>
      <tr>
        <td><?php echo $row->cd_documento;?></td>
        <td><?php echo $row->cd_processo;?></td>
        <td><?php echo $row->nr_documento;?></td>
        <td><?php echo $row->ds_documento;?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_emissao)));?></td>
        <td><?php echo implode('/',array_reverse(explode('-',$row->dt_vencimento)));?></td>
        <td><?php echo number_format($row->vl_documento, 2, ',', '.');?></td>
        <td>
          <a href="<?php echo base_url("documento/form_up/".$row->cd_documento);?>" title="Editar" class="btn btn-primary">
              <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
              <span class="glyphicon glyphicon-edit"></span> Editar
          </a>
        </td>
        <td>
          <a href="<?php echo base_url("documento/del/".$this->uri->segment(3)/*fk_prcesso*/.'/'.$row->cd_documento);?>" title="Editar" class="confirma btn btn-danger">
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