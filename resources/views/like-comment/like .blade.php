<!DOCTYPE html>
<html lang="en">

<!-- Tiger Cage/properties.html by g4bbar, Thu, 24 Jan 2019 15:34:57 GMT -->
<head>
<meta charset="utf-8">
<title>Ourland - Real Estate HTML Template | Properties</title>
<!-- Stylesheets -->


</head>


<body>
    .<span class="label label-default {{$all_popular_property->likes->where('user_id',auth()->id())->where('property_id',$all_popular_property->id)->first()?'liked':''}}" onclick="likeIt('{{$all_popular_property->id}}',this)"><span class="la la-heart"></span></span>
    
    
    //Like table and model->user and product er sathe relation create koro
                $table->integer('user_id');
                $table->integer('property_id');
    
    // .liked{color:blue}
    
//controller
    <?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Input;
    
    public function toggleLike(Request $request){
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
?>
    
    
<script>
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
    
    
    
    
    
    

</body>

<!-- Tiger Cage/property-detail.html by g4bbar, Thu, 24 Jan 2019 15:35:35 GMT -->
</html>