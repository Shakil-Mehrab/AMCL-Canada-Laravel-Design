<div class="form-group {{ $errors->has($column) ? ' has-error' : '' }} col-lg-4 col-md-4 col-sm-12 my-3">
    <label for="{{$column}}" class="control-label">{{ucfirst(str_replace('_',' ',$column))}}</label>
    <input type="text" class="form-control" name="{{$column}}" id="{{$column}}" placeholder="{{ucfirst(str_replace('_',' ',$column))}}" value="{{old($column)}}">
    @if ($errors->has($column))
    <span class="help-block">
        <strong style="color:red">{{ $errors->first($column) }}</strong>
    </span>
    @endif
</div>

<div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }} col-lg-12 col-md-12 col-sm-12 my-5" style="order: 4;">
    <label for="category_id" class="control-label">Select Category</label>
    <div>
        @forelse($categories as $category)
        <input type="checkbox" class="form-checkbox" name="category_id[{{$category->id}}]" id="category_id" value="{{$category->id}}"
        @if(old('name'))
        {{ old('category_id.'.$category->id)?'checked':''}}
        @else
        {{$data?$data->categories->contains($category->id)?'checked':'':''}}
        @endif
         >
        <span>{{$category->name}}</span>
        @empty
        @endforelse
    </div>

    @if ($errors->has('category_id'))
    <span class="help-block">
        <strong style="color:red">{{ $errors->first('category_id') }}</strong>
    </span>
    @endif
</div>




public function rules()
    {
        return [
            'name'=>'required|max:255',
            'price'=>'required|numeric',
            'brand'=>'required|max:50',
            'image'=>'mimes:jpg,png',
            'image'=>'mimes:jpg,png',

            'country_id'=>'required|exists:countries,id',

       
            'address_id'=>[
                'required',
                Rule::exists('addresses','id')->where(function($builder){
                    $builder->where('user_id',$this->user()->id);
                })
            ],
            'payment_method_id'=>[
                'required',
                Rule::exists('payment_methods','id')->where(function($builder){
                    $builder->where('user_id',$this->user()->id);
                })
            ],
            'shipping_method_id'=>[
                'required',
                'exists:shipping_methods,id',
                new ValidShippingMethod($this->address_id)
            ]
            'avatar' => [
                'required',
                Rule::dimensions()->maxWidth(1000)->maxHeight(500)->ratio(3 / 2),
            ],
        ];


        public function messages()
        {
            return [
                'title.required' => 'A title is required',
                'body.required' => 'A message is required',
            ];
        }
    }