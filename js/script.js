var toggle_menu = false;

$(function() {
  $('.icon_menu').click(function() {
    if (toggle_menu) {
      $('#header_wrapper').css('height', '50px');
      $('nav').css('top', '0').css('opacity', '0').css('visibility', 'hidden');
    } else {
      $('#header_wrapper').css('height', '90px');
      $('nav').css('top', '40px').css('opacity', '1').css('visibility', 'visible');
    }
    toggle_menu = !toggle_menu;
  });
});

$(document).ready(function() {
  if ($('header').width() > 880 ) $('.icon_menu')[0].innerHTML='';
  else $('.icon_menu')[0].innerHTML='MENU';
});

$(window).resize(function() {
 if ($('header').width() > 880 ) {
   $('nav').css('opacity', '1').css('visibility', 'visible');
   $('.icon_menu')[0].innerHTML='';
 } else {
   $('nav').css('opacity', '0').css('visibility', 'hidden');
   $('.icon_menu')[0].innerHTML='MENU';
 }
 $('nav').css('top', '0');
 $('#header_wrapper').css('height', '50px');
 toggle_menu = false;
});
