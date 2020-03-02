//link
https://www.webslesson.info/2018/04/live-search-in-laravel-using-ajax.html
<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Live search in laravel using AJAX</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
  







      <form class="navbar-search" method="get" action="http://transvelo.github.io/">
          <label class="sr-only screen-reader-text" for="search">Search for:</label>
          <div id="app">
            <div class="input-group">
                <input  type="text" id="search" class="typeahead form-control search-field" dir="ltr" value="" name="search"  placeholder="Search By">
             
                <div class="i" style="position: absolute;margin-top: 60px;background:#0E336D;width: 100%">
                <ul style="list-style: none;margin-left: -40px;margin-top: -18px;">
                    

                </ul>
                </div>
                <div class="input-group-addon search-categories">
                  <select name='product_cat' id='c' class='postform resizeselect' >
                    <option value='0' selected='selected'>All Categories</option>
                    <option class="level-0" value="2">Laptops</option>
                    <option class="level-0" value="3">Ultrabooks</option>
                  
                  </select>
                </div>
                <div class="input-group-btn">
                  <input type="hidden" id="search-param" name="post_type" value="product" />
                  <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
                </div>
            </div>
          </div>
        </form> 









  
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
(function($) {

$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query ='',cat='')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query,cat},
   dataType:'json',
   success:function(data)
   {
    $('.i>ul').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  var cat = $('#c').val();

  fetch_customer_data(query,cat);
 });
});
})(jQuery);
</script>




//controll
 function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = trim($request->get('query'));
      $cat = trim($request->get('cat'));
      if($query !='')
      {
        if($cat!=0){
       $data = Product::where('name', 'like', '%'.$query.'%')->where('category_id',$cat)
         // ->orWhere('Address', 'like', '%'.$query.'%')
         // ->orWhere('City', 'like', '%'.$query.'%')
         // ->orWhere('PostalCode', 'like', '%'.$query.'%')
         // ->orWhere('Country', 'like', '%'.$query.'%')
         // ->orderBy('CustomerID', 'desc')
         ->get();
         }
         else{
          $data = Product::where('name', 'like', '%'.$query.'%')
         // ->orWhere('Address', 'like', '%'.$query.'%')
         // ->orWhere('City', 'like', '%'.$query.'%')
         // ->orWhere('PostalCode', 'like', '%'.$query.'%')
         // ->orWhere('Country', 'like', '%'.$query.'%')
         // ->orderBy('CustomerID', 'desc')
         ->get();
         }
      }
      else
      {
       $data = " ";
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <div style="background:white">
         <li style="margin:12px;font-size:15px"><a href="/single-product/'.$row->id .'"><span style="color:blak">'.$row->name .'</span></a>
         </li>
        <div>
        
        ';
       }
      }
      else
      {
       $output = '
       <div style="background:white;margin-top:12px">
         <li> No Result Found</li>
        <div>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
//route
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
