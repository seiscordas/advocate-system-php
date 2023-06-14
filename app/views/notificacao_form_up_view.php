  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Inserir Nova Notificacao</h3>
<?php echo form_open('notificacao/up/'.$row->cd_notificacao,'class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-2">
      <input type="text" name="cd_processo-no" class="form-control" value="<?php echo $row->cd_processo;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Tipo:</span></label>
    <div class="col-lg-2">
      <select name="fl_notificacao" class="form-control" validation="validate[required]">
        <option value="N" <?php echo ($row->fl_notificacao == 'N')?'selected':'';?>>Notificação</option>
        <option value="R" <?php echo ($row->fl_notificacao == 'R')?'selected':'';?>>Renotificação</option>
        <option value="T" <?php echo ($row->fl_notificacao == 'T')?'selected':'';?>>Tranferência</option>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data da Notificação:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_notificacao-dt" class="form-control" value="<?php echo implode('/',array_reverse(explode('-',$row->dt_notificacao)));?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data da Audiência:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_audiencia-dt" class="data form-control" value="<?php echo implode('/',array_reverse(explode('-',$row->dt_audiencia)));?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Hora da Audiência:</span></label>
    <div class="col-lg-2">
      <input type="text" name="hr_audiencia" class="hora form-control" value="<?php echo $row->hr_audiencia;?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Notificador:</span></label>
    <div class="col-lg-2">
      <input type="text" name="nm_notificador" class="form-control" value="<?php echo $row->nm_notificador;?>" validation="validate[required]">
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('notificacao/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>