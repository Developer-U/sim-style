jQuery(function($) {
    const text_wraps = $('.js-item');   
    text_wraps.each(function() {
        let btn_open = $(this).find('.js-item-open');
        let btn_close = $(this).find('.js-item-close');
        let item_content = $(this).find('.js-item-content');

        btn_open.on('click', function(event){
            item_content.slideToggle('slow');

            if(btn_open.text() == 'Быстрый заказ') {
                btn_open.text('скрыть');
                btn_open.addClass('opened');
            } else {
                btn_open.text('Быстрый заказ');
                btn_open.removeClass('opened');
            }
            
        })
    });

    const all_types_buttons = $('.js-item-content input.button');

    all_types_buttons.each(function(){
        $(this).on('click', function(e) {  
            let tariff_wrapper = $(this).closest('.tariffs-list__item');    
            let tariff_title = tariff_wrapper.attr('data-name');
            console.log(tariff_title); 
            $('.hide-title').val(tariff_title);
        });
    });

    // $('.js-item-content input.button').on('click', function(e) {    
    //     const tariff_wrapper = e.target.closest('.tariffs-list__item');    
    //     console.log(tariff_wrapper);    
    //     let tariff_title = tariff_wrapper.attr('data-name');
    //     console.log(tariff_title);
        // При открытии попапа по вакансиям присвоим название нужной вакансии
        // let popup = $('.zapis-cont'); // все попапы                
        
        // let text = popup.find('.popup__heading'); // добираемся до названия       
        // let service_type = $(e.target).data('name'); // вычисляем название текущей услуги
        // // console.log(service_type);
        // let newtext = 'Записаться на услугу:<br>' + service_type; //Добавляем в название    
        // // console.log(newtext);   
        // // text.html(newtext); 

        // let service_hidden = popup.find('input[name="service_type"]');
        // service_hidden.val(service_type);
    // });
});