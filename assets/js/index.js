$(document).ready(function() {
	$(".ui-register").hide();
});
$('.select__label').click(function() {
  $('.select__label').removeClass('select__label--active');
  $(this).addClass('select__label--active');
});
$('#js-usr-new').click(function() {
  $('.wrap, .pointer, .ui-button, .ui-elem-pass, .ui-elem-rpass').removeClass('--rtn --rst').addClass('--new');
	$('#login-username, #login-password').hide();
  $('#js-btn').html("Register");
	$(".ui-register").show();
	$(".ui-login").hide();
});
$('#js-usr-rtn').click(function() {
  $('.wrap, .pointer, .ui-button, .ui-elem-pass, .ui-elem-rpass').removeClass('--new --rst').addClass('--rtn');
	$('#login-username, #login-password').show();
  $('#js-btn').html("Log In");
	$(".ui-register").hide();
	$(".ui-login").show();
});
