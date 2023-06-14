<div class="btn-group">
  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
</div>
<h2>Cadastrar Usuário</h2>
<?php echo form_open('usuario/add','class="form-horizontal validar" role="form"');?>
    
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Perfil de usuário:</span></label>
    <div class="col-lg-2">
      <select name="cd_nivel"  class="perfil form-control" validation="validate[required]">
        <option value="">Selecione</option>
        <option value="1">ADMINISTRADOR</option>
        <option value="2">OPERADOR SENIOR</option>
        <option selected="selected" value="3">OPERADOR JUNIOR</option>
        <option value="4">USUÁRIO</option>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Nome Pessoal:</span></label>
    <div class="col-lg-3">
      <input type="text" name="nm_usuario" class="form-control" placeholder="Nome Pessoal" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Nome de Usuário:</span></label>
    <div class="col-lg-2">
      <input type="text" name="cd_usuario" class="alphanumeric form-control input-compare" id="usuario" placeholder="Nome de Usuário" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Senha:</span></label>
    <div class="col-lg-2">
      <input type="password" name="ds_senha" class="form-control" id="senha" placeholder="Senha de Acesso" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group conf_senha">
    <label class="col-lg-2 control-label"><span>Confirmar Senha:</span></label>
    <div class="col-lg-2">
      <input type="password" class="form-control" id="conf_senha" placeholder="Confirmar Senha de Acesso" validation="validate[required]">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Status:</label>
    
    <label class="radio-inline">
      <input type="radio" name="bo_ativo" value="A" validation="validate[required]" checked> Ativo:
    </label>
    
    <label class="radio-inline">
      <input type="radio" name="bo_ativo" value="I" validation="validate[required]"> Inativo:
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
            <li class="placeholder">Para Adicionar Um Estabelecimento Arraste o Aqui.</li>
          </ul>
        </div>
        <select name="cd_estab[]"  class="perfil form-control" id="dropSelect" style="display:none" multiple>
        </select>
      </div>
    </div>
  </fieldset>
  
  
  
  <hr>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_cadast-dt" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_empresa" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('usuario/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success senha dropSelect bottom_fly">
</form>