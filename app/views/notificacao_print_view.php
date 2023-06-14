<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta charset="utf-8">
<title>KL Systems: Visualização de Impressão</title>
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <script src="<?php echo base_url("assets/bootstrap/js/respond.min.js");?>"></script>
<![endif]-->


<?php if($this->uri->segment(2) == prepara_impressao):?>
  <?php echo link_tag('assets/bootstrap/css/bootstrap.min.css')."\n"?>
<?php endif;?>
<?php //echo link_tag('assets/bootstrap/css/bootstrap.min.css')."\n"?>
<?php echo link_tag('assets/css/print.css')."\n"?>

</head>
<body>
<?php if($this->uri->segment(2) == prepara_impressao):?>
  <a href="javascript:history.back()" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span> Cancelar
  </a>
  <a href="<?php echo base_url($this->uri->segment(1).'/down_pdf/'.$this->uri->segment(3))//id notificação;?>" class="btn btn-default">
    <span class="glyphicon glyphicon-eye-open"></span> Vizualizar
  </a>
  <a href="<?php echo base_url($this->uri->segment(1).'/down_pdf/'.$this->uri->segment(3))/*id notificação*/.'/true';?>" class="btn btn-default">
    <span class="glyphicon glyphicon-cloud-download"></span> Baixar
  </a>
<?php endif;?>
<div id="folha">
<?php if($this->uri->segment(2) == prepara_impressao):?>
  <?php include("print_header_view.php");?>
<?php endif;?>

<h5>
  <strong><?php echo $row->estab_rua . ', ' . $row->estab_numero .' - '. $row->estab_complemento . ' - ' . $row->estab_cidade .' - ' . $row->estab_estado;?></strong>
</h5>
	
<p>A/C <strong><?php echo $row->nm_requerido;?></strong></p>
<br>
	
NOTIFICAÇÃO EXTRA JUDICIAL....: <strong><?php echo $row->cd_processo;?></strong>
	
<p>REQUERENTE..............................: <strong><?php echo $row->nm_requerente;?></strong></p>
	
<p>REQUERIDO.................................: <strong><?php echo $row->nm_requerido;?></strong></p>

<br>
<div class="texto">
  <p>Vimos por meio desta, cientificá-lo(a) a comparecer na sede do <strong><?php echo $row->nm_fantasia;?> (<?php echo $row->fl_estado;?>)</strong>, em
  <strong><?php echo implode('/',array_reverse(explode('-',$row->dt_audiencia)));?></strong> as <strong><?php echo $row->hr_audiencia;?></strong> horas.</p>
      
  <p>Esclarecemos na oportunidade que o JUIZO ARBITRAL visa compor por CONCILIAÇÃO (Art. 21 § 4 LEI FEDERAL 9.307/96), a controvércia entre as partes, procurando evitar a propositura da respectiva ação JUDICIAL cabível à espécie.</p>
  <br>
  
  <p>O Juiz Arbitral notifica a parte supra, CARLOS AUGUSTO H. DA SILVA nos termos do art. 172, § 2º do CPC, combinado com a Lei 9.307/96, para todos os termos da ação indicada, ciente que deverá comparecer à audência de conciliação, na data e hora designadas.</p>
      
  <h5><strong>ADVERTÊNCIA:</strong></h5>
      
  <p>O não comparecimento às audiência importará em revelia, reputando-se como verdadeiras as alegações iniciais do autor e proferindo-se o julgamento de plano. Comparecendo a parte Requerida (ré), e não obtida a conciliação, poderá a ação ser julgada antecipadamente, se for o caso, ou se pro	
  ceder à audiência de instrução e julgamento. Por fim, em sendo reputado a causa relação de consumo, fica invertido o ônus da prova a teor do art. 5º, VIII do CDC.</p>
  <br>
      
  <p>Ficando ciente que não sendo contestada a ação presumir-se-ão aceitos pelo réu como verdadeiros os fatos alegados pelo autor no petitório inicial( art. 285 e 319 CPC) Prazo para resposta 15 dias.</p>
 <br>
      
  <p>O Requerido (a) deverá oferecer contestação, escrita ou oral, na audiência de instrução e julgamento, sendo obrigatória, na impossibilidade de comparecimento, poderá designar quem o(a) represente, apresentando no ato da audiência carta de preposição em se tratando de pessoa jurídica poderá ser representada por preposto, nos termos do artigo 21 § 3º da LEI FEDERAL 9.307/96.</p>

</div>
<br>
<p><?php echo $row->ds_cidade;?> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <?php echo date("d/m/Y H:i:s");?></p>
<br>
	
<h5 class="center"><strong><?php echo mb_strtoupper($row->nm_juiz,'UTF-8');?></strong></h5>
<h6 class="center">Juiz Arbitral</h6>
</div><!--tudo-->
</body>
</html>