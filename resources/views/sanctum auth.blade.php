54    mn use sanctum
https://laravel.com/docs/8.x/sanctum
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
//app/Http/Kernel.php file:
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],


<!-- for config/session go to .env-->
SESSION_DOMAIN='localhost'
APP_URL=http://localhost:8000
<!-- for config/sanctum go to .env-->
SANCTUM_STATEFUL_DOMAINS=localhost:3000
<!-- for config/cors-->
'paths' => ['/', 'api/*', 'login', 'register', 'sanctum/csrf-cookie'],
'supports_credentials' => true,

https://auth.nuxtjs.org/
pm install --save-exact @nuxtjs/auth-next
 modules: [
    '@nuxtjs/auth-next'
  ],
auth: {
    strategies: {
      laravelSanctum: {
        provider: "laravel/sanctum",
        url: "http://localhost:8000",
        endpoints: {
          login: {
            url: "/api/auth/login"
          }
        }
      }
    }
  },

axios: {
    baseURL: 'http://localhost:8000',
    credentials: true
  },



Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', 'Auth\RegisterController@action');
    Route::post('/login', 'Auth\LoginController@action');
    Route::get('/me', 'Auth\MeController@action');
});


<?php
namespace App\Http\Controllers\Authenticate;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use App\Http\Requests\Authenticate\RegisterRequest;
class RegisterController extends Controller
{
    public function action(RegisterRequest $request){
         $user=User::create($request->only('email','name','password'));
         return new PrivateUserResource($user);
    }
}

<?php
namespace App\Http\Controllers\Authenticate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
use App\Http\Requests\Authenticate\LoginRequest;
class LoginController extends Controller
{
    public function action(LoginRequest $request){
        if(!$token = auth()->attempt($request->only(['email','password']))){
            return response()->json([
                'errors'=>[
                    'email'=>['Could not singn you in with those details']
                ]
                ],422);
        }
        return (new PrivateUserResource($request->user()))
        ->additional([
            "meta"=>[
                "token"=>$token
            ]
        ]);
    }
}



<?php
namespace App\Http\Controllers\Authenticate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateUserResource;
class MeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api']);
    }
    public function action(Request $request){
        return new PrivateUserResource($request->user());
    }
}





// logout
inspect/Application/Local Storage theke key gulo delete koro
then niche cookies theke o delete koro; 






