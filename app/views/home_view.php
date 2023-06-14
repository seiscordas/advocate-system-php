<div id="home">
  <ul class="menu-estilo">
    <li>
      <a href="<?php echo base_url('processo/lista/todos');?>" class="pedido-icon" title="Lista Juiz"><span>Processo</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('requerente/lista/');?>" class="boneco-azul-h-icon" title="Lista de Clientes Requerente"><span>Requerente</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('requerido/lista');?>" class="boneco-verm-h-icon" title="Lista de Requeridos"><span>Requerido</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('juiz/lista');?>" class="juiz-icon" title="Lista Juiz"><span>Juiz</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('evento/lista');?>" class="historico-icon" title="Lista de Eventos"><span>Evento</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('estab/lista/a');?>" class="estab-icon" title="Lista de Estabelecimentos"><span>Estab.</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('usuario/lista/a');?>" class="cliente-icon" title="Lista de Usuários Cadastrados"><span>Usuários</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('caixa/lista/e');?>" class="caixa-reg-icon" title="Lista de Parcelas a Receber"><span>Caixa</span></a>
    </li>
    <li>
      <a href="<?php echo base_url('receber/lista/');?>" class="receber-icon" title="Lista de Parcelas a Receber"><span>Receber</span></a>
    </li>
  </ul>
</div>
<div class="float-box alert alert-warning">
  <h3>Selecione um Espabelecimento</h3>
  <?php echo form_open('admin','class="form-horizontal validar" role="form"');?>
    <div class="col-lg-100">
      <select name="estab" class="form-control" validation="validate[required]">
        <option value="">Selecione</option>
		<?php foreach($estab as $row_estab):?>
        <option value="<?php echo $row_estab->cd_estab;?>"><?php echo $row_estab->nm_fantasia;?></option>
		<?php endforeach;?>
      </select>
    </div> 
    <input type="submit" value="Entrar" class="btn btn-success">
  <?php echo form_close();?>
</div>
<?php if(!$session_data['estab'])echo $estabBox;?>



