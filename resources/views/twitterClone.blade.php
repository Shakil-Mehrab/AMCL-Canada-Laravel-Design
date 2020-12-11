https://readouble.com/laravel/7.x/en/airlock#:~:text=Introduction,API%20tokens%20for%20their%20account.

composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

'api' => [
    EnsureFrontendRequestsAreStateful::class,
    'throttle:60,1',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
}
move user.php to models.change user directory in auth.config and Auth/RegisterController
in controller for auth
public function __construct()
{
    $this->middleware('auth:sanctum');

}
.env
stateful=127.0.0.1:8000
domain =.8000
SESSION_DRIVER=cookie //find it contains file.change it by cookie
resources/js/bootstrap.js
windoe.axios.defaults.withCredentials = true;  //npm run watch koro

php artisan make:resource TweetCollection --collection

https://tailwindcss.com/
npm install tailwindcss

app.scss
@tailwind base;
@tailwind components;
@tailwind utilities;
<!-- webpack.mix.js -->
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss','public/css')
.options({
    processCssUrls:false,
    postCss:[
        tailwindcss('./tailwind.config.js')
    ]
})

npx tailwind init //etar madhome tailwind.config.js make hoy sekhane nicher code
module.exports = {
  future: {

  },
  purge: [],
  theme: {
    screens:{
        'md': '640px',
        'lg': '768px',
        'xl': '1024px',
    },
    extend: {},
  },
  variants: {},
  plugins: [],
}

https://github.com/Akryum/vue-observe-visibility
npm install vue-observe-visibility
app.js
import VueObserveVisibility from 'vue-observe-visibility'
Vue.use(VueObserveVisibility)


https://beyondco.de/docs/laravel-websockets/getting-started/installation
composer require beyondcode/laravel-websockets
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"
php artisan migrate
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"

config/app
App\Providers\BroadcastServiceProvider::class,//eta ache only uncomment korte hobe
config/broadcast
 'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted'=>true,
                'host'=>'127.0.0.1',
                'port'=>6001,
                'scheme'=>'http'
            ],
.env
PUSHER_APP_ID=local
PUSHER_APP_KEY=local
PUSHER_APP_SECRET=local
PUSHER_APP_CLUSTER=mt1

 composer require pusher/pusher-php-server
php artisan websockets:serve

resource/ja/bootstrap.js
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'local',
    // cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    // forceTLS: true
    encrypted: false,
    disableStats: true,
    wsHost: window.location.hostname,
    wsPort: 6001
});

npm install --save laravel-echo pusher-js

even
php artisan make:event Tweets/TweetWasCreated //ekhane jao and tweet sroe te call koro and sotore koro r nicher link a api-message dekho
http://localhost:8000/laravel-websockets

https://github.com/sschoger/heroicons-ui
svg/icon-repeat/embaded code icon a click koro r loofe nao

https://www.npmjs.com/package/vue-click-outside


<!-- progress bar korar, over writing red korar jonno -->
https://tailwindcss.com/docs/plugins#complex-variants ///tailwind a giye complex variant likhe search dao and go to tailein.config
again search 

media upload
https://github.com/spatie/laravel-medialibrary
https://spatie.be/docs/laravel-medialibrary/v7/installation-setup

composer require "spatie/laravel-medialibrary:^7.0.0"
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="migrations"
php artisan migrate
config/filesystem

        'public' => [
            'driver' => 'local',
            'root' => public_path('media'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
config/medialibrary
use App\Media\Media;
'media_model' =>Media::class,
'max_file_size' => 1024 * 1024 * 100,//this is 100 MB.by default 10MB.its for video upload

https://github.com/euvl/vue-js-modal
http://vue-js-modal.yev.io/
    npm install --save vue-js-modal
    import vmodal from 'vue-js-modal'
    Vue.use(VModal, {
    dynamic: true,
    injectModalsContainer: true,
    dynamicDefaults: {
        pivotY: 0.1,
        height: 'auto',
        classes: '!bg-gray-900 rounded-lg p-4'
    }
})