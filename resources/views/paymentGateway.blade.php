//service container

Route::get('/pay',[PayOrderController::class,'store']);
<?php

namespace App\Http\Controllers;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use App\Models\Product;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails,PaymentGatewayContract $paymentGateway){
        $order=$orderDetails->all();
        dd($paymentGateway->charge(2500));
    }

}


<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;
class OrderDetails
{
    private $paymentGateway;
    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway=$paymentGateway;
    }
    public function all(){
        $this->paymentGateway->setDiscount(500);
        return[
            'name'=>'vector',
            'address'=>'malibag 34t srt',
        ];
    }
}

<?php

namespace App\Billing;

interface PaymentGatewayContract
{
    public function setDiscount($amount);
    public function charge($amount);


}


<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChanelsComposer;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{


    public function register()
    {
        //serviece container
        $this->app->singleton(PaymentGatewayContract::class,function($app){
            if(request()->has('credit')){
                return new CreditPaymentGateway("USD");
            }
            return new BankPaymentGateway("USD");
        });
    }
    public function boot()
    {
        
    }
}

<?php

namespace App\Billing;
use Illuminate\Support\Str;
class CreditPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency=$currency;
        $this->discount=0;

    }
    public function setDiscount($amount){
        $this->discount=$amount;
    }
    public function charge($amount){
        $fees=$amount*.03;
        return[
            'amount'=>$amount-$this->discount+$fees,
            'confirmarion_number'=>Str::random(),
            'currency'=>$this->currency,
            'discount'=>$this->discount,
            'fees'=>$fees,


        ];
    }
}


<?php

namespace App\Billing;
use Illuminate\Support\Str;
class BankPaymentGateway implements PaymentGatewayContract
{
    private $currency;
    private $discount;

    public function __construct($currency)
    {
        $this->currency=$currency;
        $this->discount=0;

    }
    public function setDiscount($amount){
        $this->discount=$amount;

    }
    public function charge($amount){
        return[
            'amount'=>$amount-$this->discount,
            'confirmarion_number'=>Str::random(),
            'currency'=>$this->currency,
            'discount'=>$this->discount,
        ];
    }
}
