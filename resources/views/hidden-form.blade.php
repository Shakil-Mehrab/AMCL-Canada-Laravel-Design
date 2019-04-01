<!DOCTYPE html>
<html lang="en">

<!-- Tiger Cage/properties.html by g4bbar, Thu, 24 Jan 2019 15:34:57 GMT -->
<head>
<meta charset="utf-8">
<title>Ourland - Real Estate HTML Template | Properties</title>
<!-- Stylesheets -->
<link href="{{asset('realestate/css/bootstrap.min.css')}}" rel="stylesheet">

</head>


<body>

    <span  onclick="toggleReply('{{$coment->id}}')">Reply</span>
         <div class="reply-form-{{$coment->id}} hidden">
            <form action="" method="POST"  class="inline-it">
              {{csrf_field()}}  
                <div class="form-group">
                  <label for="body"></label>
                  <input type="text" class="form-control" name="body" id="exampleInputEmail1" placeholder="Your Reply" value="{{Request::old('body')}}">
                </div>
              <input type="submit" class="btn btn-primary btn-xs" value="Reply">
           </form>
          </div>  
    <script>
    function toggleReply(commentId){
  $('.reply-form-'+commentId).toggleClass('hidden');
}
</script>
</body>

<!-- Tiger Cage/property-detail.html by g4bbar, Thu, 24 Jan 2019 15:35:35 GMT -->
</html>