<?php $userMenu = $this->session->userdata('logged_in');//var_dump($userMenu);?>
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav" role="menu">
      <li class="<?php if($this->uri->segment(1) == 'home') echo 'active';?>">
        <a href="<?php echo base_url('admin');?>"><span class="glyphicon glyphicon-home"></span> Home</a>
      </li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-inbox"></span> Arquivo <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('requerente/lista');?>" >Requerente</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('requerido/lista');?>" >Requirido</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('juiz/lista');?>" >Juiz</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('evento/lista');?>" >Eventos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('estab/lista/a');?>" >Estabelecimento</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('usuario/lista/a');?>" >Usuários</a></li>
        </ul>
      </li>      
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> Processo <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('processo/lista/todos');?>">Controle de Processo</a></li>
        </ul>
      </li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-usd"></span> Financeiro <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('caixa/lista/e');?>" >Controle de Caixa</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('receber/lista');?>" >Contas a Receber</a></li>
        </ul>
      </li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url("sair");?>">Sair</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  <div class="clear"></div>
</nav>