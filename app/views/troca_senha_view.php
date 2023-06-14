<a href="javascript:history.back(1)" ><span class="icon-hand-left"></span> Cancelar</a>
<?php echo $erro;?>
<?php echo form_open('trocarsenha/up_senha/'.$usuario['id'],'class="validar"'); ?>
  <fieldset>
	<legend><h1>Trocar Senha</h1></legend>  
	  <label class="label-h">
		<span>Senha antiga:</span>
		<input type="password" name="senha_antiga" validation="validate[required]" id="senha_antiga">
	  </label>
	  <label class="label-h">
		<span>Senha nova:</span>
		<input type="password" name="senha_nova" validation="validate[required]" id="nov_senha">
	  </label>
	  <label class="label-h confirmarSenha">
		<span>Confirmar senha:</span>
		<input type="password" name="senha_nova_conf" validation="validate[required]" id="conf_senha">
	  </label>
	  <p><input type="submit" name="logar" value="Trocar" class="btn troca_senha senha"></p>
  </fieldset>  
</form>
