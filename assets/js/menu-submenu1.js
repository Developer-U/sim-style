window.addEventListener('DOMContentLoaded', function(){
    const availableScreenWidth = window.screen.availWidth; 

    /*Open submenu function*/
    // Функция открытия / закрытия подменю разных уровней
    // Если вложенностей в меню нет, удаляй этот код
    
    const submenu_btn = document.querySelector('#menu-item-58 > a');
    const first_sub_menu = document.querySelector('#menu-item-58 > ul.sub-menu');
        
    submenu_btn.addEventListener('click', function(event){
        event.preventDefault();
        first_sub_menu.classList.toggle('active');            
    }); 

    /*Open submenu function end*/


    /*Open burger menu*/
    var menu = document.querySelector('#navbar')
    ,burger_open = document.querySelector('.burger')  
    ,burger_close = document.querySelector('.burger-close'); 

   

    burger_open.addEventListener('click', function(){ 
        console.log(burger_open);        
        console.log(menu); 
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
                    first_sub_menu.classList.remove('active');      
                }
            
            });
        });

        // Скрытие меню при нажатии на один из пунктов меню первого уровня

        document.querySelectorAll('#menu-item-58 >.sub-menu li').forEach(function(oneUnderItem){
            oneUnderItem.addEventListener('click', function(event){                
                if(event.target.getAttribute('href') !== '#') {         
                    menu.classList.remove('opened');
                    document.querySelector('body').classList.remove('closed'); 
                    first_sub_menu.classList.remove('active');                     
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
            first_sub_menu.classList.remove('active');      
        } 
    });

    /*Open burger menu end*/

   
    // Simplebar
    // Только для бургерного меню подключаем simplebar
    const menu_mobile = document.querySelector('.menu-osnovnoe-menyu-container');           

    new SimpleBar(menu_mobile);  
       
    
});