

### Install

Requirements - https://laravel.com/docs/7.x/installation#server-requirements

* Клонируем репозиторий
    ```bash
    git clone https://github.com/petrrrnikitin/AdAurum-test-task.git
    cd AdAurum-test-task
    rm -rf .git
    ```
* Устанавливаем зависимости
    ```bash
    composer install
     
    ```
 * Устанавливаем зависимости node_modules
     ```bash
     npm install
      
     ```
  * Компилируем файлы на всякий случай зависимости
      ```bash
      npm run dev
       
      ```
   
### Setting
* Переименовываем `.env.example` в `.env`
* Настраниваем `.env` (соединение с БД)
* Генерируем ключ, выполняем миграцию, заполняем БД ...
    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    ```
* На всякий случай обновляем конфигурацию и зависимости
    ```bash
    composer dumpautoload
    php artisan config:cache
    ```

### Run
* Запускаем сервер
    ```bash
    php artisan serve
    ```
* Открываем браузер по ссылке `http://localhost::8000`


