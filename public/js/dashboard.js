(function() {
    $('.toggle-wrap').on('click', function() {
      $(this).toggleClass('active');
      $('aside').animate({width: 'toggle'}, 200);
    });
  })();