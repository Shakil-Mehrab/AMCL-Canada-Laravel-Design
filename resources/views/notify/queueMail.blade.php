//laravel queue
php artisan queue:table
php artisan migrate
//eta run na krle kaj krbe na
php artisan queue:work --queue=high,default
//config/queue
'default' => env('QUEUE_CONNECTION', 'database'),
//env
QUEUE_CONNECTION=database
{{-- QUEUE_DRIVER=database --}}
//controller
use App\Mail\NewPostEmail;
use App\Jobs\NewPostEmailQueue;
use Carbon\Carbon;

 foreach($users as $user){

    $job=(new NewPostEmailQueue($product,$user))
        ->delay(Carbon::now()->addSeconds(5));
    dispatch($job);
} 
//NewPostEmailQueue
use App\Mail\NewPostEmail;
use Mail;
use App\Model\Product;
use App\User;


public $product;
public $user;
public function __construct(Product $product,User $user)
{
    $this->product=$product;
    $this->user=$user;  
}   
public function handle()
{
    Mail::to($this->user->email)->send(new NewPostEmail($this->product));
}


//NewPostEmail
use Queueable, SerializesModels;
protected $submit_properties;


public function __construct($submit_properties)
{
    $this->submit_properties=$submit_properties;
    
}
public function build()
{
    return $this->view('admin.includes.message.NewPostEmail')->with([
        "product"=>$this->submit_properties
    ])->subject("New Product Has been Created");
}	
}

//admin.includes.message.NewPostEmail

<h4><strong>{{$product->user->name}}</strong> has created <strong><a href="{{route('single-product.show',$product->id)}}"> {{$product->name}}</a></strong></h4>
<h4><a href="{{route('single-product.show',$product->id)}}">Click Here to See The Post</a></h4>

 
//eta run krte hobe(npm watch er moto kaj kore)
php artisan queue:work --queue=high,default




//sync change krle count kaj kore na;
tobe sync a  QUEUE_DRIVER=database r  QUEUE_CONNECTION=sync use dekhte hobe
