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