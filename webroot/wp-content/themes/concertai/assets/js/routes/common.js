import lazySizes from 'lazysizes';
import fonts from '../modules/fonts';
import magnficpopup from '../modules/magnficpopup';
import Swiper from 'swiper';
import 'swiper/css/swiper.css';
import AOS from "aos";
import "aos/dist/aos.css";
import Panzoom from '@panzoom/panzoom';
import Pagination from '../modules/pagination';
// import "splitting/dist/splitting.css";
// import "splitting/dist/splitting-cells.css";
import Splitting, { add } from "splitting";

// import Masonry from "masonry-layout";

// Setting Up Media Queries for all the responsive images. 
lazySizes.cfg.customMedia = {
    '--small': '(max-width: 320px)',
    '--medium': '(min-width: 321px) and (max-width: 768px)',
    '--large': '(min-width: 769px) and (max-width: 1024px)',
}

document.querySelectorAll('a[href^="#"]:not(.noscroll)').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});

/*document.querySelectorAll('#graphic-mobile .panel-screen-1').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector("#"+this.getAttribute('data-panel')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});*/
function indexOfMax(arr) {
  if (arr.length === 0) {
    return -1;
  }

  var max = 0;
  var maxIndex = 0;

  for (var i = 0; i < arr.length; i++) {
    if (arr[i] > max) {
      maxIndex = i;
      max = arr[i];
    }
  }

  return maxIndex;
}

export default {
    init(){
      fonts.init();
      AOS.init({
        once: true
      });
      Pagination.init();

      //Counter
      function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
    
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();
    
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
			}
			
			function numberWithCommas(x) {
				return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			}

      function checkCounters(){
        $('.counter').each(function() {
          var $this = $(this),
              countTo = $this.attr('data-count'),
              viewed = $this.attr('data-viewed');
          if (isScrolledIntoView($(this)) && viewed != 'true'){
            $this.attr('data-viewed', 'true');
            $({ countNum: $this.text()}).animate({
              countNum: countTo
            },
            {
              duration: 3000,
              easing:'linear',
              step: function() {
								let counterNum = Math.floor(this.countNum);
								let counterString = numberWithCommas(counterNum);
								$this.text(counterString);
              },
              complete: function() {
								let counterNum = this.countNum;
								let counterString = numberWithCommas(counterNum);
                $this.text(counterString);
                //alert('finished');
              }
            });
          }  
        });
      }
      checkCounters();
      
      //Swiper
      var swiper_module = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 6000,
        },
        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 30
          }
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
      });
      
      $('.swiper-container').on('click', '.swiper-slide-next', function (e) {
        swiper_module.slideNext();
      });

      // controls pop-out menus in nav
      $('.nav-svg').on('click',function(){
        if ($(this).attr('id') == 'close-svg'){
          $('.nav-svg').removeClass('active').removeClass('hidden');
          $('#search-svg').removeClass('aside');
          $('#popouts').removeClass('hamburger').removeClass('search');
          $('html').removeClass('noscroll');
        } else {
          $('html').addClass('noscroll');
          if ($(this).attr('id') == 'hamburger-svg'){
            $(this).addClass('active');
            $('#search-svg').addClass('aside');
            $('#popouts').addClass('hamburger');
          }
          if ($(this).attr('id') == 'search-svg'){
            $('#popouts').addClass('search');
            $('#hamburger-svg').addClass('hidden').removeClass('active');
            $(this).addClass('active').removeClass('aside');
            setTimeout(function() {
              $('#popout-search-container input#search').focus();
            }, 499);
            $('#popouts').removeClass('hamburger');
          }
          if ($(this).attr('id') == 'close-modal') {
            $('#popouts').removeClass('hamburger').removeClass('search');
            $('.modal').addClass('fade').removeClass('show');
            $('html').removeClass('noscroll');
            var target = $(this).closest('.husl-block');
            var nav = $('.navbar');
            if (target.length){
              $('html, body').animate({
                scrollTop: target.offset().top + nav.height()
              }, 1000);
            }
          } else {
            if (!$("#close-svg").hasClass('active')){
              $("#close-svg").addClass('active');
            }
          }
        }
      });

      // closes the menu if there's a click outside the menu


      // this code only changes the SVGs, it doesn't close the menu. Commenting out
      /*
      $(document).click(function(event){
        var $target = $(event.target);
        if ($target.closest('.popout-menu').length == 0 &&
            $target.closest('.nav-svg').length == 0){
          $('.nav-svg').removeClass('active').removeClass('hidden');
        }
      });
      */

      // closes the menu if ESC key pressed
      $(document).on('keyup', function(evt){
        var code = evt.keyCode || evt.which;
        if (code==27){
          $('.nav-svg').removeClass('active').removeClass('hidden');
          $('.modal').removeClass('show').addClass('fade');
        }
      });

      // fix the menu if scrolling up
      var lastScrollTop = 0;
      $(window).on('scroll', function(){
        checkCounters();
        stickySubNav();
        updateSubNav();
        var st = $(this).scrollTop();
        $('.navbar').addClass('scrolling');
        if (st < lastScrollTop){
          if ($('.navbar.fixed').length == 0){
            $('.navbar').addClass('fixed');
          }
        } else {
          if ($('.navbar').find('.nav-svg.active').length == 0){
            $('.navbar').removeClass('fixed');
          }
        }
        if (st == 0) {
          $(".is-fixed-top").removeClass('fixed');
          $(".is-fixed-top").removeClass('scrolling');
        }
      
        lastScrollTop = st;
      });

      // Convert any sentence contained in a span with an "animate-sentence" class to a series of <span>s for each word.
      $('span.animate-sentence').each(function(c){
        var sentence = $(this).text().split(" ");
        var replace = "";
        sentence.forEach(function(c){
          if (typeof(c) == "string"){
            replace += "<span>" + c + "</span> ";
          }
        });
        $(this).html(replace);
        $(this).addClass("animating");
      });

      Splitting({ target: $('.link-wrap h3'), by: 'chars' });

      function resizeSVGs(){
        $('.husl-block-highlights .center-sm').each(function(){
          var height = 0;
          var thisHeight = 0;
          $(this).find('.highlight-icon img').each(function(){
            thisHeight = parseInt($(this).css('height'));
            if (thisHeight > height){
              height = thisHeight;
            }
          });
          if (height > 0){
            $(this).find('.highlight-icon img').each(function(){
              $(this).css('height', height + 'px');
            });
          }
        });
      }

      function resizeBlockAnnouncement(){
        if ($(window).width() > 1068){
          $('.block-announcement').each(function(){
            var announcement_content_height = 0;
            $(this).find('.announcement-content').each(function(){
              $(this).css('height','auto');
              var thisHeight = parseInt($(this).css('height'));
              if (thisHeight > announcement_content_height) {
                announcement_content_height = thisHeight;
              }
            });
            $(this).find('.announcement-content').each(function(){
              $(this).css('height', announcement_content_height + 'px');
            });
          });
        } else {
          $('.announcement-content').each(function(){
            $(this).css('height','auto');
          })
        }
      }

      function resizeHighlightBoxes(){
        $('.tooltip_container').each(function(){
          var height = 0;
          $(this).find('.tooltip').each(function(){
            var thisHeight = parseInt($(this).css('height'));// + parseInt($(this).css('padding-top')) + parseInt($(this).css('padding-bottom'));
            if (thisHeight > height){
              height = thisHeight;
            }
          });
          if (height > 0){
            $(this).find('.tooltip').css('height', height+'px');
            $(this).find('.tooltip').addClass('calculated-height');
          }
        });
      }
      $(window).resize(function(){
        resizeBlockAnnouncement();
        updateSubNav();
        resizeMultipleImages();
      });
      // Create modals
      $('.wide-content-image').on("click", function(c){
        if ($(this).find('.magnifier').css('display') == 'block'){
          var modal = $(this).siblings('.modal');
          $(modal).toggleClass('show');
          $(modal).find('.modal-body img').attr('src', $(this).find('img').data('src'));

          const elem = document.getElementById('modalbody');
          const panzoom = Panzoom(elem, {
            maxScale: 5
          });
          panzoom.pan(10, 10);
          panzoom.zoom(2, { animate: true });
        }
        
          //$(this).modal('show');
      });

      // Wide Content Module - Resize container if containing absolutely positioned images
      function resizeMultipleImages(){
        if ($('.multiple-images').length > 0) {
          $('.multiple-images').each(function(){
            var height = 0;
            $(this).find('img').each(function(){
              if ($(this).height() > height){
                height = $(this).height();
              }
            });
            var cssHeight = height + 'px';
            $(this).height(cssHeight);
          });
        }
      }
      
      $('.modal-body img').on("click", function(c){
        $('.modal').removeClass('show').addClass('fade');
      });
      
      //Webinar Forms
      var getUrlParameter = function getUrlParameter(sParam) {
          var sPageURL = window.location.search.substring(1),
              sURLVariables = sPageURL.split('&'),
              sParameterName,
              i;

          for (i = 0; i < sURLVariables.length; i++) {
              sParameterName = sURLVariables[i].split('=');

              if (sParameterName[0] === sParam) {
                  return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
              }
          }
      };
      var source = getUrlParameter('source'); 

      $("#webinar-registration-form td label").filter(function () {
        return $(this).text().indexOf("Source") > -1;
      }).parent().parent().hide();
      $("#webinar-registration-form td label").filter(function () {
        return $(this).text().indexOf("Source") > -1;
      }).parent().parent().find("input").val(source);
      
      $("#disclaimer").parent().parent().hide();
      setTimeout(function(){
        $("#webinar-registration-form").css("opacity","1");
      }, 500);
      $('#webinar-registration-form select option').each(function() {
        var val = $(this).val();
        $("#gotowebinar_registration_submit").parent().addClass("prepend-to");
        setTimeout(function(){

 
      
        if(val){ 

          $('<br/>').addClass("custom-checkbox-br").prependTo('.prepend-to');
          $('<label/>').text('By checking this box, you submit your information to the webinar organizer, who will use it to communicate with you regarding this event and their other services.').addClass("custom-checkbox-label").prependTo('.prepend-to');
          
          $('<input/>').attr({
            type: 'checkbox',
            value: val
          }).addClass("custom-checkbox-input").prependTo('.prepend-to');
          
        }
          
}, 400);
      });
        
$("#webinar-registration-form").on('change','.custom-checkbox-input',function () { 
           //$('.custom-checkbox-input').on('change', function() { 
        if($('#disclaimer').val(this.value)) {
         
          //$('#webinar-registration-form select option').val(this.value).change();
          $('#disclaimer').selected = 'selected';
        }
      });

      //Tabs
      $('.tab-container .nav-link').on('click',function(){
        if ($(this).hasClass('active')){
          return false;
        }
        var control = $(this).attr('aria-controls');
        var tabs = $(this).closest('.nav').siblings('.tab-content');

        var tabToShow = $(this).closest('.nav').siblings('.tab-content').find('.tab-pane#' + control);
        $(tabs).find('.tab-pane').removeClass('active').removeClass('show').removeClass('fade');

        $(tabToShow).addClass('active').addClass('fade').addClass('show');

        $(this).closest('.nav').find('.active').removeClass('active');
        $(this).addClass('active').parent().addClass('active');

        // mobile tabs
        var mtabs = $(this).closest('.nav-item').next();
        $('.mobile-nav-item .show').removeClass('show');
        $(mtabs).find('.tab-pane').addClass('show');

        if ($(mtabs).css('display') != 'none'){
          $('html,body').animate({
            scrollTop: $(this).offset().top - 100
          }, 300);
        }
      });
      
      
      //Video Modal
      $('.mfp-pop').magnificPopup(
        {
        type: 'iframe',
        iframe: {
          markup: '<div class="mfp-iframe-scaler">' +
            '<div class="mfp-close"></div>' +
            '<iframe class="mfp-iframe" frameborder="0" allow="autoplay"></iframe>' +
            '</div>',
          patterns: {
            vimeo: {
            index: 'vimeo.com/',
            id: '/',
            src: 'https://player.vimeo.com/video/%id%?autoplay=1'
          }
          }
        }
      });
      $('.video-image .bottom-overlay').click(function(){
        var mfp = $(this).siblings('.mfp-pop');
        $(mfp).click();
      });
      var subNavTop_original = null;
      if ($('.subnav-sticky').length > 0){
        subNavTop_original = $('.subnav-sticky').offset().top;
      }
      function stickySubNav(){
       if ($('.subnav-sticky').length && subNavTop_original != null){
          var subNav = $('.subnav-sticky');
          var viewportTop = $(window).scrollTop();
          //var subNavTop = $(subNav).offset().top;
          if (viewportTop > subNavTop_original){
            $(subNav).addClass('fixedNav');
          } else {
            $(subNav).removeClass('fixedNav');
          }
        }
      }

      function updateSubNav(){
        // this function loops through the subnav and finds all the anchor links. 
        // It then checks the content of the div to calculate how much of the content is in view.
        // Whichever section has the most content visible gets to be selected 
        var subnav = $('.subnav-sticky ul.menu li a');
        if ($(subnav).length){
          var viewportTop = $(window).scrollTop();
          var viewportBottom = viewportTop + $(window).height();
          /*console.log('----------------');
          console.log('viewportTop' + viewportTop);
          console.log('viewportBottom' + viewportBottom);*/
          var prev = null;
          var set = false;
          var offset_array = [];
          var count = 0;
          $(subnav).each(function(){
            var anchor = $(this).attr('href').replace('#','');
            var sectionDiv = $('#' + anchor + " + div");
            if ($(sectionDiv).length > 0){
              var elementTop = $('#' + anchor + " + div").offset().top;
              var elementBottom = elementTop + $('#' + anchor + " + div").outerHeight();
              /*console.log(anchor);
              console.log('elementTop' + elementTop);
              console.log('elementBottom' + elementBottom);  */

              if ((elementTop < viewportBottom && elementTop > viewportTop) && (elementBottom > viewportTop && elementBottom < viewportBottom)){ // the whole element is in view
                offset_array[count] = elementBottom - elementTop;
              } else if (elementTop < viewportBottom && elementTop > viewportTop) { // the top of the element is in view
                offset_array[count] = viewportBottom - elementTop;
              } else if (elementBottom > viewportTop && elementBottom < viewportBottom) {
                offset_array[count] = elementBottom - viewportTop;
              }
              count++;
            }
          });

          if (offset_array.length > 0){
            var indexOfLargest = indexOfMax(offset_array);
            
            if (indexOfLargest === parseInt(indexOfLargest)){
              $('.subnav-sticky a.active').removeClass('active');
              $($(subnav)[indexOfLargest]).addClass('active');
            }
          }
        }
      }

      function setPanelWidths() {
        var panelWidth = $('.panel-container:first').outerWidth();
        var tabWidth = $('.tab-2').outerWidth();
        if (tabWidth == 80) {
          
          if ($(window).width() > 1068){
            $('.panel').width(panelWidth);
            $('.single-col .panel .panel').width(panelWidth * 2);
            $('.accordion-content').width(panelWidth * 3);
          }
        }
        console.log('setPanelWidths');
      }

      if ( $('.panel-container').length ) {

        var currentPanel; 
        
        setPanelWidths();

        $('.panel-menu a').click(function(e){
          if($(this).parent().hasClass('unclickable')) {
            e.preventDefault();
          } else {
            $('.back-button').addClass('is-active');
            var panelDepth = $(this).parents('.panel-menu').length;
            var panelIdx = $(this).parents('.panel-container').index() + 1;
            if (panelDepth == 2) {
              $(this).parents('.panel-container').siblings().eq(0).addClass('panel-closed');
              $(this).parents('.panel-container').addClass('panel-expanded');
              $(this).parent('li').siblings().removeClass('is-active');
              $(this).parent('li').addClass('is-active');
            } else {
              if (panelIdx == 2) {
                $(this).parents('.panel-container').siblings().eq(0).removeClass('panel-closed');
              }
              if (panelIdx == 3) {
                $(this).parents('.panel-container').siblings().eq(0).addClass('panel-closed');
              }
              $('.panel-menu li').removeClass('is-active');
              $(this).parents('.panel-container').removeClass('panel-expanded');
              $(this).parents('.panel-container').addClass('panel-opened');
              $(this).parents('.panel-container').siblings().removeClass('panel-opened');
              $(this).parent('li').addClass('is-active');
            }
          }
        });

        $('a.back-button').click(function(e){
          e.preventDefault();
          $(this).removeClass('is-active');
          $('.panel-menu li').removeClass('is-active');
          $('.panel-container').removeClass('panel-opened panel-expanded panel-closed');
          if ($(window).width() < 1068){
            $(".panel-menu").hide();
          }
        });
        
        $('.heading-click').click(function(e){
          e.preventDefault();
          $(this).find('.panel-menu').show();
        });
        setTimeout(function(){
          $("#graphic-desktop").css("opacity","1"); 
        }, 500);
        
        setTimeout(function(){
          $("#graphic-mobile").css("opacity","1"); 
        }, 500);
        
        $(".unclickable a").click(function(e){ 
          e.preventDefault();
        });
        $("#tab-1 .accordion-header").click(function(e){
          e.preventDefault(); 
          if ($(window).width() > 1068){ 
            $(".single-col .panel-menu li a").first().click();
          }
          
        });
        
        $(".panel, .accordion-header").click(function(e){
          //alert('....');
          e.preventDefault(); 
          var new_height = $(".accordion").height() + 300;
          $("#eureka-graphic-wrapper").height(new_height);
          
        });
        $(".panel-screen-1").click(function(e){
          e.preventDefault();          
          $('.back-button').removeClass("is-active");
          var panel_tab = $(this).data('panel');
          $(".panel-screen-1").not(this).css("opacity","0");
          $(this).find('.panel-content').css("opacity","0");
          $(".eureka-list").css("opacity","0"); 
          $(".tabs").removeClass("is-active"); 
          $("#graphic-desktop").css("opacity","0");
          $("#graphic-mobile").css("opacity","0");
          $(".eureka-accordion-wrapper").css("opacity","1");           
          $("#graphic-desktop").css("z-index","-1");
          $("#graphic-mobile").css("z-index","-1");
          $('.'+panel_tab).addClass("is-active"); 
          
          if ($(window).width() > 1068){
            $(".single-col .panel-menu li a").first().click();
          } else {
            $(".panel-menu").hide();
          }
          setTimeout(function(){
            $(".is-active .panels-wrap").css("max-height","1600px");
          }, 200);

          
          var offset = $("#"+$(this).data('panel')).offset();
          $('html, body').animate({
              scrollTop: (offset.top - 50)
          }, 500);
          
          var new_height = $(".accordion").height() + 600; 
          $("#eureka-graphic-wrapper").height(new_height);

        });
        $(".main-head").click(function(e){
          e.preventDefault(); 
          if ($(window).width() < 1068){
          //$('.mobile-only .panel-menu').hide();
          }
          
          $(".tabs").removeClass("is-active");  
          $(".panel-screen-1").not(this).css("opacity","1"); 
          $(".eureka-list").css("opacity","1");  
          $('.panel-content').css("opacity","1");
          $("#graphic-desktop").css("opacity","1");
          $("#graphic-desktop .panel-screen-1").css("opacity","1");
          $("#graphic-mobile").css("opacity","1");
          $("#graphic-desktop").css("z-index","2");
          $("#graphic-mobile").css("z-index","2");
          $(".eureka-accordion-wrapper").css("opacity","0");  
        });
        
        $(".accordion-header").click(function(e){
          e.preventDefault(); 
          $(".panel-opened").removeClass('panel-opened');
          $(".panel-expanded").removeClass('panel-expanded');
          $(".panel-closed").removeClass('panel-closed');
          $(".panel-container.single-col").addClass('panel-opened');
        if ($(window).width() < 1068){
          $('.panel-menu').hide();
        }
          $('.back-button').removeClass("is-active");
          setTimeout(function(){
            $(".is-active .panels-wrap").css("max-height","1600px");
          }, 200)
        });
        setTimeout(function(){
          $("#background-fade").css("opacity","1");
        }, 300); 
        $(".heading-click .d-flex").click(function(e){
          e.preventDefault(); 
          if ($(window).width() < 1068){
          $('.panel-menu').hide();
          }
        });
        setTimeout(function(){
          $(".dashed-lines-wrap, .after").css("opacity","1");
        }, 1600);
      }

      var resizeTimer;
      $(window).on('resize', function(e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
          setPanelWidths();
        }, 250);
      });
      
      $(document).ready(function(){
        resizeBlockAnnouncement();
        resizeSVGs();
        updateSubNav();
        resizeHighlightBoxes();
        resizeMultipleImages();
      });
      
    },
    finalize(){}
  
}