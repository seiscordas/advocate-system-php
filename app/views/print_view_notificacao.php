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
<div class="btn-group">
  <a href="javascript:history.back()">
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</button>
  </a>
  <a href="<?php echo base_url($this->uri->segment(1).'/down_pdf/'.str_replace('/','-',$row->cd_processo));?>">
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> Vizualizar</button>
  </a>
  <a href="<?php echo base_url($this->uri->segment(1).'/down_pdf/'.str_replace('/','-',$row->cd_processo)).'/true';?>">
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cloud-download"></span> Baixar</button>
  </a>
</div>
<?php endif;?>
<div id="folha">
<?php if($this->uri->segment(2) == prepara_impressao):?>
  <?php include("print_header_view.php");?>
<?php endif;?>

<?php echo $contents;?>
</div><!--tudo-->
</body>
</html>