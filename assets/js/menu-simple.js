window.addEventListener('DOMContentLoaded', function(){
    const availableScreenWidth = window.screen.availWidth; 

    /*Open burger menu*/
    var menu = document.querySelector('#navbar')
    ,burger_open = document.querySelector('.burger')  
    ,burger_close = document.querySelector('.burger-close'); 

   

    burger_open.addEventListener('click', function(){ 
        if( menu.classList.contains('opened') === false ) {
            menu.classList.add('opened');
            document.querySelector('body').classList.add('closed');
        } 

        // Скрытие меню при нажатии на один из пунктов меню верхнего уровня

        document.querySelectorAll('.menu > li >a').forEach(function(oneItem){
            oneItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                }
            
            });
        });     
          
        // Скрытие меню при клике на пустое место (если у тебя меню на всю страницу, удаляй код)

        menu.addEventListener('click', function(event) {            
            if( this == event.target) {                
                menu.classList.remove('opened');
                document.querySelector('body').classList.remove('closed');                   
              
            } 
        });
        
    });
    burger_close.addEventListener('click', function(){    
        if( menu.classList.contains('opened') === true ) {
            menu.classList.remove('opened');
            document.querySelector('body').classList.remove('closed');
        } 
    });

    /*Open burger menu end*/

   
    // Simplebar
    // Только для бургерного меню подключаем simplebar
    const menu_mobile = document.querySelector('.menu-osnovnoe-menyu-container');   
        
    if( availableScreenWidth <= 1199) {
        new SimpleBar(menu_mobile);
    }
});