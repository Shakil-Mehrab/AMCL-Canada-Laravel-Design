<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap 101 Template</title>
    <link href="{{asset('style/admin/normalrating/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/normalrating/bootstrap/css/rating.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/normalrating/bootstrap/awesome-font/css/fontawesome-all.min.css')}}" rel="stylesheet">
  </head>
  <body>
    <button class="btn btn-success">hi</button>
    <h1><i class="fas fa-star"></i>Hello, world!</h1>
//input
  <div class="container" style="marigin-top:35px">
    <div class="ratings">
      <input type="radio" name="star" id="rating" value="1"/>
      <input type="radio" name="star" id="rating" value="2"/>
      <input type="radio" name="star" id="rating" value="3"/>
      <input type="radio" name="star" id="rating" value="4"/>
      <input type="radio" name="star" id="rating" value="5"/>
    </div>
    <span class="info"></span>
  </div>


  //shoewing
  <div class="container" style="marigin-top:35px">
    <div class="ratings">
      <input type="radio"  value="1" {{$product->getStarRating()==1?'checked':''}}>
      <input type="radio"  value="2" {{$product->getStarRating()==2?'checked':''}}>
      <input type="radio"  value="3" {{$product->getStarRating()==3?'checked':''}}>
      <input type="radio"  value="4" {{$product->getStarRating()==4?'checked':''}}>
      <input type="radio"  value="5" {{$product->getStarRating()==5?'checked':''}}>
    </div>
    <span class="info"></span>
  </div>
    <script src="{{asset('style/admin/normalrating/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('style/admin/normalrating/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('style/admin/normalrating/bootstrap/js/rating.js')}}"></script>    
    <script>
    $('.ratings').rating(function(vote,event){
      $.ajax({
        method:"POST",
        url:'/rating/show',
        data:{vote:vote}
      }).done(function(info){
        $('.info').html("your vote: <b>"+info+"<b>")
      })
    })
  </script> 
  </body>
</html>


//route
Route::post('/rating/show','Layout\RatingController@show');

//controller
public function show()
{
    return view('layout.pages.rating.index');
}
//layout.pages.rating.index

<?php 
echo $_POST['vote'];