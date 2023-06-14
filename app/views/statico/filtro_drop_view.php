<div class="accordion col-lg-3 media-resp">
  <h3>Filtro</h3>
  <div class="form-group h-overflow">
    <input name="dia" type="text" class="data form-control" placeholder="Por Data Específica">
    <select name="mes" class="form-control">
      <option value="">Por Mês</option>
      <?php for($i=1; $i<=12; $i++):?>
      <?php $opt = ($i <= 9)? 0 .$i : $i;?> 
      <option value="<?php echo $opt;?>"><?php echo $opt;?></option>
      <?php endfor;?>
    </select>
    <?php echo form_dropdown('ano',$dadosAnos,'','class="form-control"');?>
    <hr>
    <input name="procurarDe" type="text" class="data form-control" placeholder="Período de">
    <input name="procurarAte" type="text" class="data form-control" placeholder="Até">
    <hr>
    <button type="submit" class="btn btn-default accord-collapse">Procurar</button>
    <span class="close" title="Fechar">X</span>
  </div>
</div>