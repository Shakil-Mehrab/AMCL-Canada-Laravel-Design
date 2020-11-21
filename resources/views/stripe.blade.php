https://github.com/stripe/stripe-php
composer require stripe/stripe-php

<!-- confiv/service -->
'stripe' => [
    // 'model' => App\Models\User::class,
    // 'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
],

<!-- .env from       https://dashboard.stripe.com/test/apikeys or developers option -->
STRIPE_SECRET=sk_test_pFdhSMmPzJBC2c5YIG4RBXfL

<?php
namespace App\Providers;
use Stripe\Stripe;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }
    public function register()
    {
         $this->app->singleton(Gateway::class, function(){
            return new StripeGateway();
        });
    }
}
Payment method controller
<?php
namespace App\Http\Controllers\PaymentMethods;
use Illuminate\Http\Request;
use App\Cart\Payments\Gateway;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Requests\PaymentMethodStoreRequest;
class PaymentMethodController extends Controller
{
    public function __construct(Gateway $gateway)
    {
        $this->middleware(['auth:api']);
        $this->gateway=$gateway;
    }
    public function index(Request $request){
        return PaymentMethodResource::collection($request->user()->paymentMethods);
    }
    public function store(PaymentMethodStoreRequest $request){
        // dd($this->gateway);
        $card=$this->gateway->withUser($request->user())
            ->createCustomer()
            ->addCard($request->token);
        return new PaymentMethodResource($card);
    }
}


app/Cart Payments
<?php
namespace App\Cart\Payments;
use App\Models\User;
interface Gateway
{
    public function withUser(User $user);
    public function createCustomer();
}
<?php
namespace App\Cart\Payments;
use App\Models\PaymentMethod;
interface GatewayCustomer
{
    public function charge(PaymentMethod $cart,$amount);
    public function addCard($token);
    public function id();
}
<?php
namespace App\Cart\Payments\Gateways;
use App\Models\User;
use App\Cart\Payments\Gateway;
use App\Cart\Payments\Gateways\StripeGatewayCustomer;
use Stripe\Customer as StripeCustomer;
class StripeGateway implements Gateway
{
    protected $user;
    public function withUser(User $user){
        $this->user=$user;
        return $this;
    }
    public function user(){
        return $this->user;
    }
    public function createCustomer(){
        if($this->user->gateway_customer_id){
            return $this->getCustomer();
        }
        $customer=new StripeGatewayCustomer(
            $this,$this->createStripeCustomer()//$this ki?????????? ekhane logged user data dekhay
        );
        // dd($customer->id()); unique id ferot dey
        $this->user->update([
            'gateway_customer_id'=>$customer->id()
        ]);
        return $customer;
    }
    protected function getCustomer(){
        return new StripeGatewayCustomer(
            $this, StripeCustomer::retrieve($this->user->gateway_customer_id)//$this ki?????????? ekhane logged user data dekhay
        );
    }
    protected function createStripeCustomer(){
        return StripeCustomer::create([
            'email'=>$this->user->email,
        ]);
    }
}
<?php

namespace App\Cart\Payments\Gateways;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Cart\Payments\Gateway;
use App\Cart\Payments\GatewayCustomer;
use Stripe\Customer as StripeCustomer;
class StripeGatewayCustomer implements GatewayCustomer
{
    protected $gateway;
    protected $customer;
    public function __construct(Gateway $gateway,StripeCustomer $customer)
    {
        $this->gateway=$gateway;
        $this->customer=$customer; ///email geche muloto
    }
    public function charge(PaymentMethod $card,$amount){
    }
    public function addCard($token){
        $card=$this->customer->sources->create([
            'source'=>$token,
        ]);
        $this->customer->default_source=$card->id;//this line is for stripe for making default method for default=true one
        $this->customer->save();
        return $this->gateway->user()->paymentMethods()->create([
            'provider_id'=>$card->id,
            'card_type'=>$card->brand,
            'last_four'=>$card->last4,
            'default'=>true
        ]);
    }
    public function id(){
       return $this->customer->id;
    }
}



post man
POST:http://localhost:8000/api/payment-methods
body: tok_visa


https://stripe.com/docs/api/customers/update
ekhane giye customers default source paoa jay;

$this->customer->default_source=$card->id;//this line is for stripe for making default method for default=true one
$this->customer->save();





// nuxt
composer require stripe/stripe-php ***eta may be lagbena.cz link use krchi.nuxt script** 
https://dashboard.stripe.com/test/apikeys
nuxt.config.js  

https://stripe.com/docs/checkout/integration-builder
script:[
  {src:'https://js.stripe.com/v3/'}
]

<template>
 <form action="#" @submit.prevent="store">
   <div class="field">
     <div id="card-element"></div>
   </div>
   <div class="field">
     <p class="control">
       <button class="button is-info" :disabled="storing">
        Store Card
       </button>
       <a href="#" class="button is-text" @click.prevent="$emit('cancel')">Cancel</a>
     </p>
   </div>
 </form>
</template>
<script>
export default {
  data() {
    return {
      stripe:null,
      card:null,
      storing:false
    }
  },
  methods: {
    async store(){
      this.storing = true
      const{token, error} = await this.stripe.createToken(this.card)
      if(error){

      }else{
       let response = await this.$axios.$post('payment-methods',{
         token:token.id
       })
       this.$emit('added', response.data)
      }
       this.storing=false
    }
  },
 mounted() {
    // https://dashboard.stripe.com/test/apikeys
   const stripe = Stripe('pk_test_fGfESu6N4AaCeRd42jE15qiz')//Publishable key
   this.stripe=stripe
   this.card=this.stripe.elements().create('card',{
     style:{
       base:{
         fontSize:'16px'
       }
     }
   })
   this.card.mount('#card-element')

 },
}
</script>

// testing link.i mean visa,master card etc
https://stripe.com/docs/testing