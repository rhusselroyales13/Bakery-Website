<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flasher\Notyf\Prime\NotyfInterface;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Sales;

class CustomerController extends Controller
{
    public function index() {
        
        $cart = Cart::all();
        $products = Product::all();
        

        return view('dashboard', compact('products'));
    }


    public function accRegister(Request $request) {

        

        $user = new User();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->password =  $request->password;

        
        $usernameCheck = $request->input('email');
        $phoneCheck = $request->input('phone');

        if (User::where('email',  '=', $usernameCheck, 'and')->exists()) {
            notifyError('Email already existing!');
            return redirect()->back();
        } else if (User::where('phone', '=', $phoneCheck, 'and')->exists()) {
            notifyError('Phone already existing!');
            return redirect()->back();
        } else if (strlen($request->phone) != 11) {
            notifyError('Phone Number is Invalid');
            return redirect()->back();
        } else {

        $user->save();
    
        notifySuccess('Account Created Successfully!');
            
        return redirect()->route('customer.dashboard');
        }
    }

    

    public function accLogin (Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user) {
                return redirect()->route('customer.dashboard');
            } else if ($user->usertype === 'customer') {
                return redirect()->route('customer.dashboard');
            } else if ($user->usertype === 'admin') {
                return redirect()->route('admin.dashboard');
            }

        } else {
            notifyError('Email or Password is Incorrect');
            return redirect()->route('customer.dashboard');
        }

    }

    public function logout() {
        Auth::logout();
        
        return redirect()
        ->route('customer.dashboard');
    }

    public function addToCart($id) {
        
        $productId = $id;
        $user = Auth::user();
        
        $cartExists = Cart::where('userCartId', '=', $user->id, 'and')
                          ->where('productCartId', '=',$id)
                          ->exists();
        
        if ($cartExists) {
            notifyInfo('Product Already added to Cart!');
            return redirect()->back();
        } 
        else {
            $user_id = Auth::id();
            $cart = new Cart();

            $cart->productCartId = $productId;
            $cart->userCartId = $user_id;

            $cart->save();

            notifyInfo('Product Added to Cart!');
            return redirect()->back();
        }

        

    }

    public function buyNow($id) {
        $productId = $id;
        $user = Auth::user();
        
        $cartExists = Cart::where('userCartId', '=', $user->id, 'and')
                          ->where('productCartId', '=',$id)
                          ->exists();
                     
        if ($cartExists) {
            notifyInfo('Product Already added to Cart!');
            return redirect()->back();
        } 
        else {
            $user_id = Auth::id();
            $cart = new Cart();

            $cart->productCartId = $productId;
            $cart->userCartId = $user_id;

            $cart->save();

            return redirect()->route('customer.cart');
        }
    }

    public function cart() {
        
        
        

        return view('customer.customerCart');
    }

    public function removeCart($id) {
        $cart = Cart::find($id, 'id');

        if ($cart) {
                
            $cart->delete();
            notifyInfo('Product Remove from the Cart!');
            return redirect()->back();

        } else {

            return redirect()->back();
        }
    }

    public function orderConfirmation(Request $request){

        $userId = Auth::id();
        $cartItems = Cart::where('userCartId', '=', $userId, 'and')->get();

    foreach ($cartItems as $cartItem) {
        $product = Product::find($cartItem->productCartId);

        if (!$product) {
            notifyError('Product Not Found :<');
            continue;
        }

        $productData = $request->products[$cartItem->productCartId] ?? null;
        if (!$productData) {
            notifyError('Product data is missing please try again :<');
            continue;
        }

        $qty = $productData['quantity'];
        $pm = $request->paymentMethod;

        
        // ✅ Check stock before creating order
        if ($qty && $product->stock >= $qty && $pm != null) {
            // Create order only if stock is sufficient
            $order = new Order;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->payment = $request->paymentMethod;
            $order->quantity = $qty;
            $order->total = $productData['subtotal'];
            $order->userOrderId = $cartItem->userCartId;
            $order->productOrderId = $cartItem->productCartId;
            $order->save(); 

            
            // Update product stock
            $product->decrement('stock', $qty); // atomic and safer

            // Remove cart item
            $cartItem->delete();
        } else if ($pm === null) {
            notifyError('Please select a payment method');
        }
        else {
            notifyError('Insufficient stock! '.' Stock: '. $product->stock);
        }
    }

    notifySuccess('Order Successfully Placed!');
    return redirect()->back();
}





    public function myOrders() {
        $userId = Auth::user()->id;
        $order = Order::with('product.ratings')->where('userOrderId', '=', $userId, 'and')->get();

        return view('customer.myOrders', compact('order'));
    }

    public function review ($id) {
        $product = Product::findOrFail($id);
        

        return view('customer.review', compact('product'));
    }

    public function rate(Request $request, Product $product) {
       $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:1000'
       ]);

       $product->ratings()->updateOrCreate(
        ['user_id' => Auth::id()],
        [
                'rating' => $request->rating,
                'review' => $request->review
                ]
       );

       $product->rating = $product->ratings()->avg('rating');
       $product->save();

        notifySuccess('Thankyou for Reviewing our Product!');
        return redirect()->route('customer.dashboard');
        
    }

    public function receivedConfirm(Request $request, $id) {
        $order = Order::find($id);

        $confirm = $request->confirm;

        if ($confirm) {

            $order->status = 'customerReceivedConfirm';

            $order->save();

            return redirect()->back();
        } else {

            notifyError('Order Not Found!');
            return redirect()->back();
        }
        
            
        
    }

    public function profile() {
        $user = Auth::user();

        return view('customer.profile', compact('user'));
    }

    public function cancelOrder($id) {
        $orderItem = Order::findOrFail($id);
        $product = Product::find($orderItem->productOrderId);
        $qty = $orderItem->quantity;

        if ($orderItem) {
                
            $orderItem->delete();
            $product->increment('stock', $qty);
            notifyInfo('Order Cancelled!');
            return redirect()->back();

        } else {

            return redirect()->back();
        }
    }

    public function history() {
        $userId = Auth::user()->id;
        $history = Sales::where('userOrderId', '=', $userId, 'and')->get();

        return view('customer.history', compact('history'));
    }

    public function shopHistory() {
        
        return view('shopHistory');
    }

    public function changeEmail() {
        $user = Auth::user();

        return view('customer.changeEmail', compact('user'));
    }

    public function newEmail(Request $request) {

    $validator = Validator::make($request->all(), [
        'newEmail' => 'required|email|unique:users,email,' . Auth()->id(),
    ], [
        'newEmail.unique' => 'Email Already Existing!',
    ]);

    if ($validator->fails()) {
        notifyError($validator->errors()->first('newEmail'));
        return redirect()->route('customer.profile');
    }

    $user = Auth()->user();
    $user->email = $request->newEmail;
    $user->save();

    notifySuccess('Successfully Change Email!');
    return redirect()->route('customer.profile');     
           
    }

}





        

