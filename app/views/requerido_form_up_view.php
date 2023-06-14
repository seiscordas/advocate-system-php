  <a href="javascript:history.back(1)" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
<h3>Vizualizar ou Alterar dados Requerido</h3>
<?php echo form_open('requerido/up/'.$row->cd_requerido,'class="form-horizontal validar" role="form"');?>
  <!-- tipo de pessoa-->
  <fieldset>
    <legend>Documento</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Tipo Pessoa:</span></label>
      <div class="col-lg-2">
        <input type="text" class="form-control" value="<?php echo ($row->fl_pessoa == 'F')?'Física':'Jurídica';?>" readonly>
      </div>
    </div>
    
    <?php if($row->fl_pessoa == 'F'):?>
    
    <div class="pes-fisica">
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Nome:</span></label>
        <div class="col-lg-3">
          <input type="text" name="nm_requerido" class="form-control" value="<?php echo $row->nm_requerido;?>" validation="validate[required]">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Cpf:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_cpf" class="cpf form-control input-compare" id="cpf" value="<?php echo $row->nr_cpf;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>RG:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_rg" class="numeros form-control" value="<?php echo $row->nr_rg;?>">
        </div>
      </div>
    </div>
    
    <?php else:?>
    
    <div class="pes-juridica">
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Razão Social:</span></label>
        <div class="col-lg-3">
          <input type="text" name="nm_requerido" class="form-control" value="<?php echo $row->nm_requerido;?>" validation="validate[required]">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Nome Fantasia:</span></label>
        <div class="col-lg-3">
          <input type="text" name="nm_fantasia" class="form-control" value="<?php echo $row->nm_fantasia;?>" validation="validate[required]">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>Cnpj:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_cpf" class="cnpj  form-control input-compare" id="cnpj" value="<?php echo $row->nr_cpf;?>" validation="validate[required]">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-lg-2 control-label"><span>IE:</span></label>
        <div class="col-lg-2">
          <input type="text" name="nr_rg" class="form-control numeros" value="<?php echo $row->nr_rg;?>">
        </div>
      </div>
    </div>
    
    <?php endif;?>
  </fieldset>
  
  <fieldset>
    <legend>Contato</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>E-mail:</span></label>
      <div class="col-lg-2">
        <input type="email" name="ds_email" class="form-control" value="<?php echo $row->ds_email;?>" validation="validate[custom[email]]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Telefone:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_telefone" class="form-control fone" value="<?php echo $row->nr_telefone;?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Fax:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_fax" class="form-control fone" value="<?php echo $row->nr_fax;?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Celular:</span></label>
      <div class="col-lg-2">
        <input type="tel" name="nr_celular" class="form-control fone" value="<?php echo $row->nr_celular;?>">
      </div>
    </div>
  </fieldset>
  
  <fieldset>
    <legend>Endereço</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Cep:</span></label>
      <div class="input-group col-lg-3">
        <input type="text" name="nr_cep" class="cep form-control" id="cep" value="<?php echo $row->nr_cep;?>" validation="validate[required]">
        <span class="input-group-btn">
          <button type="button" class="btn btn-default verifica-cep">
            <span class="glyphicon glyphicon-search  loadding-search"></span> Verificar Cep
          </button>
        </span>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Endereço:</span></label>
      <div class="col-lg-4">
        <input type="text" name="ds_endereco" class="form-control" id="rua" value="<?php echo $row->ds_endereco;?>" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Número:</span></label>
      <div class="col-lg-2">
        <input type="text" name="nr_numero" class="numeros form-control" id="numero" value="<?php echo $row->nr_numero;?>" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Complemento:</span></label>
      <div class="col-lg-4">
        <input type="text" name="ds_complemento" class="form-control" value="<?php echo $row->ds_complemento;?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Bairro:</span></label>
      <div class="col-lg-4">
        <input type="text" name="ds_bairro" class="form-control" id="bairro" value="<?php echo $row->ds_bairro;?>" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Cidade:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_cidade" class="form-control" id="cidade" value="<?php echo $row->ds_cidade;?>" validation="validate[required]">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Estado:</span></label>
      <div class="col-lg-2">
        <select name="fl_estado" class="form-control" id="uf" validation="validate[required]">
          <option value="AC" <?php echo ($row->fl_estado == 'AC')?'selected':'';?>>Acre</option>
          <option value="AL" <?php echo ($row->fl_estado == 'AL')?'selected':'';?>>Alagoas</option>
          <option value="AP" <?php echo ($row->fl_estado == 'AP')?'selected':'';?>>Amapá</option>
          <option value="AM" <?php echo ($row->fl_estado == 'AM')?'selected':'';?>>Amazonas</option>
          <option value="BA" <?php echo ($row->fl_estado == 'BA')?'selected':'';?>>Bahia</option>
          <option value="CE" <?php echo ($row->fl_estado == 'CE')?'selected':'';?>>Ceará</option>
          <option value="DF" <?php echo ($row->fl_estado == 'DF')?'selected':'';?>>Distrito Federal</option>
          <option value="ES" <?php echo ($row->fl_estado == 'ES')?'selected':'';?>>Espírito Santo</option>
          <option value="GO" <?php echo ($row->fl_estado == 'GO')?'selected':'';?>>Goiás</option>
          <option value="MA" <?php echo ($row->fl_estado == 'MA')?'selected':'';?>>Maranhão</option>
          <option value="MT" <?php echo ($row->fl_estado == 'MT')?'selected':'';?>>Mato Grosso</option>
          <option value="MS" <?php echo ($row->fl_estado == 'MS')?'selected':'';?>>Mato Grosso do Sul</option>
          <option value="MG" <?php echo ($row->fl_estado == 'MG')?'selected':'';?>>Minas Gerais</option>
          <option value="PA" <?php echo ($row->fl_estado == 'PA')?'selected':'';?>>Pará</option>
          <option value="PB" <?php echo ($row->fl_estado == 'PB')?'selected':'';?>>Paraíba</option>
          <option value="PR" <?php echo ($row->fl_estado == 'PR')?'selected':'';?>>Paraná</option>
          <option value="PE" <?php echo ($row->fl_estado == 'PE')?'selected':'';?>>Pernambuco</option>
          <option value="PI" <?php echo ($row->fl_estado == 'PI')?'selected':'';?>>Piauí</option>
          <option value="RJ" <?php echo ($row->fl_estado == 'RJ')?'selected':'';?>>Rio de Janeiro</option>
          <option value="RN" <?php echo ($row->fl_estado == 'RN')?'selected':'';?>>Rio Grande do Norte</option>
          <option value="RS" <?php echo ($row->fl_estado == 'RS')?'selected':'';?>>Rio Grande do Sul</option>
          <option value="RO" <?php echo ($row->fl_estado == 'RO')?'selected':'';?>>Rondônia</option>
          <option value="RR" <?php echo ($row->fl_estado == 'RR')?'selected':'';?>>Roraima</option>
          <option value="SC" <?php echo ($row->fl_estado == 'SC')?'selected':'';?>>Santa Catarina</option>
          <option value="SP" <?php echo ($row->fl_estado == 'SP')?'selected':'';?>>São Paulo</option>
          <option value="SE" <?php echo ($row->fl_estado == 'SE')?'selected':'';?>>Sergipe</option>
          <option value="TO" <?php echo ($row->fl_estado == 'TO')?'selected':'';?>>Tocantins</option>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Endereço Coml.:</span></label>
      <div class="col-lg-2">
        <input type="text" name="ds_endcoml" class="form-control" value="<?php echo $row->ds_endcoml;?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Local Trabalho:</span></label>
      <div class="col-lg-2">
        <input type="text" name="nm_trabalho" class="form-control" value="<?php echo $row->nm_trabalho;?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-2 control-label"><span>Fone Coml.:</span></label>
      <div class="col-lg-2">
        <input type="text" name="nr_fonecoml" class="form-control" value="<?php echo $row->nr_fonecoml;?>">
      </div>
    </div>
  </fieldset>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Responsavel:</span></label>
    <div class="col-lg-2">
      <input type="text" name="nm_responsavel" class="form-control" value="<?php echo $row->nm_responsavel;?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Procurador:</span></label>
    <div class="col-lg-2">
      <input type="text" name="nm_procurador" class="form-control" value="<?php echo $row->nm_procurador;?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label"><span>Data de Cadastro:</span></label>
    <div class="col-lg-2">
      <input type="text" class="form-control" value="<?php echo implode('/',array_reverse(explode('-',$row->dt_cadastro)));?>" readonly>
    </div>
  </div>
  
  <!--hidden-->
  <input type="hidden" class="input-compare-pg" value="<?php echo base_url('requerido/verifica_registro');?>">
  <!--hidden-->
  
  <input type="submit" value="Gravar" class="btn btn-success valida-cpf-cnpj bottom_fly">
</form>
                            