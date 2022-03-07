import AOS from 'aos';
import Splide from '@splidejs/splide';

export default {
  init() {
    // JavaScript to be fired on all pages

    AOS.init({ once: true, disable: window.innerWidth < 992 });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    new Splide( '.splide', {
      perPage: 2,
      rewind : true,
      gap: '2em',
      breakpoints: {
        767: {
          perPage: 1,
        },
      },
    } ).mount();

    const readMore = document.querySelector('.read-more')
    const readMoreContainer = document.querySelector('.read-more-cont')
    readMore.addEventListener('click', () => {
      if(readMoreContainer.classList.contains('active')) {
        readMoreContainer.classList.remove('active')
        return
      }

      readMoreContainer.classList.add('active')
      return
    })

    $('.wpcf7-form .wpcf7-list-label').append('<span class="for-check"></span>');

    $('.author-cont .img-cont2').each(function () {
      var imgSrc = $(this).find('img').attr('src');
      $(this).css('background', 'transparent url(\'' + imgSrc + '\') no-repeat center top / cover');
    });

    $(window).load(function () {
      var authorName = $(document).find('title').text().split(' ').slice(2).join(' ');
      var navHeight = parseInt($('.for-menu').outerHeight(), 10);
      //console.log('Nav Height:' + navHeight);
      $(document).scroll(function () {
        var cur_pos = $(this).scrollTop();
        $('section').each(function () {
          var top = $(this).offset().top - navHeight,
            bottom = top + $(this).outerHeight();
          if (cur_pos + 2 >= top && cur_pos <= bottom) {
            $('.navbar-nav > li').removeClass('active');
            $('.navbar-nav > li').find('> a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
          }
        });
      });
      $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]').not('[href="#0"]').not('[href="#reviewCarousel"]').click(function (event) {
          // On-page links
          if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname
          ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            var href = $(this).attr('href');
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
              // Only prevent default if animation is actually gonna happen
              event.preventDefault();
              //console.log('nav: ' + navHeight);
              $('html, body').animate({
                scrollTop: target.offset().top - navHeight,
              }, 1000);
              $('nav').find('a').parent('li').removeClass('active');
              $(this).parent('li').addClass('active');
              if (history.pushState) {
                history.pushState(null, null, href);
              }
              else {
                location.hash = href;
              }
              var forTitle = window.location.hash.split('#')[1];
              var finalTitle = forTitle.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                return letter.toUpperCase();
              });
              $(document).attr('title', finalTitle + ' - ' + authorName);
            }
          }
        });
      $(document).ready(function () {
        if (window.location.hash.length > 1) {
          var hash = window.location.hash;
          var forTitle = hash.split('#')[1];
          var finalTitle = forTitle.toLowerCase().replace(/\b[a-z]/g, function (letter) {
            return letter.toUpperCase();
          });
          $(document).attr('title', finalTitle + ' - ' + authorName);

          setTimeout(function () {
            $('#menu-home li a[href=' + hash + ']').trigger('click');
          }, 300);

          $('#menu-home li').each(function () {
            var menuHref = $(this).find('a').attr('href');
            if (hash === menuHref) {
              $(this).addClass('active');
            }
          });
        }

      });
    });
  },
};
