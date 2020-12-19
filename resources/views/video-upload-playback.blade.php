 input type
 <input type="file" class='form-control' class="form-control-file" name='video' id="exampleInputFile2" aria-describedby="fileHelp"> 
                 
code for playback
 @forelse($categories as $cat)
    <video width='200' height='100' controls><source src='{{asset($cat->video)}}' type='video/webm'></video>
    @empty
@endforelse
Controller
 public function store(Request $request)
    {
        $product=new Video();
        $image=$request->file("file_name");
         if($image){
            $image_full_name=$image->getClientOriginalName();
             $upload_path="files/";
             $image_url=$upload_path.$image_full_name;
             $success=$image->move($upload_path,$image_full_name);
            if($success){
              $product->video=$image_url;
            }
        }
        $product->save();
        return redirect()->back();



<!-- youtube -->
<section>
    <div class="col-md-8 col-sm-12 offset-md-2">
     <iframe width="100%" height="315" src="{{$video->link}}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
    </div>
</section>

<!-- facebook -->
https://developers.facebook.com/docs/plugins/embedded-video-player/#configurator
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

<section>
    <div class="col-md-8 col-sm-12 offset-md-2" style="display: flex;justify-content: center;">
      <div id="fb-root"></div>
      <div class="fb-video" data-href="{{$video->link}}" data-autoplay="true" data-width="800" data-show-text="false">
        <div class="fb-xfbml-parse-ignore">
          <blockquote cite="{{$video->link}}">
            <!--<a href="https://www.facebook.com/facebook/videos/10153231379946729/">How to Share With Just Friends</a>-->
            <!--<p>How to share with just friends.</p>-->
            <!--Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014-->
          </blockquote>
        </div>
      </div>
    </div>
</section>
@endif
<br><br>

