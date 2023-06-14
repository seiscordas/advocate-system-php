  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Inserir Novo juiz</h3>
<?php echo form_open('juiz/add','class="form-horizontal validar" role="form"');?>
  <fieldset>
    <legend>Documentos</legend>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Nome:</span></label>
        <div class="col-lg-3">
          <input type="text" name="nm_juiz" class="form-control" placeholder="Nome do juiz" validation="validate[required]">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Cpf:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_cpf" class="cpf form-control input-compare" id="cpf" placeholder="CPF do juiz" validation="validate[required]">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>RG:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_rg" class="numeros form-control" placeholder="RG do juiz" validation="validate[required]">
        </div>
      </div>
  </fieldset>
  
  <fieldset>
    <legend>Contato</legend>
        
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Telefone:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_telefone" class="form-control fone" placeholder="Telefone">
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
        <input type="text" name="ds_endereco" class="form-control" id="rua" placeholder="Rua" validation="validate[required]">
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
  
  <fieldset>
    <legend>Outras Informações</legend>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Estado Civil:</span></label>
      <div class="col-lg-2">
        <select name="ds_estcivil" class="form-control"  validation="validate[required]">
          <option value="">Selecione</option>
          <option value="Solteiro">Solteiro(a)</option>
          <option value="Casado">Casado(a)</option>
          <option value="Separado">Separado(a)</option>
          <option value="Divorciado">Divorciado(a)</option>
          <option value="Amigado">Amigado(a)</option>
          <option value="Viúvo">Viúvo(a)</option>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Formação:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_formacao" class="form-control" placeholder="Formação">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Digitador:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_digitador" class="form-control" placeholder="Digitador">
      </div>
    </div>
  </fieldset>
  
  <fieldset>
    <legend>Juiz Substituto</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Nome:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_nomesubs" class="form-control" placeholder="Nome do Juiz Substituto">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>RG:</span></label>
      <div class="col-lg-2">
        <input type="text" name="nr_rgsubs" class="form-control rg" placeholder="RG do Juiz Substituto">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Cidade:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_cidadesubs" class="form-control" placeholder="Cidade do Juiz Substituto">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Estado Civil:</span></label>
      <div class="col-lg-2">
        <select name="ds_estadocivsubs"  class="form-control" id="uf">
          <option value="">Selecione</option>
          <option value="Solteiro">Solteiro</option>
          <option value="Casado">Casado</option>
          <option value="Separado">Separado</option>
          <option value="Divorciado">Divorciado</option>
          <option value="Amigado">Amigado</option>
        </select>
      </div>
    </div>
  </fieldset>
  
  <hr>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" name="dt_cadastro-dt" class="form-control" value="<?php echo date("d/m/Y");?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" name="cd_estab" value="<?php echo $this->usuario['estab'];?>">
  <input type="hidden" name="cd_usuario" value="<?php echo $this->usuario['id'];?>">
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('juiz/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>
                            