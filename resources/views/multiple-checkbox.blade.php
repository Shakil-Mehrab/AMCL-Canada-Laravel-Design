//admin table
 <form method="post" action="{{route('property.delete')}}" enctype="multipart/form-data">
  @csrf
 <thead>
    <tr>
        <th>ID</th>
        <th><input type="checkbox" id="selectallboxes"></th>
        <th>Title</th>  
    </tr>
  </thead>
<tbody>
  <tr>
    <td>{{$property->id}}</td>
    <td><input type="checkbox" name="checkboxes[]" value="{{$property->id}}" class="selectall"></td>
    <td><button type="submit"><span style="color:#DD4F43"><i class="fas fa-trash-alt"></i></span></button></td>
</tr> 
</tbody>
</form>
<script >
$(document).ready(function(){
	$('#selectallboxes').click(function(event){
		if(this.checked){
			$('.selectall').each(function(){
				this.checked=true;
			});
		}else{
			$('.selectall').each(function(){
				this.checked=false;
			});
		}
	});
});		
</script>
//controller
 public function getDeleteProperty(Request $request){
    $checkboxes=$request->checkboxes;
    if(!empty($checkboxes)){
      foreach($checkboxes as $chekbox_id){
        $property=Property::find($chekbox_id);
        $property->delete();
        // dd($property);
      }
        return redirect()->back()->withSuccess('Property Deleteed succesfully');
    }
      return redirect()->back()->withError('Please Select One');
   }