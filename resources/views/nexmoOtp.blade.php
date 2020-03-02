https://dashboard.nexmo.com/getting-started-guide
composer require nexmo/laravel
'providers' 
Nexmo\Laravel\NexmoServiceProvider::class,
'aliases' 
    'Nexmo' => Nexmo\Laravel\Facade\Nexmo::class,
php artisan vendor:publish
//.env
NEXMO_KEY=my_api_key
NEXMO_SECRET=my_secret

//register
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\SendCode;
class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/verify';
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request,$user) ?: redirect('/verify?phone='.$request->phone);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],
            'code_id' => ['required', 'integer'],
            'district_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
       $user=User::create([
            'name' => $data['name'],
            'country_id' => $data['country_id'],
            'countrycode_id' => $data['code_id'],
            'district_id' => $data['district_id'],
            'city_id' => $data['city_id'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
         if($user){
            $user->code=SendCode::sendCode($user->phone);
            $user->save();
        }
    }

}


//login
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\SendCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutResponse($request);
        }
               if($this->guard()->validate($this->credentials($request))){
                $user=$this->guard()->getLastAttempted();
                if($user->active && $this->attemptLogin($request)){
                    return $this->sendLoginResponse($request);
                }
              
               else{
                $this->incrementLoginAttempts($request);
                $user->code=SendCode::sendCode($user->mobile_no);
                if($user->save()){
                    return redirect('/verify?phone='.$user->mobile_no);
                }
               }
               }
       $this->incrementLoginAttempts($request);
       return $this->sendFailedLoginResponse($request);

    }
}



//SendCode
namespace App;
class SendCode
{
public static function sendCode($phone){
    $code=rand(1111,9999);
    $nexmo = app('Nexmo\Client');
    $nexmo->message()->send([
        'to'   => '+880'.(int)$phone,
        'from' => 'hatirpal.admin',
        'text' => 'Verify Code:'.$code,
    ]);
    return $code;
  }
}



//otp vdrify page
<!DOCTYPE html>
<html>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
   <p class="login-box-msg"><span style="font-size:25px;color:orange">Enter varification Code</span></p>
    <form action="{{route('verify')}}" method="post">
        @csrf
      <div class="form-group{{ $errors->has('code') ? ' is-invalid' : '' }} has-feedback">
        <input type="text" class="form-control" id="code" name="code" placeholder="Otp Code" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
         @if ($errors->has('code'))
            <span class="invalid-feedback" role="alert">
                <strong style="color:red">{{ $errors->first('code') }}</strong>
            </span>
        @endif              
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Verify</button>
        </div>
      </div>
    </form>
       <br>
    <a href="/verify" class="text-center"><span style="font-size:15px">Resend Code</span></a>
  </div>
</div>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
