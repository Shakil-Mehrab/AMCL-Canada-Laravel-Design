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