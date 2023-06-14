<div class="texto">
<table class="table table-borda">
  <thead>
    <tr>
      <th colspan="3">
        <p class="center">LEI FEDERAL 9.307/96</p>
        <h3 class="center">PROTOCOLO DE INFORMAÇÕES PARA NOTIFICAÇÃO</h3>
      </th>
    </tr>
  </thead>
  <tbody>
    <!-- dados requerente -->
    <tr>
      <td colspan="2"><p>1 - Protocolo nº..: <strong><?php echo $row->cd_processo;?></strong></p></td>
      <td><p>Auto nº.: <strong><?php echo $row->cd_processo;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>2 - Requerente..: <strong><?php echo $row->nm_requerente;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Nome Fantasia.: <strong><?php echo $row->rqt_fantasia;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Endereço...........: <strong><?php echo $row->rqt_rua.' Nº '.$row->rqt_numero;?></strong></p></td>
    </tr>
    <tr>
      <td><p>Cep.....................: <strong><?php echo $row->rqt_cep;?></strong></p></td>
      <td><p>Telefone.: <strong><?php echo $row->rqt_telefone;?></strong></p></td>
      <td><p>Estado.: <strong><?php echo $row->rqt_estado;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Cidade...............: <strong><?php echo $row->rqt_cidade;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="2"><p>RG/Inscrição.....: <strong><?php echo $row->rqt_rg;?></strong></p></td>
      <td><p>CPF/CNPJ.: <strong><?php echo $row->rqt_cpf;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Atividade............: <strong><?php echo $row->rqt_atividade;?></strong></p></td>
    </tr>
    <!-- dados requerido -->
    <tr>
      <td colspan="3"><p>2 - Requerido...: <strong><?php echo $row->nm_requerido;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Nome Fantasia.: <strong><?php echo $row->rqd_fantasia;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Endereço...........: <strong><?php echo $row->rqd_rua.' Nº '.$row->rqd_numero;?></strong></p></td>
    </tr>
    <tr>
      <td><p>Cep.....................: <strong><?php echo $row->rqd_cep;?></strong></p></td>
      <td><p>Telefone.: <strong><?php echo $row->rqd_telefone;?></strong></p></td>
      <td><p>Estado.: <strong><?php echo $row->rqd_estado;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Cidade...............: <strong><?php echo $row->rqd_cidade;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="2"><p>RG/Inscrição.....: <strong><?php echo $row->rqd_rg;?></strong></p></td>
      <td><p>CPF/CNPJ.: <strong><?php echo $row->rqd_cpf;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>Procurador.........: <strong><?php echo $row->rqd_procurador;?></strong></p></td>
    </tr>
    <tr>
      <td colspan="3"><p>4 - Tipo Litígio...: <strong><?php echo $row->ds_litigio;?></strong></p></td>
    </tr>
    </table>
    <div class="div-table bord-right bord-left">
      <p>5 - Relação de Documentos Entregues e Valor da Dívida:</p>
      <table class="table table-zebra table-sem-borda">
        <thead>
          <tr>
            <th class="txt-left">Documento</th>
            <th class="txt-left">Número</th>
            <th class="txt-left">Emissão</th>
            <th class="txt-left">Vencimento</th>
            <th class="txt-left">Valor</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($dadosDoc as $rowDoc):?>
          <?php $i += 1;?>
          <tr>
            <td><p><?php echo $rowDoc->ds_documento;?></p></td>
            <td><p><?php echo $rowDoc->nr_documento;?></p></td>
            <td><p><?php echo $rowDoc->dt_emissao;?></p></td>
            <td><p><?php echo $rowDoc->dt_vencimento;?></p></td>
            <td><p>R$ <?php echo $rowDoc->vl_documento;?></p></td>
          </tr>
          <?php endforeach;?>
          <tr>
            <td><p><strong>Total dos Documentos</strong></p></td>
            <td></td>
            <td></td>
            <td></td>
            <td><p><strong>R$ <?php echo $vl_totalDoc;?></strong></p></td>
          </tr>
        </tbody>
      </table>
    </div>
    <table class="table table-borda">
    <tr>
      <td colspan="3">
        <p>6 - Comparecendo o(a) Requerido(a) antes da audiência para quitar seu DÉBITO com o(a) Requerente, este autoriza a <strong><?php echo $row->nm_fantasia.' ( '. $row->estab_estado.' )';?></strong>, a receber o pagamento mediante TERMO DE ACORDO NOS AUTOS, homologado pelo(a) Juiz(a) Arbitral, Arbitro(a) Conciliador(a) e Mediador(a), bem como o(a) Coodenador(a).</p>
      </td>
    </tr>
    <tr>
      <td><p>7 - Taxa de Registro.: <strong><?php echo $row->rqd_rg;?></strong></p></td>
      <td colspan="2"><p>8 - Juiz Arbitral do Processo.: ( ) Indicação (x) Distribuição do Tribunal</p></td>
    </tr>
    <tr>
      <td colspan="3">
        <p>8 - Local da Audiência.: <strong>AVENIDA CURITIBA, 1433 - CENTRO COMERCIAL ROSA 1º ANDAR SALA 113 CENTRO APUCARANA PR</strong></p>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        <p>9 - Declaro nesse ato que as informações aqui prestadas são verdadeiras, e, ciente do regulamento da <strong><?php echo $row->nm_fantasia.' ( '. $row->estab_estado.' )';?></strong> e da LEI FEDERAL 9.307/96, concordo expressamente com os procedimentos neste normato, e também ciente de que a partir da notificação efetiva e tratativa, passa a ser direta e exclusivamente com a CâMARA, desvinculando em todos os sentidos Requerido(a) e Requerente, que as custas e taxas são devidas, mesmo se houver acerto sem audiência da CÂMARA.</p>
      </td>
    </tr>
  </tbody>  
</table>
<div class="div-table bord-right bord-left bord-bottom">
  <p>10 - Assinatura do(a) Requerente:</p><br>
  <div class="box-ass por-right">
    <p class="center campo-ass"><strong><?php echo mb_strtoupper($row->nm_requerente,'UTF-8');?></strong></p>
  </div>
  <div class="clear"></div>
</div>
</div><!-- texto -->