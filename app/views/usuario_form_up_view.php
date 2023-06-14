<div class="btn-group">
  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
</div>
<h2>Cadastrar Usuário</h2>
<?php echo form_open('usuario/up/'.$usuario->cd_usuario,'class="form-horizontal validar" role="form"');?>
    
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Perfil de usuário:</span></label>
    <div class="col-lg-2">
      <select name="cd_nivel"  class="perfil form-control" validation="validate[required]">
        <option value="1" <?php if($usuario->cd_nivel == 1)echo "selected";?>>ADMINISTRADOR</option>
        <option value="2" <?php if($usuario->cd_nivel == 2)echo "selected";?>>USUÁRIO</option>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Nome Pessoal:</span></label>
    <div class="col-lg-3">
      <input type="text" name="nm_usuario" class="form-control" value="<?php echo $usuario->nm_usuario;?>" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Nome de Usuário:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" id="usuario" value="<?php echo $usuario->cd_usuario;?>" readonly>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Senha:</span></label>
    <div class="col-lg-2">
      <input type="password" name="ds_senha" class="form-control" id="senha" placeholder="Senha de Acesso">
    </div>
  </div>
  
  <div class="form-group conf_senha">
    <label class="col-lg-2 control-label"><span>Confirmar Senha:</span></label>
    <div class="col-lg-2">
      <input type="password" class="form-control" id="conf_senha" placeholder="Confirmar Senha de Acesso">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Status:</label>
    
    <label class="radio-inline">
      <input type="radio" name="bo_ativo" value="A" validation="validate[required]" <?php if($usuario->bo_ativo == 'A')echo "checked";?>> Ativo:
    </label>
    
    <label class="radio-inline">
      <input type="radio" name="bo_ativo" value="I" validation="validate[required]" <?php if($usuario->bo_ativo == 'I')echo "checked";?>> Inativo:
    </label>
  </div>  
  
  <fieldset>
    <legend>Estabelecimento</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Cadastrados:</span></label>
      <div class="col-lg-3">
        <div class="panel panel-default">
          <ul id="drag" class="drop panel-body list-unstyled" title="Para Remover Um Estabelecimento Arraste o Aqui.">
            <?php foreach($estab as $row_estab):?>
            <li value="<?php echo $row_estab->cd_estab;?>"><?php echo $row_estab->nm_razao;?></li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Liberar p/ Usuário:</span></label>
      <div class="col-lg-3">
        <div class="panel panel-default">
          <ul id="drop" class="drop panel-body list-unstyled" title="Para Adicionar Um Estabelecimento Arraste o Aqui.">
			<?php foreach($usuestab as $row_usuestab):?>
              <li value="<?php echo $row_usuestab->cd_estab;?>"><?php echo $row_usuestab->nm_razao;?></li>
            <?php endforeach;?>
          </ul>
        </div>
        <select name="cd_estab[]"  class="perfil form-control" id="dropSelect" style="display:none" multiple>
          <?php foreach($usuestab as $row_usuestab):?>
          <option value="<?php echo $row_usuestab->cd_estab;?>" selected><?php echo $row_usuestab->nm_razao;?></option>
          <?php endforeach;?>
        </select>
      </div>
    </div>
  </fieldset>
  
  <hr>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_empresa" value="<?php echo $usuario->id_empresa;?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('usuario/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success senha dropSelect bottom_fly">
</form>