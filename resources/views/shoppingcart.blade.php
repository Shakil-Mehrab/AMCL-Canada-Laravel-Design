https://github.com/darryldecode/laravelshoppingcart
// install
composer require "darryldecode/cart:~4.0"
//config app
Darryldecode\Cart\CartServiceProvider::class
'Cart' => Darryldecode\Cart\Facades\CartFacade::class
//controller
use Cart;

//function of add update remove
\Cart::add();
\Cart::update();
\Cart::remove();
\Cart::condition($condition1);
\Cart::getTotal();
\Cart::getSubTotal();
\Cart::addItemCondition($productID, $coupon101);


public function addItem($id)
{
    $product=Product::find($id);
    Cart::add([
        'id' => $id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' =>[
            'size' => 'Large'
             ],      
    ]);
    // dd(Cart::getContent());
    return back();
}



public function update(Request $request, $id)
{
    Cart::update($id,array(
        'quantity'=>array(
            'relative' => false,
            'value'=>$request->qty,
            ),
        'attributes' => array(
            'size' => $request->size,
             ),
        ));
    return back();
}