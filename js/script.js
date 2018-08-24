var toggle_menu = false;

$(function() {
  $('.icon').click(function() {
    if (toggle_menu) {
      $('#header_wrapper').css('height', '50px');
      $('nav').css('top', '0').css('opacity', '0');
    } else {
      $('#header_wrapper').css('height', '90px');
      $('nav').css('top', '40px').css('opacity', '1');
    }
    toggle_menu = !toggle_menu;
  });
});

$(window).resize(function() {
 if ($('header').width() > 880 ) {
   $('nav').css('opacity', '1');
 } else {
   $('nav').css('opacity', '0');
 }
 $('nav').css('top', '0');
 $('#header_wrapper').css('height', '50px');
 toggle_menu = false;
});
