Laravel
	Composer install
Laravel.com>>composer>>download>>install
	Composer install check
C:\Users\mehra>cd/
C:\>cd xampp/htdocs
C:\wamp64\www>composer
	Laravel install:
composer create-project --prefer-dist laravel/laravel Laravel “5.1.*”
	Create folder
     1)composer create-project laravel/laravel --prefer-dist
2)composer create-project  --prefer-dist laravel/laravel enrolment
	Open folder
C:\Users\mehra>cd/
C:\>cd xampp/htdocs
C:\xampp\htdocs>cd enrolment
C:\xampp\htdocs\enrolment>
	Server on
 php artisan serve
(localhost:8000)
	Create controller
Composer require “laravelcollective/html”:”^5.3.0”
//eta specialilly defind controller make korbe
Php artisan make:controller AdminController
	Table create 
Php artisan make:migration creatae_admin_tbl_table  --create=admin_tbl
	Add a column to a table
php artisan make:migration add_admin_column_to_users --table=users
       $table->string('photo')->default('default.jpg')->after(‘last-name’);
        $table->dropColumn('photo');

	Migration
Php artisan migrate
	Model create 
php artisan make:model Product -m -c -r
php artisan make:model Product  -a
	middleware create 
php artisan make:middleware Admin
	Auth
php artisan make:auth
	
	Notification table
php artisan notifications:table
	Nofification replied
php artisan make:notification RepliedToThread
	Install for shopping caet
composer require gloudemans/shoppingcart
install er por
 ‘aliases’  a=>ekta copy korbo
 ‘collective  a=>ekta copy korbo
	Recapcha
https://github.com/anhskohbo/no-captcha
https://www.google.com/recaptcha/admin#list
	mailing
https://mailtrap.io/inboxes/413802/messages
choose “demo index>integration>Laravel>just copy username and password and pase to .env
	https://github.com/ifightcrime/bootstrap-growl
           https://github.com/craigh411/vue-star-rating
	Migrate problem fixing
'charset' => 'utf8',
         'collation' => 'utf8_unicode_ci',

	Admin Auth making
	Config/auth
               'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admins',
        ],



'admins' => [
        'driver' => 'eloquent',
        'model' => App\Admin::class,
    ],

  'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 15,],
Controller:Auth\AdminLoginController
Route:

Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


Admin loginpage
Php artisan tinker
$admin =new App\Admin
$admin->name=”Shakil Mehrab”
$admin->email=”Shakil Mehrab”
$admin->job_title=”Shakil Mehrab”
$admin->password=Hashmake(”123456”)
$admin->save():


Middleware/redirect
public function handle($request, Closure $next, $guard = null)
    {
        
        switch ($guard){
            case 'admin':
             if(Auth::guard($guard)->check()) {
                 return redirect()->route('admin.dashboard');
             }
            break;
 
            default:
              if (Auth::guard($guard)->check()) {
               return redirect('/home');
             }
            break;
        }
        return $next($request);
    }








Lv/frm/src/Illu/foundation/exception/handler

protected function unauthenticated($request, AuthenticationException $exception)
    {
       if($request->expectsJson()){
        return response()->json(['message' => $exception->getMessage()], 401);
       }
       $guard = array_get($exception->guards(),0);
            switch ($guard){
                case 'admin':
                $login='admin.login';
                break;

                default:
                $login='login';
                break;
            }
                    
        return redirect()->guest(route($login));
    }

	Visual Studio Instalation
Auto close tag
Auto rename tag
Highlight matcging
Live server
Npm
Open in github
Php debug
Rainbow bracket
Vs icon

           api
New blog eapi

Php artisan make:model  App/Product -a
1.Migration a factory hobe.Okhane faker libray anujayi db table er column heading guli sapi a je vabe dekhano hoyeche ovabe  krte hobe.( https://github.com/fzaninotto/Faker)
2.sedder a giye kaj krte hobe
3.php artisan db:seed




Git Init
Open git ignore in folder blog and cut the vendor option 
`
git remote add origin https://github.com/Shakil-Mehrab/api.git>git push -u origin master
route api update:
database ekta foldare rekhe git add . dao.
git status>add all> git status > Git commit -m “Created Model -a”> git status will show clean>git push
php artisan tinker>>change to mood of query
create Resource:  php artisan make:resource Product/ProductCollection
Request:php artisan make:request ProductRequest




Making Like

1.<span class="label label-default {{$all_popular_property->likes->where('user_id',auth()->id())->where('property_id',$all_popular_property->id)->first()?'liked':''}}" onclick="likeIt('{{$all_popular_property->id}}',this)"><span class="la la-heart"></span>
                                </span>

2.Like table with user-id,property_id

3.Modelgulo connect koro.login koro.refresh krle jno like hariye na jay sejonno style sheet a like class a color dite hobe   .like[color:red]


4.<script>
 function likeIt(threadId,elem){
var csrfToken='{{csrf_token()}}';
$.post('{{route('toggleLike')}}',{threadId:threadId,_token:csrfToken},function(data){
  console.log(data);
  if(data.message==='liked'){
    $(elem).addClass('liked');
    $(elem).css({color:'red'});
  }else{
    $(elem).css({color:'#ffffff'});
    $(elem).removeClass('liked');
  }
  
});
}
</script>


5.public function toggleLike(Request $request){
       $threadId=Input::get('threadId');
       $user_like=Like::where('user_id',auth()->id())
                      ->where('property_id',$threadId)->first();
       if($user_like){
        $like=Like::where('user_id',auth()->id())
                      ->where('property_id',$threadId)->first();
        $like->delete();
       
        return response()->json(['status'=>'success','message'=>'unliked']);
       }
       else{
          $like=new Like();
          $like->property_id=$threadId;
          $request->user()->likes()->save($like);
          
      return response()->json(['status'=>'success','message'=>'liked']);
   }
 
  }
	Hidden form
1.<link href="{{asset('realestate/css/bootstrap.min.css')}}" rel="stylesheet">

2.  <script>
    function toggleReply(commentId){
  $('.reply-form-'+commentId).toggleClass('hidden');
}
</script>


3.<button class="btn btn-info btn-xs" onclick="toggleReply('{{$property->id}}')">Reply</button>
                
   4.   <div class="reply-form-{{$property->id}} hidden">
       <form action="" method="POST"  class="inline-it">
         {{csrf_field()}}  
 <div class="form-group">
    <label for="body"></label>
      <input type="text" class="form-control" name="body" id="exampleInputEmail1" placeholder="Your Reply" value="{{Request::old('body')}}">
                                    </div>
                                  <input type="submit" class="btn btn-primary btn-xs" value="Reply">
                               </form>
                              </div>  
