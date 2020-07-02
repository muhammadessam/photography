$(function () {

  $("#fr-car").owlCarousel({
    items: 1,
    loop: false,
    autoplay: true,
    animateOut: 'fadeOut',
    autoplayTimeout: 3000,
    nav: true,
    autoplayHoverPause: true
  });
  $('#nd-car').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    margin: 20,
    autoplayHoverPause: true,
    
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 2,
        nav: true,
      },
      1000: {
        items: 3,
        nav: true,
      },
    }
  });
  $('#td-car').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    margin: 40,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: false,
  });
  $(' span[aria-label="Previous"]').html('<i class="icofont-circled-left"></i>');
  $(' span[aria-label="Next"]').html('<i class="icofont-circled-right"></i>');

  $('.galary-list  span[aria-label="Previous"]').html('<i class="fas fa-chevron-left"></i>');
  $('.galary-list  span[aria-label="Next"]').html('<i class="fas fa-chevron-right"></i>');

  $('.counter').countUp({
    'time': 2000,
    'delay': 10
  });

  // color photo sections btn 
  $(document).on('click', '.photos-controls button', function () {
    var myClass = $(this).attr('id');
    $("." + myClass).removeClass('d-none').siblings().addClass('d-none')
  });
  $(document).on('click', '.photos-controls button', function () {
    $(this).addClass('bg-btn-color').siblings().removeClass('bg-btn-color')
  })


  $( "#datepicker" ).datepicker();
  $( "#datepicker2" ).datepicker();


});