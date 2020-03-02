<!DOCTYPE html>
<html lang="en">
<head>
 <title>search</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
</head>
<body>                                         

<div class="container">
	<h1>Search by name</h1>
	<input type="text" class="typeahead form-control" name="name">
</div>
<script type="text/javascript">
	var path="{{route('autocomplete')}}";
	$('input.typeahead').typeahead({
			source:function(query,process){
				return $.get(path,{query:name},function(data){
					return process(data);
				});
			}
	});
</script>

</body>
</html>


//route
  Route::get('/autocomplete','Layout\FrontController@autocomplete')->name('autocomplete');

//controller
  public function autocomplete(Request $request)
    {
        $data=Product::select("name")->where("name","LIKE","%{$request->input('name')}%")->get();
        return response()->json($data);
    }

https://cdnjs.com/libraries/twitter-bootstrap
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" /> or <link rel="stylesheet" href="{{asset('dosomethingcss/css/bootstrap/css/bootstrap.min.css')}}">

 //https://www.w3schools.com/jquery/jquery_get_started.asp
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 or <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

//https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
 //if needed to edit size of search result
<link rel="stylesheet" href="{{asset('style/admin/algolia/css/ownsearch.css')}}">
 //restart server
 please restart your server