<!-- any folder a jao.check koro -->
nod --v
npm --v
npx --v
powershel or visual cmd use koro
language :javaScript
package :Npm
Ui framework :none
Module :Axios
frame work :none
mode :Universal
target :Server
git hub user :Git
Are You inserting in participarion :no

Server Running command
npm run dev

npm install bulma
npm install sass-loader node-sass --sass-dev

https://nuxtjs.org/guides/get-started/installation
npx create-nuxt-app project-name

<!-- index -->
 <img src="/images/abc.png"> from static folder
 <img src="~/assets/img/abc.png">
 <!-- nuxt.config.js -->
   css: [
    // '~/assets/css/style.css',
    '@/assets/css/style.css'
  ],

https://github.com/nuxt-community/axios-module er danpase "axios.nuxtjs.orgaxios.nuxtjs.org" click koro

 https://axios.nuxtjs.org/setup
npm install @nuxtjs/axios --save
//nuxt.config.js a giye
 modules: [
    '@nuxtjs/axios',
  ],
  axios: {
    baseURL:'http://127.0.0.1:8000/api',
    credentials:true    
    <!-- credentials:true na dileo hoy -->
  },

  http request handle
  https://github.com/fruitcake/laravel-cors
  composer require fruitcake/laravel-cors

 app/Http/Kernel.php class:
protected $middleware = [
  \Fruitcake\Cors\HandleCors::class,
    // ...
];

php artisan vendor:publish --tag="cors"


config/cors.php
and make 'supports_credentials' => true,


<?php

return [

   
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,


];
