<!-- any folder a jao.check koro -->
nod --v
npm --v
npx --v ///eta npm install er sathe auto install hoy
powershel or visual cmd use koro
https://nuxtjs.org/guides/get-started/installation
npx create-nuxt-app project-name

language :javaScript
package :Npm
Ui framework :none
Module :Axios
linting tool: select na kore enter taile faka
frame work :none
mode :Universal
target :Server
deployment tools:config json
integration :none
control syste :noe
git hub user :Git
Are You inserting in participarion :no
user name : none only enter prees koro

Server Running command
npm run dev

<!-- index -->
 <img src="/images/abc.png"> from static folder
 <img src="~/assets/img/abc.png">
 <!-- nuxt.config.js -->
   css: [
    // '~/assets/css/style.css',
    '@/assets/css/style.css'
  ],

<!-- nuxt .scss support -->
npm install bulma
npm install sass-loader node-sass --sass-dev

<!-- nuxt a kaj koro -->
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

<!-- jwt auth -->
login er jonno jwt auth file dekho

<!-- laravel folder a ka koro.nuxt a click korle jate request kaj kore sejonno cors-->
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


//nuxt a kaj koro. query stringw etar dara cart total changed value dekhano hoy
https://github.com/sindresorhus/query-string
npm install query-string --save
import queryString from 'query-string'
cart.js
 async getCart({ commit,state }){
    let query = {}
    if(state.shipping){
      query.shipping_method_id = state.shipping.id
    }
    let response= await this.$axios.$get(`cart?${queryString.stringify(query)}`)
    watch: {
    shippingMethodId(){
      this.getCart()
    }
  },
  methods: {
    ...mapActions({
      setShipping:'cart/setShipping',
    }),
  },

// laravel a kaj koro
  EventServiceProvider
  protected $listen = [
        'App\Events\OrderCreated' => [
            'App\Listeners\Order\EmptyCart',
        ],
    ];
    uporer $listen thik kore nicher command
  event generate
  php artisan event:generate

