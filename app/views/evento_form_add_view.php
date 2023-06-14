  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Inserir Novo Evento</h3>
<?php echo form_open('evento/add','class="form-horizontal validar" role="form"');?>
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Descrição:</span></label>
    <div class="col-lg-3">
      <input type="text" name="ds_evento" class="form-control input-compare" id="ds_evento" placeholder="Descrição" validation="validate[required]">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">Tipo:</label>
    
    <label class="radio-inline">
      <input type="radio" name="fl_evento" value="C" validation="validate[required]" checked> Credito
    </label>
    
    <label class="radio-inline">
      <input type="radio" name="fl_evento" value="D" validation="validate[required]"> Debito
    </label>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_estab" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usuario" value="<?php echo $this->usuario['id'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('evento/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj input-compare bottom_fly">
</form>