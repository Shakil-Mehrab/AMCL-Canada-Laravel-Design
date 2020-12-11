https://jwt-auth.readthedocs.io/en/develop/laravel-installation/
composer require tymon/jwt-auth
php artisan jwt:secret

<!-- .env -->
JWT_SECRET=tvHEAqhJqrAfPd2AWVCsIRLGAP0iI2i1qoCWbpgDeAtInI01pMmk1253ECR7J53L
JWT_TTL=3000

<!-- config/auth -->
'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],
  'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

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


https://github.com/nuxt-community/auth-module
https://auth.nuxtjs.org/guide/setup.html
npm install @nuxtjs/auth --save
// nuxt package.json
    "@nuxtjs/auth": "^4.9.1",
// nuxt.config.js
modules: [
    '@nuxtjs/axios',
  ],
auth: {
  strategies:{
    local:{
      login:{
        url: 'auth/login',
        method: 'post',
        propertyName:'meta.token'
      },
      user:{
        url: 'auth/me',
        method: 'get',
        propertyName:'data'
      }
    }
  }
},


// logout
inspect/Application/Local Storage theke key gulo delete koro
then niche cookies theke o delete koro; 






// compare
<ProductVariation
    v-for="(variations, type) in product.variations"//product.variatins type a joma hoy.type er vitorta abar varitions a joma hoy
    :type="type"
    :variations="variations"
    :key="type"
    v-model="form.variation"
/>
 data(){
    return{
      product:null,//ekahane single tai null or ''
      form:{
        variation:'',
        quantity: 1
      }
    }
  }, 
  async asyncData({params,app}) {
    let response = await app.$axios.$get(`products/${params.slug}`)
    return{
      product:response.data
    }
  },

<div class="column is-3" v-for="product in products" :key="product.slug">
    <Product :product="product" />
</div>
data(){
    return{
      products : [] //ekhane array
    }
  },

async asyncData({params,app}) {
    let response = await app.$axios.$get(`products?category=${params.slug}`)//laravel a products?category=food ja ekhane categories/food ta
    return{
      products : response.data
}