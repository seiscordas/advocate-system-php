<a href="javascript:history.back()" class="btn btn-default">
  <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
</a>
<h3>Editar Processo</h3>
<?php echo form_open('parcela/add/'.str_replace('/','-',$row->cd_processo).'/'.$row->cd_receber,'class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo $row->cd_processo;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Parcela:</span></label>
    <div class="col-lg-1">
      <input type="text" name="nr_parcela" class="form-control" value="<?php echo $row->nr_parcela;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Dt. Pagamento:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_pagamento-dt" class="data form-control" value="<?php echo date("d/m/Y");?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Valor Pago:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_pago-md" class="moeda form-control" value="<?php echo $row->vl_parcela;?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Evento:</span></label>
    <div class="col-lg-2">
      <?php echo form_dropdown('cd_evento',$eventos,1,'class="form-control" id="ds_evento" validation="validate[required]"');?>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="fl_pago" value="S">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success bottom_fly">
</form>