var toggle_menu = false;

$(function() {
  $('.icon').click(function() {
    if (toggle_menu) {
      $('#header_wrapper').css('height', '50px');
      $('nav').css('top', '0');
      $('.link').css('opacity', '0');
      $('.link').css('visibility', 'hidden');
    } else {
      $('#header_wrapper').css('height', '90px');
      $('nav').css('top', '40px');
      $('.link').css('opacity', '1');
      $('.link').css('visibility', 'visible');
    }
    toggle_menu = !toggle_menu;
  });
});

$(window).resize(function() {
 if ($('header').width() > 900 ) {
   $('.link').css('opacity', '1');
   $('.link').css('visibility', 'visible');
 } else {
   $('.link').css('opacity', '0');
   $('.link').css('visibility', 'hidden');
 }
});
