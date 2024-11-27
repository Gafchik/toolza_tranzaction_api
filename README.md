Создать базу данных mysql имя схемы = toolza_tranzaction_api

создать в ней пользователя = zhenya
дать пользовтелю гранты CRUD

создать .env
в .env проставить

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Xkd9V4gnCfBQE+stQQIQo8Rs2lfyDgVpq8sUeOz2ee4=
APP_DEBUG=false
APP_URL=имя домена

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=порт на котором бд дефолт 3306
DB_DATABASE=toolza_tranzaction_api
DB_USERNAME=zhenya
DB_PASSWORD=тот который создали

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

версия  php 8.2.16
запуск команды composer install
если не получаеться удалить файл composer.lock
запустить php artisan key:generate
запуск php artisan migrate
php artisan serve если запус на локалке

если совсем все плохо с разворотом то можна потестить на
домен 
https://toolza-tranzaction-api.dichajeka1.online
ендпоинты
/api/balance/1
/api/transactions (post)
{
    "user_id": 1,
    "amount": 5,
    "type_id": 2,
    "description": "test"
}
/api/transactions (get) с json
{
    "user_id": 1,
    "date_from": "2024-11-27",
    "type_id": 1,
    "date_to": "2024-11-27"
}

DEPOSIT = 1;
WITHDRAWAL = 2;