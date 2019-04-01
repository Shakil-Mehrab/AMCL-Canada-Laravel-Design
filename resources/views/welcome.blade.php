<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link href="{{asset('style/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

        <!-- Styles -->
      
    </head>
    <body>
       <a class="reply-btn theme-btn"><span  onclick="toggleReply('{{$comment->id}}')">Reply</span></a>

                <div class="reply-form-{{$comment->id}} hidden">    
                  <div class="review-comment-form"> 
                    <form method="post" action="">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <textarea name="body" placeholder="Reply" required>{{Request::old('body')}}</textarea>
                            </div>
                            

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 text-right">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit now</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
<script src="{{asset('style/bootstrap/js/jquery.min.js')}}"></script>

  <script>
    function toggleReply(commentId){
  $('.reply-form-'+commentId).toggleClass('hidden');
}
</script>   
        
    </body>
</html>
