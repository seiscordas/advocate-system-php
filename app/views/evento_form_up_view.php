  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Editar Evento</h3>
<?php echo form_open('evento/up/'.$row->cd_evento,'class="form-horizontal validar" role="form"');?>
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Descrição:</span></label>
    <div class="col-lg-3">
      <input type="text" name="ds_evento" class="form-control" id="ds_evento" value="<?php echo $row->ds_evento;?>" validation="validate[required]">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">Tipo:</label>
    
    <label class="radio-inline">
      <input type="radio" name="fl_evento" value="C" validation="validate[required]" <?php echo ($row->fl_evento == 'C')?'checked':'';?>> Credito
    </label>
    
    <label class="radio-inline">
      <input type="radio" name="fl_evento" value="D" validation="validate[required]" <?php echo ($row->fl_evento == 'D')?'checked':'';?>> Debito
    </label>
  </div>
  
  <!--hidden-->
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('estab/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>