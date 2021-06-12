//temporary
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BazaarBari| Worldclass Bussiness Platform</title> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="{{asset('images/icon/icon.png')}}" />
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/bower_components/morris.js/morris.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('bazarbaariadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" integrity="sha256-piqEf7Ap7CMps8krDQsSOTZgF+MU/0MPyPW2enj5I40=" crossorigin="anonymous" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  @yield('link')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">



<div class="wrapper">
  @include('layouts.includes.header.nav')
  @include('layouts.includes.left-side')
  <div class="content-wrapper">

   <div class="dashboard">
    <div class="container-fluid">
      <div class="content-area">
        <div class="dashboard-content">
          <div class="row">    
              <div class="col-md-8 col-md-offset-2" id="mycountry">
                <div class="content-wrap well text-center">
                  <button id="addpopup" class="btn btn-success"> Add Country</button>
                </div>
              </div>

               

              <div class="col-md-8 col-md-offset-2" id="addTable">      
               
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
 </div>
</div>
<div id="addpop">      
    
</div>
<div id="edit">      
    
</div>
<!-- jQuery 3 -->
<script type="text/javascript" src="{{asset('bazarbaarifront/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('bazarbaariadmin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bazarbaariadmin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function(){
    $.get('{{route("subscribe.index")}}',function(data){
      $('#addTable').empty().append(data);
    });
    $('#mycountry').on('click','#addpopup',function(){
      $.get('{{route("show.popup")}}',function(data){
        $('#addpop').empty().append(data);
        $('#mymodal').modal('show');
      })
    });
    $('#addpop').on('submit','#countryForm',function(e){
        e.preventDefault();
        var frmdata= $(this).serialize();
        var image= $(this).image;

       
        console.log(frmdata);
         console.log(image);
        // $.post('{{route("subscribe")}}',frmdata,function(data){
        //     alert('Product Added Succesfylly');
        //       $('#addTable').empty().append(data);
        // })
        $.ajax({
          url:'{{route("subscribe")}}',
          type:'POST',
          data:frmdata,
        })
        .done(function(data){
            $('#addTable').empty().append(data);
        })
        .fail(function(error){
           var emailerror= error.responseJSON.errors.email;
           var nameerror= error.responseJSON.errors.name;
           var imageError= error.responseJSON.errors.image;

          $('#addpop #emailError').empty();
          $('#addpop #nameError').empty();
          $('#addpop #imageError').empty();


          $('#addpop #emailError').append('<strong style="color:red">'+emailerror+'</strong>');
          $('#addpop #nameError').append('<strong style="color:red">'+nameerror+'</strong>');
          $('#addpop #imageError').append('<strong style="color:red">'+imageError+'</strong>');


         
        });
      });
    $('#addTable').on('click','#editpopup',function(){
      var id=$(this).data('task');
      $.get('{{URL::to("show/edit/popup")}}/'+id,function(data){
        $('#edit').empty().append(data);
        $('#editmymodal').modal('show');
      })
    })
   $('#edit').on('submit','#countryUpdateForm',function(e){
        e.preventDefault();
        var frmdata= $(this).serialize();
        console.log(frmdata);
        $.post('{{route("subscribe.update")}}',frmdata,function(data){
            alert('Product Updated Succesfylly');
              $('#addTable').empty().append(data);
        })
      })
  $('#addTable').on('click','#delete',function(){
      var id=$(this).data('task');
      console.log(id);
      $.get('{{URL::to("delete/subscribe")}}/'+id,function(data){
        alert('Product Deleted Succesfylly');
        $('#addTable').empty().append(data);
        
      })
    });
  $('#addTable').on('click','.pagination a',function(e){
     e.preventDefault();
      var url=$(this).attr('href');
      console.log(url);
      $.get(url,function(data){
        $('#addTable').empty().append(data);
        
      })
    });
     $('#addTable').on('keyup','#searchAll',function() {
        $(this).autocomplete({
          source: "{{URL::to('search/subscribe')}}"
        });
      })
    });
</script>
</body>
</html>


//addTable
 <div class="input-group">
    <input type="search" naem="search" id="searchAll" class="form-control" placeholder="Search for...">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">Search</button>
    </span>
  </div>
<table class="table table-hover table-striped table-bordered" id="editsomething">
  <thead>
  <tr>
      <th>id</th>
      <th>Country</th>
       <th>Email</th>  
      <th>Image</th> 
      <th>Edit</th> 
      <th>Delete</th> 
  </tr>                 
  </thead>
  <tbody>
  @forelse($categories as $category)
  <tr>
      <td>{{$category->id}}</td>  
      <td>{{$category->name}}</td> 
      <td>{{$category->email}}</td>
      <td><img src="{{asset($category->image)}}" style="max-height:40px;min-height: 40px;max-width: 40px;min-width: 40px"></td> 

      <td><button id="editpopup" data-task='{{$category->id}}' class="btn btn-success"> Edit Country</button></td>
      <td><button id="delete" data-task='{{$category->id}}'><i class="fa fa-trash"></i></button></td>
  </tr> 



  @empty
  <tr>
      <td></td>
      <td></td>  
      <td>No Categories</td>        
      <td></td>
      <td></td>
  </tr>  
  @endforelse  

  </tbody>
</table>
<div class="yourpaginate text-center" id="mypaginate">
  {{$categories->links()}}
</div>

           
//addpopup
 <div class="modal fade" id="mymodal">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Add New Record</h4>
    </div>
    <form id="countryForm" method="post" action="" class="forms-sample" enctype="multipart/form-data"> 
      {{csrf_field()}}
      <div class="modal-body">
        <div class="form-group">
         <label for="name" class="control-label"><h4>Proruct Name</h4></label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Name">
          <span id="nameError" class="help-block"></span>
        </div>
        <div class="form-group">
          <label for="email" class="control-label"><h4>Email</h4></label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Product Name"> 
           <span id="emailError" class="help-block"></span>
        </div>
        <div class="form-group">
          <label for="email" class="control-label"><h4>Email</h4></label>
          <input type="file" class='form-control' class="form-control-file" name="image1" id="image"> 
           <span id="imageError" class="help-block"></span>
        </div>
         
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create Country</button>
        </div>
    </form>
   </div>
  </div>
</div>

//editpopup
<!-- <div id="editmymodal" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <form id="countryUpdateForm" method="post" action="" class="forms-sample" enctype="multipart/form-data"> 
          {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add Country</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="id" class="form-control" placeholder="Product Name" value="{{$product->id}}">
              <div class="form-group">
                 <label for="name" class="control-label"><h4>Proruct Name</h4></label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Product Name" value="{{$product->name}}">
                  @if ($errors->has('name'))
                  <span class="help-block">
                      <strong style="color:red">{{ $errors->first('name') }}</strong>
                  </span>
                   @endif
              </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                  <label for="email" class="control-label"><h4>Email</h4></label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Product Name" value="{{$product->email}}">  
                </div>
         
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create Country</button>
            </div>
        </div>
       </form>
    </div>
</div>
 -->

 <div class="modal fade" id="editmymodal">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Add New Record</h4>
    </div>
    <form id="countryUpdateForm" method="post" action="" accept-charset="utf-8" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="modal-body">
        <input type="hidden" name="id" id="id" class="form-control" placeholder="Product Name" value="{{$product->id}}">
        <div class="form-group">
         <label for="name" class="control-label"><h4>Proruct Name</h4></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Product Name" value="{{$product->name}}">
            @if ($errors->has('name'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('name') }}</strong>
            </span>
             @endif
        </div>
        <div class="form-group">
          <label for="email" class="control-label"><h4>Email</h4></label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Product Name" value="{{$product->email}}">  
        </div>
      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create Country</button>
        </div>
    </form>
   </div>
  </div>
</div>

//route
Route::post('/subscribe','Layout\SubscriberController@subscribe')->name('subscribe');
Route::post('/subscribe/update','Layout\SubscriberController@update')->name('subscribe.update');
Route::get('/show/sub','Layout\SubscriberController@index')->name('subscribe.index');
Route::get('/show/add/popup','Layout\SubscriberController@addpopup')->name('show.popup');
Route::get('/show/edit/popup/{id}','Layout\SubscriberController@editpopup');
Route::get('/delete/subscribe/{id}','Layout\SubscriberController@delete');
Route::get('search/subscribe/','Layout\SubscriberController@search');

//controller
<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subscriber;
use App\Http\Requests\StoreSubscriberFormRequest;

class SubscriberController extends Controller
{
	public function index()
    {
        $categories=Subscriber::paginate(1);
         return view("addTable",compact('categories'));          
    }
    public function addpopup()
    {   
        return view("addpopup");          
    }
     public function editpopup($id)
    {   
    	$product=Subscriber::find($id);
        return view("editpopup",compact('product'));          
    }
    public function subscribe(StoreSubscriberFormRequest $request)
    {
        $product=new Subscriber();
        $product->name=$request['name'];
        $product->email=$request['email'];
         $image1=$request->file("image1");
         if($image1){
             $image_full_name=$image1->getClientOriginalName();
             $upload_path="images/front&back/";
             $image_url=$upload_path.$image_full_name;
             $success=$image1->move($upload_path,$image_full_name);
            if($success){
              $product->image1=$image_url;
            }
        }
        $product->save();
        $categories=Subscriber::paginate(1);
        return view("addTable",compact('categories'));          
    }
    public function update(Request $request)
    {
    	$id=$request['id'];
        $product=Subscriber::find($id);
        $product->name=$request['name'];
        $product->email=$request['email'];
        
        $product->update();
        $categories=Subscriber::paginate(1);
        return view("addTable",compact('categories'));          
    }
     public function delete($id)
    {
        $product=Subscriber::find($id);
        $product->delete();
        $categories=Subscriber::paginate(1);
        return view("addTable",compact('categories'));          
    }
    public function search(Request $request)
    {
    	$categories=Subscriber::where('name','LIKE',"%".$request->term."%")->pluck('name');
    	if(empty($categories->all())){
    		return ["No Category Found....."];
    	}else{
    		return $categories;
    	}         
    }
}
left navigation dropdown// function product_show_hide() {
//     var click = document.getElementById('product_toggle');
//     if (click.style.display == "none") {
//         click.style.display = "block";
//     } else {
//         click.style.display = "none";
//     }
// }
// function category_show_hide() {
//     var click = document.getElementById('category_toggle');
//     if (click.style.display == "none") {
//         click.style.display = "block";
//     } else {
//         click.style.display = "none";
//     }
// }


     
        <div class="form-group{{ $errors->has('country_id') ? ' is-invalid' : '' }} has-feedback">
          <select name="country_id" class="form-control" required>
              <option value="">Select One</option>
              @forelse($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @empty
              <option value="">No Country</option>
              @endforelse
          </select> 
          @if ($errors->has('country_id'))
              <span class="invalid-feedback" role="alert">
                  <strong style="color:red">{{ $errors->first('country_id') }}</strong>
              </span>
          @endif
       </div>
      
       
       <div class="form-group{{ $errors->has('city_id') ? ' is-invalid' : '' }} has-feedback col">
            <select class="form-control" name="city_id" required>
                                   
                                    
            </select> 
            @if ($errors->has('city_id'))
            <span class="help-block">
                <strong style="color: red">{{ $errors->first('city_id') }}</strong>
            </span>
             @endif
       </div>
        <div class="form-group{{ $errors->has('district_id') ? ' is-invalid' : '' }} has-feedback">
          <select class="form-control" name="district_id" required>
                         
                          
          </select> 
          @if ($errors->has('district_id'))
          <span class="help-block">
              <strong style="color: red">{{ $errors->first('district_id') }}</strong>
          </span>
          @endif
       </div>

<script>
   $(function(){
    var country=$('select[name="country_id"]');
    var code=$('select[name="code_id"]');
    var city=$('select[name="city_id"]');
    var district=$('select[name="district_id"]');
    code.attr('disabled','disabled')
    city.attr('disabled','disabled')
    district.attr('disabled','disabled')
 country.change(function(){
      var id=$(this).val();
      if(id==''){
       code.attr('disabled','disabled')
       city.attr('disabled','disabled')
       s='<option value=""></option>'
       code.html(s);
       city.html(s);
     }})
    country.change(function(){
      var id=$(this).val();
      if(id){
       city.attr('disabled','disabled')
       $.get('{{url('/cities?country_id=')}}'+id)
        .success(function(data){
          var s='<option value="">Select One</option>';
          data.forEach(function(row){
            s +='<option value="'+row.id+'">'+row.name+'</option>'
          })
          city.removeAttr('disabled')
         city.html(s);
        })
       code.attr('disabled','disabled')
       $.get('{{url('/codes?country_id=')}}'+id)
        .success(function(data){
          data.forEach(function(row){
            s='<option value="'+row.id+'">'+row.code+'</option>'
          })
          code.removeAttr('disabled')
          code.html(s);
        })
      }
    })
    city.change(function(){
      var id=$(this).val();
      if(id==''){
       district.attr('disabled','disabled')
       s='<option value=""></option>'
       district.html(s);
     }})
    city.change(function(){
      var id=$(this).val();
      if(id){
       district.attr('disabled','disabled')
       $.get('{{url('/districts?city_id=')}}'+id)
        .success(function(data){
          var s='<option value="">Select One</option>';
          data.forEach(function(row){
            s +='<option value="'+row.id+'">'+row.name+'</option>'
          })
          district.removeAttr('disabled')
          district.html(s);
        })
      }
    })   
  })
</script>


</body>
</html>
