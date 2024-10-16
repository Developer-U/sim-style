window.addEventListener('DOMContentLoaded', function(){ 
    /*Fancybox Gallery*/
    Fancybox.bind("[data-fancybox]", {
        hideScrollbar: false,
    });
      
    const availableScreenWidth = window.screen.availWidth; 

    const form_wrappers = document.querySelectorAll('.cta-wrapper');

    form_wrappers.forEach(function(form_wrapper){
        let form_btn = form_wrapper.querySelector('.inwrapper-btn');        

        if(availableScreenWidth < 768) {
            form_btn.value = 'Получить предложение';
        }
    });     
    
    AOS.init();

    /*Inputmask*/

    var selectors = document.querySelectorAll('input[type="tel"].input-form');

    selectors.forEach(function(selector){
      var im = new Inputmask("+7(999)-999-9999");
      im.mask(selector);
    });

    /*-----Скроллинг плавный------*/ 
    jQuery( function( $ ){
        $('.js-slideTo').on('click', function(e){
            event.preventDefault();

            let href = $(this).attr('href');

            let headerHeight = $('.header').height();

            let offset = $(href).offset().top - headerHeight;

            $('body, html').animate({
            scrollTop: offset,
            }, 800);
        });
    });
});