<div class="btn-group">
  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
</div>
<h3>Inserir Novo Evento no Caixa</h3>
<?php echo form_open('caixa/add','class="form-horizontal validar" role="form"');?>
   
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_caixa-dt" class="form-control data" value="<?php echo date("d/m/Y");?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Tipo:</span></label>
    <div class="col-lg-2">
      <select name="fl_caixa" class="form-control" validation="validate[required]" validation="validate[required]">
        <option value="">Selecione</option>
        <option value="E">Entrada</option>
        <option value="S">Saida</option>
      </select>
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Descrição:</span></label>
    <div class="col-lg-3">
      <input type="text" name="ds_caixa" class="form-control" placeholder="Descrição do Serviço" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Valor:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_caixa-md" class="moeda form-control" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Evento:</span></label>
    <div class="col-lg-2">
      <?php echo form_dropdown('cd_evento',$eventos,'','class="form-control" id="ds_evento" validation="validate[required]"');?>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_estab" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usuario" value="<?php echo $this->usuario['id'];?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>
                            