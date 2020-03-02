APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:RLbxY6YkaUm+OAbdi+kjBSPnQAww5GE5U9Na8Cb+yHo=
APP_DEBUG=true
APP_URL=http://hatirpal.com

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sagoreweb
DB_USERNAME=Shakil	
DB_PASSWORD=01742214318

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=mail
MAIL_HOST=sg2plcpnl0176.prod.sin2.secureserver.net
MAIL_PORT=465
MAIL_USERNAME=director@hatirpal.com
MAIL_PASSWORD=01742214318#Sim
MAIL_ENCRYPTION=SSL

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

ALGOLIA_APP_ID=UC0KZSVCQB
ALGOLIA_SECRET=96d5c2f067de58ce563457f4371d29fd



//config mail
<?php

return [
    'driver' => env('MAIL_DRIVER', 'mail'),
    'host' => env('MAIL_HOST', 'sg2plcpnl0176.prod.sin2.secureserver.net'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'director@hatirpal.com'),
        'name' => env('MAIL_FROM_NAME', 'admin.hatirpal'),//name Shown In gmail.example: admin.hatirpal has confirm Your Order
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'SSL'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
