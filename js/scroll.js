
		$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


        $(window).on("scroll touchmove", function () {
  $('header>.container').toggleClass('sticky', $(document).scrollTop() > 0);
            $('header>.container-fluid').toggleClass('sticky', $(document).scrollTop() > 0);
            $('header').toggleClass('sticky', $(document).scrollTop() > 130);
});