  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Inserir Novo Estabelecimento</h3>
<?php echo form_open('estab/add','class="form-horizontal validar" role="form"');?>
  <fieldset>
    <legend>Documentos</legend>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Razão Social:</span></label>
        <div class="col-lg-3">
          <input type="text" name="nm_razao" class="form-control input-compare" id="razao" placeholder="Razão Social" validation="validate[required]">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Nome Fantasia:</span></label>
        <div class="col-lg-3">
          <input type="text" name="nm_fantasia" class="form-control" placeholder="Nome Fantasia" validation="validate[required]">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Cnpj:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_cnpj" class="cnpj input-compare form-control" id="cnpj" placeholder="Cnpj do Requerente" validation="validate[required]">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>IE:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_inscest" class="form-control numeros" placeholder="Inscrição Estadual">
        </div>
      </div>
  </fieldset>
  
  <fieldset>
    <legend>Contato</legend>
        
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Telefone:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_telef1" class="form-control fone" placeholder="Telefone">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Fax:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_fax" class="form-control fone" placeholder="Telefone">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Celular:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_celular" class="form-control fone" placeholder="Celular">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>E-mail:</span></label>
      <div class="col-lg-2">
        <input type="email" name="ds_email" class="form-control" placeholder="E-mail" validation="validate[custom[email]]">
      </div>
    </div>
  </fieldset>
  
  <fieldset>
    <legend>Endereço</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Cep:</span></label>
      <div class="input-group col-lg-3">
        <input type="text" name="nr_cep" class="cep form-control" id="cep" placeholder="Cep" validation="validate[required]">
        <span class="input-group-btn">
          <button type="button" class="btn btn-default verifica-cep">
            <span class="glyphicon glyphicon-search loadding-search"></span> Verificar Cep
          </button>
        </span>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Endereço:</span></label>
      <div class="col-lg-4">
        <input type="text" name="ds_ender" class="form-control" id="rua" placeholder="Rua" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Número:</span></label>
      <div class="col-lg-2">
        <input type="text" name="nr_numero" class="form-control numeros" id="numero" placeholder="Número" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Complemento:</span></label>
      <div class="col-lg-4">
        <input type="text" name="ds_complemento" class="form-control" placeholder="Prédio, Nº Apartamento ou Proximidade">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Bairro:</span></label>
      <div class="col-lg-4">
        <input type="text" name="ds_bairro" class="form-control" id="bairro" placeholder="Bairro" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Cidade:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_cidade" class="form-control" id="cidade" placeholder="Cidade" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Estado:</span></label>
      <div class="col-lg-2">
        <select name="fl_estado" class="form-control" id="uf"  validation="validate[required]">
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option selected="selected" value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
      </div>
    </div> 
  </fieldset>
  <hr>
  <div class="form-group">
    <label class="col-lg-2 control-label">Matriz:</label>
    
    <label class="radio-inline">
      <input type="radio" name="bo_matriz" value="S" validation="validate[required]"> Sim:
    </label>
    
    <label class="radio-inline">
      <input type="radio" name="bo_matriz" value="N" validation="validate[required]"> Não:
    </label>
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
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_cadast-dt" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_empresa" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usucont" value="<?php echo $this->usuario['id'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('estab/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>
                            