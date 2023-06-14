  <a href="<?php echo base_url('processo/lista/todos');?>" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
  <a href="<?php echo base_url('documento/lista/'.$cd_processo);?>" class="btn btn-success">
    <span class="glyphicon glyphicon-file"></span> Documento
  </a>
  <a href="<?php echo base_url('notificacao/lista/'.$cd_processo);?>" class="btn btn-success">
    <span class="glyphicon glyphicon-transfer"></span> Notificação
  </a>
  <a href="<?php echo base_url('conciliacao/form/'.$cd_processo);?>" class="btn btn-default" <?php echo ($row->fl_conciliado == 'N')?'':'disabled="disabled"';?>>
    <span class="glyphicon glyphicon-usd"></span> Conciliação
  </a>
  <a href="<?php echo base_url('parcela/lista/'.$cd_processo);?>" class="btn btn-success" <?php echo ($row->qt_parcelas > 0)?'':'disabled="disabled"';?>>
    <span class="glyphicon glyphicon-cog"></span> Parcelas
  </a>
  |
  <a href="<?php echo base_url('extrato/prepara_impressao/'.$cd_processo);?>" class="btn btn-success" <?php echo ($row->qt_parcelas > 0)?'':'disabled="disabled"';?>>
    <span class="glyphicon glyphicon-list-alt"></span> Extrato
  </a>
  <a href="<?php echo base_url('clausula/prepara_impressao/'.$cd_processo);?>" class="btn btn-success">
    <span class="glyphicon glyphicon-pencil"></span> Cláusula
  </a>
  <a href="<?php echo base_url('protocolo/prepara_impressao/'.$cd_processo);?>" class="btn btn-success">
    <span class="glyphicon glyphicon-book"></span> Protocolo
  </a>
  <a href="<?php echo base_url('compromisso/prepara_impressao/'.$cd_processo);?>" class="btn btn-success" <?php echo ($row->fl_conciliado == 'S')?'':'disabled="disabled"';?>>
    <span class="glyphicon glyphicon-link"></span> Compromisso
  </a>
  <a href="<?php echo base_url('sentenca/prepara_impressao/'.$cd_processo);?>" class="btn btn-success" <?php echo ($row->fl_conciliado == 'S')?'':'disabled="disabled"';?>>
    <span class="glyphicon glyphicon-check"></span> Sentença
  </a>
<h3>Editar Processo</h3>
<?php echo form_open('processo/up/'.$cd_processo,'class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-3">
      <input type="text" class="form-control" value="<?php echo $row->cd_processo;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Requerente:</span></label>
    <div class="col-lg-3">
      <input type="text" name="nm_requerente" class="form-control box_reque" id="nm_requerente" input="requerente" value="<?php echo $row->nm_requerente;?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Requerido:</span></label>
    <div class="col-lg-3">
      <input type="text" name="nm_requerido" class="form-control box_reque" id="nm_requerido" input="requerido" value="<?php echo $row->nm_requerido;?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Juiz:</span></label>
    <div class="col-lg-3">
      <select name="cd_juiz" class="form-control" validation="validate[required]">
        <option value="">Selecione</option>
		<?php foreach($dadosJuiz as $rowJuiz):?>
        <option value="<?php echo $rowJuiz->cd_juiz;?>" <?php echo ($rowJuiz->cd_juiz == $row->cd_juiz)?'selected':'';?>><?php echo $rowJuiz->nm_juiz;?></option>
        <?php endforeach;?>      
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Protocolo:</span></label>
    <div class="col-lg-3">
      <input type="text" name="vl_protocolo-md" class="moeda form-control" value="<?php echo $row->vl_protocolo;?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Litígio:</span></label>
    <div class="col-lg-3">
      <input type="text" name="ds_litigio" class="form-control" value="<?php echo $row->ds_litigio;?>" validation="validate[required]">
    </div>
  </div>
  
  <hr>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo implode('/',array_reverse(explode('-',$row->dt_sentenca)));?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_requerente" id="cd_requerente" value="<?php echo $row->cd_requerente;?>">
  <input type="hidden" name="cd_requerido" id="cd_requerido" value="<?php echo $row->cd_requerido;?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj input-compare bottom_fly">
</form>
<!-- reque -->
<div class="float-box panel" id="box_reque">
  <button type="button" class="close fechar">
    <span class="glyphicon glyphicon-remove"></span>
  </button>
  <p class="reque-title"></p>
  <form id="box-form" action="" class="form-ajax" role="form" method="post">
    <div class="form-group col-lg-100">
      <div class="">
        <input name="termo" type="text" id="box-termo" class="pesq_key_ajax form-control" value="Procurar processo">
      </div>  
    </div>
    <div class="clear"></div>
  </form>
  <div class="pg-ajax"></div>
</div>