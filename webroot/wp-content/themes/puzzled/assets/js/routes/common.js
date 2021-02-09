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
      $(document).ready(function(){
        $('.navbar-toggle').click(function(){
          $(this).toggleClass('collapsed');
          $('body, .navbar').toggleClass('menu-open');
        });º

      });
    },
    finalize(){}
  
}