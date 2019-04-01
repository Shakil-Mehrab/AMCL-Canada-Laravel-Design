<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Open+Sans|Oswald|Raleway|Roboto" rel="stylesheet">
    <link href="{{asset('style/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
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


              <a class="edit" data-toggle="modal" data-target="#reply-edit" href="#" >Edit</a> 
                 <div id="reply-edit" class="modal fade" tabindex="-1" role="dialog" >
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Edit Reply</h4>
                                  </div>
                                   <div class="modal-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                      {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Body<span style='color:red'>*</span></label>
                                            <textarea type="text" class="form-control p-input" name="body"  placeholder="Name" ></textarea>
                                        </div>
                                          <input type="submit" class="btn btn-primary btn-xs" value="Update">
                                      </form>
                                   </div>
                                 <div class="modal-footer">
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('style/bootstrap/js/bootstrap.min.js')}}"></script>
  <script>
    function toggleReply(commentId){
  $('.reply-form-'+commentId).toggleClass('hidden');
}
</script>   
        
    </body>
</html>
