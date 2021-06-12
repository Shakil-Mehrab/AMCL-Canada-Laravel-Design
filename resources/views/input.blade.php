<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
    <div class="row">
    <div class="col-md-12" style="display: flex;">
    <div style="margin-left:auto;">
    Cart ({{$items->count()}})
    @forelse($items as $item)
        <div>{{$item->name}}*{{$item->quantity}}-Price({{$item->price*$item->quantity}})</div>
    @empty
    @endforelse
    </div>
    </div>
    <div class="com-md-12">
        <!-- @forelse($products as $product)
        <div>
        {{$product->name}}-Price({{$product->price}})
        <a href="{{url('product/show/'.$product->id)}}"><button>Product show</button></a>
        </div>
        @empty
        @endforelse -->




    <form method="post" action="/action_page_post.php">
      <div data-role="rangeslider">
        <label for="price-min">Price:</label>
        <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
        <label for="price-max">Price:</label>
        <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
      </div>
        <input type="submit" data-inline="true" value="Submit">
      </form>


    </div>
    </div>
</body>
</html>