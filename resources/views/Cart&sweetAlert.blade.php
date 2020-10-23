https://www.youtube.com/watch?v=4Oew3Znyr0Q&t=335s
https://sweetalert2.github.io/#download

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto/demo-5/ by , Thu, 11 Apr 2019 15:14:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hatirpal.com : Online Wholesale Marketplace In Bangladesh</title>
    <meta name="keywords" content="hatirpal.com,hatirpal,shopping" />
    <meta name="description" content="Hatirpal.com is the largest online wholesale marketplace in Bangladesh.Hatirpal.com has been experimenting with and out to win the trust of buyers" />
    <meta name="author" content="SW-THEMES"> 
</head>
<body>
	<div class="featured-products-section carousel-section">
        <div class="container">
            <h2 class="h3 title mb-4 text-center">Featured Products</h2>

            <div class="featured-products owl-carousel owl-theme">
            @php
                use App\Model\Product;
                $products=Product::orderBy('id','asc')->where('featured',1)->get();
            @endphp
            @forelse($products as $product)
                <div class="product">
                        <div class="product-action">
                            <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                <span>Add to Wishlist</span>
                            </a>

                            <a href="#" class="paction add-cart" title="Add to Cart" data-id="{{$product->id}}">
                                <span>Add to Cart</span>
                            </a>

                            <a href="#" class="paction add-compare" title="Add to Compare">
                                <span>Add to Compare</span>
                            </a>
                        </div><!-- End .product-action -->
                    </div><!-- End .product-details -->
                </div><!-- End .product -->
            @empty
            @endforelse
            </div><!-- End .featured-proucts -->
        </div><!-- End .container -->
    </div>
    <script type="text/javascript" src="{{asset('bazarbaarifront/js/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
       
        $(document).ready(function(){
            $.get('{{URL::to("user/cart/basket")}}',function(data){
                $('#cartBasket').empty().append(data);
            });
            $('.add-cart').on('click',function(e){
                var id=$(this).data('id');
                if(id){
                    $.get("{{URL::to('/user/cart/add')}}/"+id,function(data){
                        $('#cartBasket').empty().append(data);
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: 'Product Added to Cart!'
                            })
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Product Not Added to Cart!'
                            })
                        }
                    });
                }
            });
            $('#cartBasket').on('click','.cartBasketRemove',function(e){
                var id=$(this).data('id');
                if(id){
                    $.get("{{URL::to('/user/cart/remove')}}/"+id,function(data){
                        $('#cartBasket').empty().append(data);
                        const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000,
                        })
                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: 'Product Removed from Cart!'
                            })
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Product not Removed from Cart!'
                            })
                        }
                    });
                }
            });
        });




    </script> 
</body>
</html>
<!-- route -->
Route::get('/user/cart/add/{id}','Layouts\Cart\CartController@addItem')->name('cart.add');
<!-- controller -->
public function addItem($id){
  $product=Product::find($id);
  // dd($product);
     \Cart::add([
        'id' => $id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 12,
        'attributes' => array(
        'image' => $product->cover_img,
        ),
        // 'associatedModel' => $product
    ]);
     $carts=Cart::getContent();
    return response()->json(['carts'=>$carts],200);
}