Для запуска скрипотв из консоли TimeWeb:
    `alias php='/opt/php71/bin/php'`
 
Для получения изменений из Гита:
    `git pull origin master`
    
Для запуска сервера:
    `npm run watch`
    
Если есть проблемы с памятью при запуске в консоли:
    `php -d memory_limit=-1 composer.phar require laravel/passport`        