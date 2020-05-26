
//Initialize animation
  AOS.init();

//initialze dynamic navbar color
  $(window).scroll(function(){
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
  });

// Add highlight to navigation menu for current page
  $(function(){
    // this will get the full URL at the address bar
    var url = window.location.href;
    // passes on every "a" tag

    $("#nav-menu a").each(function(){
      // checks if its the same on the address bar
      if (url == (this.href)) {
        $(this).closest("li").addClass("active");
        //for making parent of submenu active
        $(this).closest("li").parent().parent().addClass("active");
      }
    });
  });

// Follow tweeter feed cookie
  window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };
    return t;
  }(document, "script", "twitter-wjs"));


//hover animation for skills logo
  $('#html')[0].onmouseover = function() {
    $('#html-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }
  $('#html')[0].onmouseout = function() {
    $('#html-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }

  $('#css')[0].onmouseover = function() {
    $('#css-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }
  $('#css')[0].onmouseout = function() {
    $('#css-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }

  $('#jscript')[0].onmouseover = function() {
    $('#jscript-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }
  $('#jscript')[0].onmouseout = function() {
    $('#jscript-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }

  $('#react')[0].onmouseover = function() {
    $('#react-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }
  $('#react')[0].onmouseout = function() {
    $('#react-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }

  $('#php')[0].onmouseover = function() {
    $('#php-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }
  $('#php')[0].onmouseout = function() {
    $('#php-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }

  $('#sql')[0].onmouseover = function() {
    $('#sql-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }
  $('#sql')[0].onmouseout = function() {
    $('#sql-prof i').toggleClass("animated zoomIn").attr("data-aos-duration", "700");
  }

//change button Name
var x = $('#collapse-button');
x[0].onclick = function () {
  if(x.html() == 'Show more &nbsp;&nbsp;<i class="fas fa-angle-down" aria-hidden="true"></i>') {
      x.html('Show less &nbsp;&nbsp;<i class="fas fa-angle-up" aria-hidden="true"></i>');
  } else {
      x.html('Show more &nbsp;&nbsp;<i class="fas fa-angle-down" aria-hidden="true"></i>');
  }
}
