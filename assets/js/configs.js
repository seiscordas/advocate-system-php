$(document).ready(function(){
	var cnpj = $('.cnpj').val();
	$('.cnpj').show();
	//Table Sorter
	$(".tablesorter").tablesorter({
		//headers: {0: {sorter: false}, 6: {sorter: false}, 7: {sorter: false}},
		widgets: ['zebra']
	});	
	//Desativa Link '#'
	$(".nolink").click(function(){
		return false
	});
	//Zebra
   $('.zebra tbody tr:odd').addClass('zebraUm');
   $('.zebra tbody tr:even').addClass('zebraDois');
   
   ////////////////////////// Mascaras para input /////////////////////////////
	//Mascara para moeda
	$('.moeda').priceFormat({
		prefix: '',
		centsSeparator: ',',
		thousandsSeparator: '.'
	});
	/*************** maskedinput ***************/
	//Mascara Numerica
	$(".fone").mask("(99)9999-9999");
	//Mascara Data
	$(".data").mask("99/99/9999");	
	//Mascara Hora
	$(".hora").mask("99:99");
	//Mascara Cpf
	$(".cpf").mask("999.999.999-99");
	//Mascara Cnpj
	$(".cnpj").mask("99.999.999/9999-99");
	//Mascara rg
	$(".rg").mask("9.999.999-9");
	//Mascara Cep
	$(".cep").mask("99999-999");
	//Mascara Anos
	$(".anos").mask("9999/9999");
	//Mascara Letras
	$(".letras").alpha();
	//Mascara Letras e Numeros
	$(".alphanumeric").alphanumeric();
	//Mascara Numeros
	$(".numeros").numeric();
	//Mascara Numeros decimais
	$(".num-dec").numeric({allow:","});
	//Mascara Data
	$(".mask-mes").keyup(function(){
		var valor = $(this).val();
		if(valor > 31)
			$(this).val('31');
		else if(valor == '00')
			$(this).val('01');
		else if(valor > 3 && valor < 10)
			$(this).val('0'+valor);
	});
	$(".mask-mes").blur(function(){
		var valor = $(this).val();
		if(valor > 0 && valor < 10)
			$(this).val('0'+valor);
		else if(valor < 1)
			$(this).val('01');
	});
	//Calendario
	$(function() {
		$( ".data" ).datepicker({
			dateFormat: 'dd/mm/yy',
			showButtonPanel: true
		});
		$.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
	});	
	/////////// Fecha box /////////////
	$(function(){
		$('.fechar').click(function(){
			$('.float-box').hide();
			$('.bg-float-box').remove();
			$('.pg-ajax').html('');
		});
	});
	//Valida formulário
	jQuery(".validar").validationEngine('attach',{showOneMessage : true, binded: false,scroll: false});
	/*Valida Troca Senha**************************************************************/
	$("#conf_senha").keyup(function(){
		senha      = $("#senha").val();
		confirmarSenha = $("#conf_senha").val();
		if(senha == confirmarSenha)
		{
			$(".conf_senha").addClass('has-success');
			$(".conf_senha").removeClass('has-error');
		}
		else
		{
			$(".conf_senha").addClass('has-error');
			$(".conf_senha").removeClass('has-success');
		}
	});
	$('.senha').click(function(){
		var senha          = $("#senha").val();
		var confirmarSenha = $("#conf_senha").val();
		if(senha)
		{
			if(senha.length < 4)
			{
				alert("Senha deve ter no mínimo 4 caracter!");
				$("#senha").focus();
				return false;
			}
		}
		if(senha == confirmarSenha)
			return true;
		else
			return false;
	});
	//seleciona varios checkbox
	var checkAnterior;
	$("input").click(function(event){
		checkActual = parseInt(this.id.substr(2));
		eventoShift = event.shiftKey;
		if (eventoShift)
		{
			if (checkAnterior < checkActual )
			{
				for ( i = checkAnterior ; i <= checkActual ; i++ )
				{
					elemento = "#w_"+i;
					$(elemento).attr("checked","true");
				}
			}
			else if(checkAnterior > checkActual)
			{
				for ( i = checkAnterior ; i >= checkActual ; i-- )
				{
					elemento = "#w_"+i;
					$(elemento).attr("checked","true");
				}
			}
		}
		checkAnterior = parseInt(this.id.substr(2));
	});	
	//Acordion
	$(function() {
		$(".h-overflow").css({
			"position":"absolute",
			"overflow":"hidden"
			});
		$( ".accordion" ).accordion({
			heightStyle: "content",
			collapsible: true,
			active: false
		});
		$(".accord-collapse").click(function(){
			var procurarDe = $('input[name="procurarDe"]').val();
			var procurarAte = $('input[name="procurarAte"]').val();
			if(procurarDe != '' && procurarAte == '')
			{
				$('input[name="procurarAte"]').focus();
				return false;
			}
			else if(procurarAte != '' && procurarDe == '')
			{
				$('input[name="procurarDe"]').focus();
				return false;
			}
			else
			{
				$( ".accordion" ).accordion({active: false});
			}
		});
		$(".accordion .close").click(function(){
			$( ".accordion" ).accordion({active: false});
		});
	});
});
/***************** Fim Document Ready *****************/
//Confirmação de exclusão #############
$(function(){
	$('body').on('click','.confirma',function(){
		if(confirm("Deseja realmente excluir este registro?\nTodos os dados relacionados serão apagados!\nNão sera possível recupera-los, a menos que os cadastre novemente.\n\nClick em \"OK\" para excluir ou \"Cancelar\" para permanecer com os dados."))
			return true;
		else
			return false;
	})
	$('body').on('click','.status-conf',function(){
		if(confirm("Esta ação desativará este registro!\nIsto não quer dizer que os dados serão apagados!\nVoce pode reativalo posteriormente.\n\nClick em \"OK\" para Confirmar ou \"Cancelar\" para não fazer nenhuma ação."))
			return true;
		else
			return false;
	})
});
    
//////////////////// Cep automatico
$(function(){
	$('.verifica-cep').bind('click',function(){
		 /* Configura a requisição AJAX */
		 cep = $('#cep').val().replace('-','');
		 $.ajax({
			  url : path+'cep', /* URL que será chamada */ 
			  type : 'POST', /* Tipo da requisição */ 
			  data: 'cep=' + cep, /* dado que será enviado via POST */
			  dataType: 'json', /* Tipo de transmissão */
			  beforeSend: function(){
				  troca_classe("span.loadding-search", "glyphicon-search", "loading-cep");			  
			  },
			  complete: function(){
				  troca_classe("span.loadding-search", "glyphicon-search", "loading-cep");
			  },
			  success: function(data){
				  if(data.sucesso == 1){
					  $('#rua').val(data.rua);
					  $('#bairro').val(data.bairro);
					  $('#cidade').val(data.cidade);
					  $('#uf').val(data.estado);
					  $('#numero').focus();//foco no numero
					  
				  }
			  }
		 });   
	return false;    
	})
});
//Função Trocar classe
function troca_classe(elemento, classe_a, classe_b)
{
	if ($(elemento).hasClass(classe_a))
	{
		$(elemento).removeClass(classe_a).addClass(classe_b);
	}
	else
	{
		$(elemento).removeClass(classe_b).addClass(classe_a);
	}				  
}
// Menu Flutuante
$(function() {
	$(window).scroll(function(){
		var topo = $('header').height(); // altura do topo
		var scrollTop = $(window).scrollTop(); // qto foi rolado a barra
		//alert('topo: '+topo+'\n'+'rodape: '+rodape+'\n'+'scrollTop: '+scrollTop+'\n'+'tamPagina: '+tamPagina+'\n');
		if(scrollTop > topo + 50)
		{
			$('nav').css({'position' : 'absolute', 'top' : '0', 'z-index' : '10', 'width' : '100%'});
			$("nav").animate({
				top: $(document).scrollTop()+"px"
			},{duration:500,queue:false});
		}
		else
		{
			$('nav').css({'position' : 'relative'});
			$("nav").animate({
				top: 0
			},{duration:500,queue:false});
		}               
	});
});
//Botão Flutuante Rodapé
$(function() {
	var rodape = $('footer').height(); // altura do rodape
	var tamJanela = $(window).height();
	var tamPagina = $(document).height();
	var tolerancia = tamJanela + rodape;
	tolerancia = tamPagina - tolerancia;
	if(tolerancia >= 100)
	{
		$('.bottom_fly').css({'position' : 'fixed', 'bottom' : '0', 'z-index' : '10'});
	}
	$(window).scroll(function(){
		var tamJanela = $(window).height(); // altura do topo
		var scrollTop = $(window).scrollTop(); // qto foi rolado a barra
		var tamPagina = $(document).height(); // altura da página
		var fimPg = parseInt(scrollTop) + parseInt(tamJanela) + parseInt(100);
		//alert('tamJanela: '+tamJanela+'\n'+'fimPg: '+fimPg+'\n'+'tamPagina: '+tamPagina);
		if(fimPg < tamPagina && tolerancia >= 100)
		{
			$('.bottom_fly').css({'position' : 'fixed', 'bottom' : '0', 'z-index' : '10'});
		}
		else
		{
			$('.bottom_fly').css({'position' : 'relative'});
		}               
	});
});
//pessoa fisica juridica mostra e esconde os campos
$(function(){
	$('.tipoPessoa').change(function(){
		pessoa = $(this).val();
		if(pessoa == 'F')
		{
			$('.pes-juridica').fadeOut('fast');
			$('.pes-juridica').find('input').attr('disabled','disabled');
			$('.pes-fisica').find('input').removeAttr('disabled','disabled');
			$('.pes-fisica').fadeIn('slow');
		}
		else
		{
			$('.pes-fisica').fadeOut('fast');
			$('.pes-fisica').find('input').attr('disabled','disabled');
			$('.pes-juridica').find('input').removeAttr('disabled','disabled');
			$('.pes-juridica').fadeIn('slow');
		}
	});
});
///////////// compara input com banco de dados ///////////////////
$(function(){
	var inputValUp;
	$('.input-compare').one('click focus',function(){
			inputValUp = $(this).val();
	});
	$(".input-compare").bind('blur',function(){
		var pag = $('.input-compare-pg').val();
		var inputVal = $(this).val();
		var id = $(this).attr('id');
		var campo = $(this).parent().siblings().find('span').html();
		var dados = $(this).serialize();
		//alert(inputValUp+'\n'+inputVal)
		if(inputValUp != inputVal && inputVal != '')
		{
			copara_input(pag, dados, inputVal, id, campo);
		}
		return false;
	});
});
//Função Ajax
function copara_input(pag, dados, inputVal, id, campo){
	$.ajax({
		type: "POST",
		url: pag,
		data: dados,
		dataType: "json",
		success: function(resultado){
			if(resultado == 1)
			{
				alert('Este dado: "' + inputVal + '" correspondente ao campo "' + campo + '" já está cadastrado e não pode ser duplicado!\n\nSe não deseja receber esta mensagem novamente, apague ou altere o valor do campo.');
				$('#'+id).focus();
				$('.float-box').hide();
				$('.bg-float-box').remove();
			}
		}
	});
}
////////////////// Pesquisa Ajax///////////////////////
$(function(){
	$(".pesq_key_ajax").keyup(function(){
		var pag = $('.form-ajax').attr("action");
		var dados = $('.form-ajax').serialize();
		navAjax(pag, dados);	
		return false;
	});
});
$(function(){
	$(".pesq_btn_ajax").click(function(){
		var pag = $('.form-ajax').attr("action");
		var dados = $('.form-ajax').serialize();
		navAjax(pag, dados);
		return false;
	});
});
//Função Ajax
function navAjax(pag, dados){
	$.ajax({
		type: "POST",
		url: pag,
		data: dados,
		dataType: "html",
		beforeSend: function(){
			$("#carregando").fadeIn(0);
		},
		complete: function(){
			$("#carregando").fadeOut(0);
		},
		success: function(conteudoPg){
			$(".pg-ajax").html(conteudoPg);//BackGround e Fechar
			//Table Sorter
			$(".tablesorter").tablesorter({
				//headers: {0: {sorter: false}, 6: {sorter: false}, 7: {sorter: false}},
				widgets: ['zebra']
			});
		}
	});
}
////////////////// Troca ',' por '.' para calculo  ///////////////////////
function numero(valor)
{
	if(valor)
		ponto = String(valor).indexOf(',');
	if(ponto > 0)
		valor = String(valor).replace('.','');
	if(valor)
		str = String(valor).indexOf(',');
	if(str > 0)
		valor = String(valor).replace(',','.');
	valor = Number(valor);
	return valor;
}
////////////////// Preparar Impressão ///////////////////////
$(function(){
	$(".prep_print").click(function(){
		$("header").hide();
		$("menu").hide();
		$("form").hide();
		$("footer").hide();
		$(".hidden").hide();
		$(".show").show();
		$(".print_table").addClass('table table-striped');
		$(".print_table").removeClass('tablesorter');
		return false;
	});
	$(".fechar_tab").click(function(){
		$("header").show();
		$("menu").show();
		$("form").show();
		$("footer").show();
		$(".hidden").show();
		$(".show").hide();
		$(".print_table").removeClass('table table-striped');
		$(".print_table").addClass('tablesorter');
		return false;
	});
	$(".print").click(function(){
		$("table").css('font-size','10px');
		$("h4").css('font-size','12px');
		$(".show").hide();
		window.print();
		$(".show").show();
		$("table").css('font-size','14px');
		$("h4").css('font-size','17px');
		return false;
	});
	$(".pdf").click(function(){
		$(".show").hide();
		$(".show").delay(5000).show();
		return false;
	});
});
////////////////// Valida Cpf e Cnpj ///////////////////////
$(function(){
	$(".valida-cpf-cnpj").click(function(){
		var cnpj = $('.cnpj').val();
		if(cnpj)
		{
			if(valida_cnpj(cnpj) === false)
			{
				alert("Número de CNPJ é Invalido!");
				return false;
			}
		}
		var cpf = $('.cpf').val();
		if(cpf)
		{
			if(valida_cpf(cpf) === false)
			{
				alert("Número de CPF é Invalido!");
				return false;
			}
		}
	});
});
//Função Valida Cnpj ///////////////////////
function valida_cnpj(cnpj)
{
	var cnpj = jQuery.trim(cnpj);// retira espaços em branco
	// DEIXA APENAS OS NÚMEROS
	cnpj = cnpj.replace('/','');
	cnpj = cnpj.replace('.','');
	cnpj = cnpj.replace('.','');
	cnpj = cnpj.replace('-','');
	
	var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
	digitos_iguais = 1;
	
	if (cnpj.length < 14 && cnpj.length < 15){
	  return false;
	}
	for (i = 0; i < cnpj.length - 1; i++){
	  if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
		 digitos_iguais = 0;
		 break;
	  }
	}
	
	if (!digitos_iguais){
	  tamanho = cnpj.length - 2
	  numeros = cnpj.substring(0,tamanho);
	  digitos = cnpj.substring(tamanho);
	  soma = 0;
	  pos = tamanho - 7;
	
	  for (i = tamanho; i >= 1; i--){
		 soma += numeros.charAt(tamanho - i) * pos--;
		 if (pos < 2){
			pos = 9;
		 }
	  }
	  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	  if (resultado != digitos.charAt(0)){
		 return false;
	  }
	  tamanho = tamanho + 1;
	  numeros = cnpj.substring(0,tamanho);
	  soma = 0;
	  pos = tamanho - 7;
	  for (i = tamanho; i >= 1; i--){
		 soma += numeros.charAt(tamanho - i) * pos--;
		 if (pos < 2){
			pos = 9;
		 }
	  }
	  resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	  if (resultado != digitos.charAt(1)){
		 return false;
	  }
	  return true;
	}else{
	  return false;
	}
}
//Função Valida Cpf ///////////////////////
function valida_cpf(cpf) {
    var cpf = cpf.replace(/[^\d]+/g,'');
	cpf = cpf.replace('.','');
	cpf = cpf.replace('-','');
 
    if(cpf == '') return false;
 
    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
        return false;
     
    // Valida 1o digito
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
     
    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
         
    return true;
    
}
//////////////  Drag and Drop /////////////////
$(function() {
	$( "ul.drop" ).sortable({
	  connectWith: "ul",
	  cursor: "move",
	  cancel: ".placeholder",
	  receive: function( event, ui ) {
		  $( this ).find( ".placeholder" ).remove();
		  //////////// Joga dados no select para inserir no banco //////////////
		  dadosSelect = $( "#drop" ).html().replace(/li/g,'option');
		  $("#dropSelect").html(dadosSelect);
		  $("#dropSelect option").each(function(){
			  $(this).attr("selected","selected");
		  });
      }
	});
	$( "ul.drop" ).tooltip();
	$(".dropSelect").click(function(){
		if($("#drop li:not(.placeholder)").length == '')
		{
			alert("É necessáro cadastra pelo menos um Estabelecimento!\nEm Estabelecimentos \"Cadastrados\", click Sobre um Estabelecimento e Arraste de para \"Liberar p/ Usuário\"");
			return false;
		}
	});
});
//////////////////// Centraliza Box //////////////////////
function center_box()
{
	var altura = $('.float-box').height();
	var largura = $('.float-box').width();
	var left = (largura/2);
	var top = (altura/2);
	$('.float-box').css({
		"margin-left": '-' + left +'px',
		"margin-top": '-' + top +'px',
		"border-radius": 15
	});
}

////////////// Seleção de Estabelecimento /////////////////
function estab_select()
{
	$('body').append('<div class="bg-float-box"></div>');
	$(".float-box").show();
	center_box();
}
////////////// Seleção de Requerente e Requerido /////////////////
function box_reque(reque)
{
	$('body').append('<div class="bg-float-box"></div>');
	$("#box_reque").show();
	$("#box-termo").focus().val('');
	center_box();
}
//Box Requerente
$(function(){
	var inputReque;
	$(".box_reque").bind('focus click',function(){
		inputReque = $(this).attr('input');
		box_reque(inputReque);
		if(inputReque == "requerente")
		{
			var title = "Digite o nome ou o código do Requerente que deseja inserir no processo.";
			$(".reque-title").html(title);
			$("#box-form").attr("action",path+'processo/procura_'+inputReque);
		}
		else
		{
			var title = "Digite o nome ou o código do Requerido que deseja inserir no processo.";
			$(".reque-title").html(title);
			$("#box-form").attr("action",path+'processo/procura_'+inputReque);
		}
	});
	$(document).on('click',".dados-reque",function(){
		var id = $(this).find('.box-cd_'+inputReque).val();
		var nome = $(this).find('.box-nm_'+inputReque).val();
		$('.float-box').hide();
		$('.bg-float-box').remove();
		$('.pg-ajax').html('');
		$("#cd_"+inputReque).val(id);
		$("#nm_"+inputReque).val(nome);
	});
});
//Tipo pagamento mostra e esconde os campos
$(function(){
	$('.tipo-pag').change(function(){
		tipoPag = $(this).val();
		if(tipoPag == 'V')
		{
			$('#form-prazo').fadeOut('fast');
			$('#form-prazo').find('input').attr('disabled','disabled');
			$('#form-prazo').find('select').attr('disabled','disabled');
			$('#form-vista').find('select').removeAttr('disabled','disabled');
			$('#form-vista').fadeIn('slow');
			$('html,body').animate({scrollTop: $('#dt_vencimento').offset().top,}, 1000);
		}
		else if(tipoPag == 'P')
		{
			$('#form-vista').fadeOut('fast');
			$('#form-vista').find('select').attr('disabled','disabled');			
			$('#form-prazo').find('input').removeAttr('disabled','disabled');
			$('#form-prazo').fadeIn('slow');
			$('#vl_entrada').focus();
			$('html,body').animate({scrollTop: $('#vl_entrada').offset().top}, 1000);
		}
	});
	$("#vl_entrada").blur(function(){
		var vl_entrada = numero($(this).val());
		if(vl_entrada > 0)
		{
			$('#form-prazo').find('select').removeAttr('disabled','disabled');
			$('#form-prazo').find('select').focus();
		}
		else
		    $('#form-prazo').find('select').attr('disabled','disabled');
	});
});
//desconto processo não pode ser maio que total
$(function(){
	$("#vl_desconto").bind('blur keyup',function(){
		var vl_desconto = numero($(this).val());
		var vl_divida = numero($("#vl_divida").val());
		if(vl_desconto >= vl_divida)
		{
			alert('O valor do desconto não pode ser igual ou maior que o valor total!');
			$("#vl_desconto").focus().val('');
		}
	});
});


















