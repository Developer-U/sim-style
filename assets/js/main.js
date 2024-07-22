window.addEventListener('DOMContentLoaded', function(){
    const availableScreenWidth = window.screen.availWidth; 

    const form_wrappers = document.querySelectorAll('.cta-wrapper');

    form_wrappers.forEach(function(form_wrapper){
        let form_btn = form_wrapper.querySelector('.inwrapper-btn');        

        if(availableScreenWidth < 768) {
            form_btn.value = 'Получить предложение';
        }
    });

    /*Inputmask*/

    var selectors = document.querySelectorAll('input[type="tel"]');

    selectors.forEach(function(selector){
      var im = new Inputmask("+7(999)-999-9999");
      im.mask(selector);
    });

});