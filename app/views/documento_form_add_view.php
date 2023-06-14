  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Inserir Novo Documento</h3>
<?php echo form_open('documento/add','class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-2">
      <input type="text" name="cd_processo" class="form-control" value="<?php echo str_replace('-','/',$this->uri->segment(3))/*fk_prcesso*/;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Nº do Documento:</span></label>
    <div class="col-lg-2">
      <input type="text" name="nr_documento" class="numeros form-control input-compare" id="nr_documento" placeholder="Nº do Document" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Tipo de Documento:</span></label>
    <div class="col-lg-2">
      <input type="text" name="ds_documento" class="form-control" placeholder="Tipo de Document" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Emissão:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_emissao-dt" class="data form-control" placeholder="Data de Emissão" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Vencimento:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_vencimento-dt" class="data form-control" placeholder="Data de Vencimento" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Valor:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_documento-md" class="moeda form-control" placeholder="Valor" validation="validate[required]">
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_estab" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usuario" value="<?php echo $this->usuario['id'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('documento/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>