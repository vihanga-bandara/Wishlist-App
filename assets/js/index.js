$('.select__label').click(function() {
  $('.select__label').removeClass('select__label--active');
  $(this).addClass('select__label--active');
});
$('#js-usr-new').click(function() {
  $('.wrap, .pointer, .ui-button, .ui-elem-pass, .ui-elem-rpass').removeClass('--rtn --rst').addClass('--new');
  $('#js-btn').html("Register");
});
$('#js-usr-rtn').click(function() {
  $('.wrap, .pointer, .ui-button, .ui-elem-pass, .ui-elem-rpass').removeClass('--new --rst').addClass('--rtn');
  $('#js-btn').html("Log In");
});
