  <a href="javascript:history.back()" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Conciliação</h3>
<?php echo form_open('conciliacao/conciliar/'.str_replace('/','-',$dadosProcesso->cd_processo),'class="form-horizontal validar" role="form"');?>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Auto:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo $dadosProcesso->cd_processo;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Total dos Documentos:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" id="totalDocs" value="<?php echo number_format($valDoc,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Total dos Juros:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo number_format($juros,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Total da Dívida:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo number_format($divida,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Honorários:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_honorarios" class="form-control" value="<?php echo number_format($honorario,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Custas da Câmara:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_custas" class="form-control" value="<?php echo number_format($custas,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Protocolo:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_protocolo" class="form-control" value="<?php echo number_format($protocolo,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Total Geral:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_divida" class="form-control" id="vl_divida" value="<?php echo number_format($total,'2',',','.');?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Desconto:</span></label>
    <div class="col-lg-2">
      <input type="text" name="vl_desconto" id="vl_desconto" class="moeda form-control" value="">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Sentença:</span></label>
    <div class="col-lg-5">
      <input type="text" name="ds_sentenca" class="form-control"  validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Pagamento:</label>
    
    <label class="radio-inline">
      <input type="radio" name="tipoPag" value="V" class="tipo-pag" validation="validate[required]"> Vista:
    </label>
    
    <label class="radio-inline">
      <input type="radio" name="tipoPag" value="P" class="tipo-pag" validation="validate[required]"> Prazo:
    </label>
  </div>  
  
  <div id="form-vista" style="display:none;">
    <hr>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Evento:</span></label>
      <div class="col-lg-2">
        <?php echo form_dropdown('cd_evento',$eventos,5,'class="form-control" id="ds_evento" validation="validate[required]" disabled');?>
      </div>
    </div>
  </div>
  
  <div id="form-prazo" style="display:none;">
    <hr>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Entrada:</span></label>
      <div class="col-lg-2">
        <input type="text" name="vl_entrada" id="vl_entrada" class="moeda form-control" disabled>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Evento:</span></label>
      <div class="col-lg-2">
        <?php echo form_dropdown('cd_evento',$eventos,3,'class="form-control" id="ds_evento" validation="validate[required]" disabled');?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Nº de Parcelas:</span></label>
      <div class="col-lg-1">
        <input type="text" name="qt_parcelas" class="numeros form-control"  validation="validate[required]" disabled>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Dia do Pagamento:</span></label>
      <div class="col-lg-1">
        <input type="text" name="dia_vencimento" class="mask-mes form-control" id="dia_vencimento" maxlength="2" validation="validate[required]" disabled>
      </div>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="dt_sentenca" value="<?php echo date("Y-m-d");?>">
  <!--hidden-->
  
  <input type="submit" value="Sentenciar" class="btn btn-success valida-cpf-cnpj input-compare bottom_fly">
</form>