import AOS from 'AOS';


export default {
    init() {
      // JavaScript to be fired on all pages
        /* Hamburger switch
        /––––––––––––––––––––––––*/
        $(function(){
            $(document).on('click', '#hamburger', function (event) {
            // show overlay
            $('#menu_main').toggleClass('hidden_mobile');
            // switch icon
            $('#hamburger').toggleClass('is-active');
            // prevent content scrolling
            $('html').toggleClass('noscroll');
            });
        });

        

  
      
    },
    finalize() {
      // JavaScript to be fired on all pages, after page specific JS is fired

        /* AOS
        /––––––––––––––––––––––––*/
        AOS.init({
            easing: 'ease-out-back',
            duration: 800,
            delay: 200,
            once: true,
            disable: 'mobile'
        });
        

    },
  };