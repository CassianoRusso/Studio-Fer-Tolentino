$(document).ready(function(){

  // Formulário Cliente
  $(document).on("click", "#valida-cliente", function(){

    var nome = $("#cliente_nome").val();
    var telefone = $("#cliente_telefone").val();
    var aniversario = $("#cliente_aniversario").val();

    if(nome == ''){
      $("#cliente_nome").focus();
      return false;
    }
    if(telefone == ''){
      $("#cliente_telefone").focus();
      return false;
    }
    if(aniversario == ''){
      $("#cliente_aniversario").focus();
      return false;
    }

  });

  // Formulário Serviços
  $(document).on("click", "#valida-servico", function(){

    var nome = $("#servico_nome").val();
    var valor = $("#servico_valor").val();
    
    if(nome == ''){
      $("#servico_nome").focus();
      return false;
    }

    if(valor == ''){
      $("#servico_valor").focus();
      return false;
    }
    
  });

  // Formulário Produtos
  $(document).on("click", "#valida-produto", function(){
    var nome = $("#produto_nome").val();
    var valor = $("#produto_valor").val();
    
    if(nome == ''){
      $("#produto_nome").focus();
      return false;
    }

    if(valor == ''){
      $("#produto_valor").focus();
      return false;
    }
  });

  // Formulário Registrar Caixa
  $(document).on("click", "#valida-registro-caixa", function(){
    var valor = $("#caixa_valor").val();

    if(valor == ''){
      $("#caixa_valor").focus();
      return false;
    }
  });

  $(document).on("change", "#selecionar-produto-servico .selectric", function(){
    var op = $(this).find('option:selected').val();

    if(op == 1){
      $("#selecionar-servico").show();
      $("#selecionar-servico .selectric option:first").attr("selected", false);
      $("#selecionar-produto").hide();
      $("#selecionar-produto .selectric option:first").attr("selected", true);
    } else if (op == 2){
      $("#selecionar-produto").show();
      $("#selecionar-produto .selectric option:first").attr("selected", false);
      $("#selecionar-servico").hide();
      $("#selecionar-servico .selectric option:first").attr("selected", true);
    } else {
      $("#selecionar-servico").hide();
      $("#selecionar-servico .selectric option:first").attr("selected", true);
      $("#selecionar-produto").hide();
      $("#selecionar-produto .selectric option:first").attr("selected", true);
    }
  });

  $(document).on("change", "#selecionar-servico .selectric", function(){
    var preco = $(this).find('option:selected').attr('data-preco');

    if(preco != undefined){
      $('#caixa_valor').val(preco);
    }
  });

  $(document).on("change", "#selecionar-produto .selectric", function(){
    var preco = $(this).find('option:selected').attr('data-preco');

    if(preco != undefined){
      $('#caixa_valor').val(preco);
    }
  });

   // Formulário Agenda
  $(document).on("click", "#valida-agenda", function(){
    var assunto = $("#agenda_assunto").val();
    var data = $("#agenda_data").val();
    var h_inicial = $("#agenda_horario_inicial").val();
    var h_final = $("#agenda_horario_final").val();

    if(assunto == ''){
      $("#agenda_assunto").focus();
      return false;
    }
    if(data == ''){
      $("#agenda_data").focus();
      return false;
    }
    if(h_inicial == ''){
      $("#agenda_horario_inicial").focus();
      return false;
    }
    if(h_final == ''){
      $("#agenda_horario_final").focus();
      return false;
    }
  });

  $(document).on("change", "#selecionar-servico .selectric", function(){
    var op = $(this).find('option:selected').val();
    
    if(op == 1){
      $('#selecionar-status-pagamento').show(); 
    }else{
      $('#selecionar-status-pagamento').hide(); 
    }
  });

  // Formulário Usuário
  $(document).on("click", "#valida-usuario", function(){

    var nome = $("#first_name").val();
    var sobrenome = $("#last_name").val();
    var email = $("#email").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var confirma = $("#confirma").val();
    
    if(nome == ''){
      $("#first_name").focus();
      return false;
    }
    if(sobrenome == ''){
      $("#last_name").focus();
      return false;
    }
    if(email == ''){
      $("#email").focus();
      return false;
    }
    if(username == ''){
      $("#username").focus();
      return false;
    }
    if(password == ''){
      $("#password").focus();
      return false;
    }
    if(confirma == ''){
      $("#confirma").focus();
      return false;
    }

  });

});