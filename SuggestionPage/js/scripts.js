   (function($) {
    "use strict"; // Start of use strict
  
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: (target.offset().top - 71)
          }, 1000, "easeInOutExpo");
          return false;
        }
      }
    });


  //Slide shows of subscriptions services of each catagory  
    var myIndex = 0;
    carousel();
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 1000); 
    }
    var myIndex2 = 0;
    carousel2();
    function carousel2() {
      var j;
      var y = document.getElementsByClassName("mySlides2");
      for (j = 0; j < y.length; j++) {
        y[j].style.display = "none";  
      }
      myIndex2++;
      if (myIndex2 > y.length) {myIndex2 = 1}    
      y[myIndex2-1].style.display = "block";  
      setTimeout(carousel2, 1500); 
    }
    var myIndex3 = 0;
    carousel3();
    function carousel3() {
      var j;
      var y = document.getElementsByClassName("mySlides3");
      for (j = 0; j < y.length; j++) {
        y[j].style.display = "none";  
      }
      myIndex3++;
      if (myIndex3 > y.length) {myIndex3 = 1}    
      y[myIndex3-1].style.display = "block";  
      setTimeout(carousel3, 2000); 
    }
    var myIndex4 = 0;
    carousel4();
    function carousel4() {
      var j;
      var y = document.getElementsByClassName("mySlides4");
      for (j = 0; j < y.length; j++) {
        y[j].style.display = "none";  
      }
      myIndex4++;
      if (myIndex4 > y.length) {myIndex4 = 1}    
      y[myIndex4-1].style.display = "block";  
      setTimeout(carousel4, 2500); 
    }
    var myIndex5 = 0;
    carousel5();
    function carousel5() {
      var j;
      var y = document.getElementsByClassName("mySlides5");
      for (j = 0; j < y.length; j++) {
        y[j].style.display = "none";  
      }
      myIndex5++;
      if (myIndex5 > y.length) {myIndex5 = 1}    
      y[myIndex5-1].style.display = "block";  
      setTimeout(carousel5, 3000); 
    }
    var myIndex6 = 0;
    carousel6();
    function carousel6() {
      var j;
      var y = document.getElementsByClassName("mySlides6");
      for (j = 0; j < y.length; j++) {
        y[j].style.display = "none";  
      }
      myIndex6++;
      if (myIndex6 > y.length) {myIndex6 = 1}    
      y[myIndex6-1].style.display = "block";  
      setTimeout(carousel6, 3500); 
    }


  
    // Scroll to top button appear
    $(document).scroll(function() {
      var scrollDistance = $(this).scrollTop();
      if (scrollDistance > 100) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });


    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
      $('.navbar-collapse').collapse('hide');
    });

  
    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 80
    });

  
    // Collapse Navbar
    var navbarCollapse = function() {
      if ($("#mainNav").offset().top > 100) {
        $("#mainNav").addClass("navbar-shrink");
      } else {
        $("#mainNav").removeClass("navbar-shrink");
      }
    };

    // Collapse now if page is not at top
    navbarCollapse();

    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
    
  })(jQuery); // End of use strict

