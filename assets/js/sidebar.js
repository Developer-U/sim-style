window.addEventListener('DOMContentLoaded', function(){   

    // плавающий блок в сайдбаре
    jQuery(function($) {
       // Плавающий сайдбар
       var $window = $(window);
       var $sidebar = $(".tutorial-accord"); // Внутренний контейнер сайдбара
       var $sidebarTop = $sidebar.position().top;  // Позиция Сайдбара от верха экрана
       
       var $footer = $('.footer');
       var $footerTop = $footer.position().top;

       const availableScreenWidth = window.screen.availWidth;

       if(availableScreenWidth >= 1200) {
            $window.scroll(function(event) { // Объявляем событие Scroll, чтобы отслеживать сразу все изменения в прокрутке

                // Следующие переменные объявляем именно внутри функции Scroll
                var $scrollTop = $window.scrollTop(); // позиция прокрутки от верха экрана
                var $sidebarWrapper = $('.tutorial__sidebar'); // Внешний контейнер Сайдбара
                var $sidebarHeight = $sidebarWrapper.height(); // Высота внешнего контейнера Сайдбара (должна приравниваться высоте правого содержимого!)
                
                // Если нужно, чтобы Сайдбар начинал плавать не сразу при скролле, а после какого-то промежутка,
                // то пишем условие отступа от верха экрана
                if( $scrollTop >= 300) { // т.е. только в случае, когда отскроллил от верха на 300px, фиксируем внутренний контейнер Сайдбара
                    $sidebar.addClass("fixed");
                }            
                
                //Устанавливаем Топ позицию Сайдбара - выбираем что больше: заданное число (118px), или разница (Верхняя позиция Сайдбара минус отскролливание от верха)
                var $topPosition = Math.max( 0, $sidebarTop - $scrollTop);
                // console.log($footerTop);
                // console.log($scrollTop);
                // console.log($sidebarHeight);
                // console.log($topPosition);
                
                // Для того, чтобы Сайдбар остановился, когда мы доскроллили до самого футера,
                // вначале определим новую Позицию Сайдбара
                // Вычитаем из Отскролливания высоту сайдбара, а затем - отступ от верха до футера

                var newTopPosition = $scrollTop - $sidebarHeight - $footerTop;
                // console.log(newTopPosition);

                // Если Сумма (отскролливание от верха + Позиция от верха) становится больше, чем высота сайдбара
                // Другими словами, когда мы подходим к футеру
                // Переопределяем Топ позицию - берём меньшее число из (Топ позиция начальная или Разность)
                if ( ($scrollTop + $topPosition) > $sidebarHeight ) {
                    $topPosition = Math.min($topPosition, newTopPosition);                         
                } 
                console.log($topPosition);

                $sidebar.css("top", $topPosition); // Устанавливаем сам плавающий Сайдбар                
            });
       }
    }); 
});