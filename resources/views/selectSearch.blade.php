https://select2.org/getting-started/installation
<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="vendor/select2/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $("#parent_id").select2({
        placeholder:"Select One",
        allowClear:true
    })
</script>
<div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }} col-lg-6 col-md-6 col-sm-12" style="order:3">
    <label for="parent_id" class="control-label">Parent</label>
    <select class="form-control" name="parent_id" id="parent_id">
        <option></option>
        <option value="">None</option>
        @forelse($categories as $category)
        <option value="{{$category->id}}" {{$data?$data->parent_id==$category->id?'selected':'':''}}>{{$category->name}}</option>
        @empty
        <option value="">No Category</option>
        @endforelse
    </select>
</div>

//cuntom css for status button
<style>
.toggle-on.btn,.toggle-off.btn {
    font-size: 12px;
    padding: 0!important;
}
.toggle.btn {
    width: 50px!important;
    min-width:  50px!important;
    height: 20px!important;
    min-height: 20px!important;
}

</style>