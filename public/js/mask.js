$(document).ready(function(){
    $('.js-date').mask('00/00/0000');
    $('.js-cep').mask('00000-000');
    $('.js-phone').mask('(00) 00000-0000');
    $('.js-cpf').mask('000.000.000-00', {reverse: true});
    $('.js-money').mask('000.000.000.000.000', {reverse: true});
  });