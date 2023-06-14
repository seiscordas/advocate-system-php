  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Inserir Nova Notificacao</h3>
<?php echo form_open('notificacao/add','class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-2">
      <input type="text" name="cd_processo" class="form-control" value="<?php echo str_replace('-','/',$this->uri->segment(3))/*fk_prcesso*/;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Tipo:</span></label>
    <div class="col-lg-2">
      <select name="fl_notificacao" class="form-control" validation="validate[required]">
        <option value="N">Notificação</option>
        <option value="R">Renotificação</option>
        <option value="T">Tranferência</option>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data da Notificação:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_notificacao-dt" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data da Audiência:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_audiencia-dt" class="data form-control" placeholder="Data da Audiência" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Hora da Audiência:</span></label>
    <div class="col-lg-2">
      <input type="text" name="hr_audiencia" class="hora form-control" placeholder="Hora da Audiência" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Notificador:</span></label>
    <div class="col-lg-2">
      <input type="text" name="nm_notificador" class="form-control" placeholder="Nome do Notificador" validation="validate[required]">
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_estab" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usuario" value="<?php echo $this->usuario['id'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('notificacao/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>