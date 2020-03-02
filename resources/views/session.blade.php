use Session;
session_start();
$it=Session::get('it');
 Session::put('it',$image_name);
