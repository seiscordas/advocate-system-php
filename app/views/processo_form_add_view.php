<a href="javascript:history.back(1)" class="btn btn-default">
  <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
</a>
<h3>Inserir Novo Processo</h3>
<?php echo form_open('processo/add','class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-3">
      <input type="text" name="cd_processo" class="anos form-control input-compare" id="cd_processo" placeholder="Auto" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Requerente:</span></label>
    <div class="col-lg-3">
      <input type="text" name="nm_requerente" class="form-control box_reque" id="nm_requerente" input="requerente" placeholder="Clique para selsecionar Requerente" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Requerido:</span></label>
    <div class="col-lg-3">
      <input type="text" name="nm_requerido" class="form-control box_reque" id="nm_requerido" input="requerido" placeholder="Clique para selsecionar Requerido" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Juiz:</span></label>
    <div class="col-lg-3">
      <select name="cd_juiz" class="form-control" validation="validate[required]">
        <option value="">Selecione</option>
		<?php foreach($dadosJuiz as $rowJuiz):?>
        <option value="<?php echo $rowJuiz->cd_juiz;?>"><?php echo $rowJuiz->nm_juiz;?></option>
        <?php endforeach;?>      
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Protocolo:</span></label>
    <div class="col-lg-3">
      <input type="text" name="vl_protocolo-md" class="moeda form-control" placeholder="Protocolo" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Litígio:</span></label>
    <div class="col-lg-3">
      <input type="text" name="ds_litigio" class="form-control" placeholder="Litígio" validation="validate[required]">
    </div>
  </div>
  
  <hr>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_sentenca-dt" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_requerente" id="cd_requerente">
  <input type="hidden" name="cd_requerido" id="cd_requerido">
  <input type="hidden" name="fl_conciliado" value="N">
  <input type="hidden" name="cd_estab" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usuario" value="<?php echo $this->usuario['id'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('processo/verifica_registro');?>">
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
        <input name="termo" type="text" id="box-termo" class="pesq_key_ajax form-control" placeholder="Procurar processo">
      </div>  
    </div>
    <div class="clear"></div>
  </form>
  <div class="pg-ajax"></div>
</div>