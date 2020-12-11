https://artisansweb.net/resize-image-laravel-using-intervention-image-library/
composer require intervention/image
Intervention\Image\ImageServiceProvider::class
'Image' => Intervention\Image\Facades\Image::class
//run for making folder in public
php artisan storage:link   

//controller
public function store(Request $request)
    {
        $data = $request->all();
        $category = new Artist;
        if ($request->hasfile('image')) {
            echo $img_tmp = $request->file('image');
            if ($img_tmp->isValid()) {
                //image path code
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = rand(111, 99999) . '.' . $extension;
                $img_path = 'uploads/artists/' . $filename;
                //image resize
                Image::make($img_tmp)->resize(200,200)->save($img_path);
                $category->image = $filename;
            }
        }
        $category->save();
    }


// virtual image
<div style="width: 50%;margin:auto">
    <iframe allowfullscreen="true" frameborder="0" src="https://art.kunstmatrix.com/apps/artspaces/index.html?external=true&amp;splashscreen=true&amp;language=en&amp;uid=17787&amp;exhibition=1518270" width="100%" height="600"></iframe>
</div>


// lazy image
https://github.com/verlok/vanilla-lazyload
<img  src="{{asset('icon.png')}}" data-src="{{asset('/uploads/categories/'.$cat->image)}}" class="photo" alt="">
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.3/dist/lazyload.min.js"></script>
<script>
   const lazyLoadInstance = new LazyLoad({
       elements_selector: ".photo"
   })
</script>


// multiple image
if(!empty($images=$request->file("images"))){
        foreach($images as $image){
          //  $image_name=str_random(20);
            //  $ext=strtolower($image->getclientoriginalExtension());
          // $image_full_name=$image_name.".".$ext;
           $image_full_name=$image->getClientOriginalName();
           $upload_path="images/extra/";
           $image_url=$upload_path.$image_full_name;
         if(count($images)>0){
          $success=$image->move($upload_path,$image_full_name);
            if($success){
              $storage=new Media();
              $storage->product_id=$product_id;
              $storage->image=$image_url;
                $storage->save();
            }
        }
    }
}


//responmsive image link
https://picsum.photos/

//image size jai hok back ground same thakbe but image tad majhe nijer size anujayi jayga nibe
    <div
      class="exh-cover-img"
      :style="{
        backgroundImage: 'url(' + artist.image + ')',
        backgroundColor: '#f7f7f7',
        backgroundPosition: 'center',
        backgroundRepeat: 'no-repeat',
        backgroundSize: 'contain'
      }"
    ></div>
<style>
.exh-cover-img {
  min-height: 180px;
}
</style>