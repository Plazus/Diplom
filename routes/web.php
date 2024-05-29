<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('main');
})->name('home');
Route::get('/logn', function () {
    return view('logn');
});


//1model
Route::get('/catalog',function(){
    $categories = DB::table('categories')->get();
    $products = DB::table('products')->get();
    return view('catalog', compact('categories'), compact('products') );

});
Route::post('/makecatalog', function (Request $request){
    DB::table('categories')->insert([
        'name'=>$request->input('name'),
        'description'=>$request->input('description')
    ]);

    
});

Route::get('/makecatalog',function (){
    return view('makecatalog');
});

//

//2
Route::post('/makeproduct', function (Request $request){
    DB::table('products')->insert([
        'category_id'=>$request->input('category_id'),
        'name'=> $request->input('name'),
        'description'=>$request->input('description'),
        'image'=>$request->input('image'),
        'price'=>$request->input('price')
    ]);
    
});

Route::get('/makeproduct', function (){
    return view('makeproduct');
});
//

//3order
Route::get('/personal/order', function (){
    $orders = DB::table('orders')
        ->join('users', 'orders.UserName', '=', 'users.name')
        ->orderBy('users.name')
        ->select('orders.*', 'users.name as UserName')
        ->get();
    return view('order', compact('orders'));


})->name('home');







//

//4Basket
Route::get('/basket', function () {
    $items = DB::table('buskets')->get();
    $totalCost=0;

    foreach ($items as $item){
        $totalCost+=$item->totalcost;
    }
    return view('basket', ['items' => $items, 'totalCost'=> $totalCost]);
});

Route::post('/add-to-cart', function (Request $request){
    $productID = $request->input('product_id');
    $quantity = $request->input('quantity');
    $curentprice = DB::table('products')->where('id', $productID)->value('price');

    $user = Auth::user();
    $username = ($user) ? $user->name : 'Guest';
    $totalcost = $quantity * $curentprice;
    DB::table('buskets')->insert([
        'number' =>$productID,
        'count' => $quantity,
        'username' => $username,
        'price' => DB::table('products')->where('id', $productID)->value('price'),
        'totalcost' => $totalcost,
    ]);
    return redirect('/basket');


});

Route::post('/create-order', function(){
    $items = DB::table('buskets')->get();
    $username = auth()->user()->name;
    $totalCost=0;
    $totalCount=0;
    foreach ($items as $item){
        $totalCost+=$item->totalcost;
    }
    foreach ($items as $item){
        $totalCount+=$item->Count;
    }
    
        DB::table('orders')->insert([
            'username' =>$username,
            'totalCost' =>$totalCost,
            'count' =>$totalCount,
        ]);
    

    DB::table('buskets')->truncate();

    return redirect('/main')->with('success','Заказ создан');

});

Route::delete('/remove-from-cart/{id}', function($id){
    DB::table('buskets')->where('id', $id)->delete();
    return response()->json(['message' => 'Товар успешно удален из корзины']);
});

//cupon

Route::post('/apply-coupon', function (Request $request) {
    $couponName = $request->input('coupon');
    $coupon = DB::table('cupons')->where('cupName', $couponName)->first();
    $busket = DB::table('buskets')->get();

    if ($coupon && $busket) {
        $discount = $coupon->discount;

        foreach ($busket as $item){
            $discountedPrice = $item->totalcost - ($item->totalcost * ($discount));
            DB::table('buskets')
            ->where('id', $item->id)
            ->update(['totalcost' => $discountedPrice]);
        }
    


        
        return redirect()->back()->with('success', 'Скидка успешно применена.');
    }else {
        return redirect()->back()->with('error', 'Купон не найден.');
    }
});




//
//5tovat//

Route::get('/tovar/{id}', function ($id) {
    $product = DB::table('products')->where('id', $id)->first();
    return view('tovar', compact('product'));
});


Route::post('/tovar/{id}/add-review', function (Request $request, $id) {
    $productID = $id;
    $userName = $request->input('username');
    $feedback = $request->input('feedback');
    $evaluation = $request->input('evaluation');

    DB::table('reviews')->insert([
        'product' => $productID,
        'UserName' => $userName,
        'feedback' => $feedback,
        'evaluation' => $evaluation,
    ]);

    return redirect()->back()->with('success', 'Отзыв добавлен');
});




//
Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/delivery', function () {
    return view('delivery');
});
Route::get('/layout', function () {
    return view('layout');
});
Route::get('/regster', function () {
    return view('regster');
});

Route::get('/personal', function (){
    return view('personal');

})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
