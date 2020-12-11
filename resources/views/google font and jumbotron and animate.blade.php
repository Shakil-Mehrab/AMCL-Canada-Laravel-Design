
<div class="jumbotron" style="height:300px;overflow: hidden">
  <div style="margin-top: -50px">
  <div class="container">
    <div id="details" style="position: absolute;margin-top: 250px">
      <p> <a href="{{route('user.cover.photo.edit',$user->id)}}"><p> <span class="label label-primary">Edit Your Cover Photo</span></p></a></p>
      
    </div>
  </div>
  <a href="{{URL::to($user->cover_photo)}}">
  <img src="{{URL::to($user->cover_photo)}}" class="img-thumbnail" style="max-height:100%px;min-height:100%;min-width: 100%;" alt="Upload a cover photo"></a>
</div>
</div>
        
Animated
<div class="animated fdeInLeft"></div>
