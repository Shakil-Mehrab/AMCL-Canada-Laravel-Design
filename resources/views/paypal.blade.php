https://github.com/srmklive/laravel-paypal
////////install
composer require srmklive/paypal:~1.0

Srmklive\PayPal\Providers\PayPalServiceProvider::class
'PayPal' => Srmklive\PayPal\Facades\PayPal::class

php artisan vendor:publish --provider "Srmklive\PayPal\Providers\PayPalServiceProvider"



return [
    'mode'    => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', ''),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', ''),
        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', ''),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
        'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
    ],
    'live' => [
        'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
        'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
        'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
        'app_id'      => '', // Used for Adaptive Payments API
    ],

    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => 'USD',
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => true, // Validate SSL when creating api client.
];














Add this to .env.example and .env
#PayPal Setting & API Credentials - sandbox
PAYPAL_SANDBOX_API_USERNAME=
PAYPAL_SANDBOX_API_PASSWORD=
PAYPAL_SANDBOX_API_SECRET=
PAYPAL_SANDBOX_API_CERTIFICATE=

#PayPal Setting & API Credentials - live
PAYPAL_LIVE_API_USERNAME=
PAYPAL_LIVE_API_PASSWORD=
PAYPAL_LIVE_API_SECRET=
PAYPAL_LIVE_API_CERTIFICATE=

Usage
Following are some ways through which you can access the paypal provider:

// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

$provider = new ExpressCheckout;      // To use express checkout.
$provider = new AdaptivePayments;     // To use adaptive payments.

// Through facade. No need to import namespaces
$provider = PayPal::setProvider('express_checkout');      // To use express checkout(used by default).
$provider = PayPal::setProvider('adaptive_payments');     // To use adaptive payments.

Override PayPal API Configuration
You can override PayPal API configuration by calling setApiCredentials method:

$provider->setApiCredentials($config);

Set Currency
By default the currency used is USD. If you wish to change it, you may call setCurrency method to set a different currency before calling any respective API methods:

$provider->setCurrency('EUR')->setExpressCheckout($data);

Additional PayPal API Parameters
By default only a specific set of parameters are used for PayPal API calls. However, if you wish specify any other additional parameters you may call the addOptions method before calling any respective API methods:

$options = [
    'BRANDNAME' => 'MyBrand',
    'LOGOIMG' => 'https://example.com/mylogo.png',
    'CHANNELTYPE' => 'Merchant'
];

$provider->addOptions($options)->setExpressCheckout($data);
Warning: Any parameters should be referenced accordingly to the API call you will perform. For example, if you are performing SetExpressCheckout, then you must provide the parameters as documented by PayPal for SetExpressCheckout to addOptions method.


Express Checkout
$data = [];
$data['items'] = [
    [
        'name' => 'Product 1',
        'price' => 9.99,
        'desc'  => 'Description for product 1'
        'qty' => 1
    ],
    [
        'name' => 'Product 2',
        'price' => 4.99,
        'desc'  => 'Description for product 2',
        'qty' => 2
    ]
];

$data['invoice_id'] = 1;
$data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
$data['return_url'] = url('/payment/success');
$data['cancel_url'] = url('/cart');

$total = 0;
foreach($data['items'] as $item) {
    $total += $item['price']*$item['qty'];
}

$data['total'] = $total;

//give a discount of 10% of the order amount
$data['shipping_discount'] = round((10 / 100) * $total, 2);

SetExpressCheckout

$response = $provider->setExpressCheckout($data);

// Use the following line when creating recurring payment profiles (subscriptions)
$response = $provider->setExpressCheckout($data, true);

 // This will redirect user to PayPal
return redirect($response['paypal_link']);

GetExpressCheckoutDetails

$response = $provider->getExpressCheckoutDetails($token);