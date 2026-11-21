window.addEventListener('DOMContentLoaded', function(){
    // Get all of the swipers on the page
    const allServiceSliders = document.querySelectorAll('.hero-slider');

    // Loop over all of the fetched sliders and apply Swiper on each one.
    allServiceSliders.forEach(function(slider){
        let service_slider = new Swiper(slider, {
            slidesPerView: 1, 
            spaceBetween: 4,   
            loop: true,
            // navigation: {
            //     nextEl: ".swiper-button-next.slider-arrow-next",
            //     prevEl: ".swiper-button-prev.slider-arrow-prev",
            //   },
            speed: 700,    
            keyboard: {
                enabled: true,
                pageUpDown: true,
            },       
            autoplay: {
                delay: 4000,            
                waitForTransition: true,
            },  
        });
    });

    

});