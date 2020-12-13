value="{{Request::old('title')}}"
<div class="form-group {{$errors->has('price')?'has-error':''}}">
    <label>Price</label>
    <input type="text" class="form-control" value="{{ $categoryDetails->price }}"
        name="price" id="price" required>
        @if($errors->has('price'))
        <span class="help-block">
            <strong style="color:red">{{$errors->first('price')}}</strong>
        </span>
        @endif
</div>