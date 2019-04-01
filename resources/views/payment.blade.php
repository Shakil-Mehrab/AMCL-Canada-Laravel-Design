composer require braintree/braintree_php
//Provider 
php artisan make:provider BraintreeServiceProvider
//link
https://sandbox.braintreegateway.com/login?_ga=2.220208344.1538192229.1550950994-580482445.1550950994

ehane giye account/myuser/apikeys/generateapikeys

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BraintreeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Braintree_Configuration::environment(env('BRAINTREE_ENV'));
        \Braintree_Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
        \Braintree_Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        \Braintree_Configuration::merchantID(env('BRAINTREE_MERCHANT_ID'));

        
    }
}
//config /app
 App\Providers\BraintreeServiceProvider::class,
//.env
BRAINTREE_ENV=sandbox
BRAINTREE_PRIVATE_KEY=45c62191b8153862dd502e53dc89ca73
BRAINTREE_PUBLIC_KEY=jn9zb6zt4m8vf6tt
BRAINTREE_MERCHANT_ID=qg8n3yvkrbzxdv87

    

//link
https://www.npmjs.com/package/braintree-web    
npm install braintree-web  --save  // --save nije add koro
npm run dev
npm run watch
// header er vitore
    <script>
        window.Laravel={!! json_encode([
              "csrfToken"=>csrf_token(),

        ]) !!};
    </script>    
 // View file
  <template>
     <form method="post" v-if="loaded">
        <button>Complete</button>                  
        <input type="hidden" name="_token" v-bind:value="csrfToken">       
    </form>
</template>

<script>
    export default {
        data() {
        return {
            loaded: true,
            csrfToken: window.Laravel.csrfToken
        }
    },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>
// package.json
 "braintree-web": "^2.*"
after changing it agaain install "npm install"
// rewource js/app.js 
<example-component></example-component>    
//controllwe
 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrainTreeController extends Controller
{
    public function token()
    {
        return response()->json([
         'data'=>[
           'token'=>\Braintree_ClientToken::generate(),
         ]
        ]);
    }
}
//route 
Route::get('/braintree/token','BrainTreeController@token');

//error solve
https://curl.haxx.se/ca/cacert.pem
link a gele file download hobe>>
C:\wamp64\bin\php\php7.2.10\extras\ssl 
te gigye paste koro file ti.
//C:\wamp64\bin\php\php7.2.10>>php.ini te giye nicher line ti likho rectangle kore komar niche;
curl.cainfo = "C:\wamp64\bin\php\php7.2.10\extras\ssl\cacert.pem"


//search dhow korano .upore uploar posrtion.ekhn searching
input text file banao
//again run watch
npm run watch

//git hub a jao
 https://github.com/algolia/autocomplete.js
https://github.com/algolia/algoliasearch-client-javascript
    

//Cart
https://github.com/Crinsane/LaravelShoppingcart





// stripe 
https://stripe.com/docs/stripe-js/elements/quickstart

var stripe = Stripe('pk_test_fGfESu6N4AaCeRd42jE15qiz');
var elements = stripe.elements();
ekhane giye sign in
thenback kore 4 step script er vit0r bosate hobe
 orekta js filer vitor rakhte pari   
//warning
      <div id="app">
        <div class="container">
    
        </div>
    </div>  
    <br><br>  
uporer ongsota use kora jabe na    
    
    
    
    
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>pay</title>
<script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    
    
<h2>make your payment</h2>
<form action="/stripe-store" method="post" id="payment-form">
  {{csrf_field()}}
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display Element errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>


<script>
var stripe = Stripe('pk_test_fGfESu6N4AaCeRd42jE15qiz');
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#32325d",
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

  </body>
</html>