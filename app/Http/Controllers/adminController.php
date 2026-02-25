<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Flasher\Notyf\Prime\NotyfInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Sales;
use Illuminate\Pagination\Paginator;

class adminController extends Controller
{
    public function viewProduct() {
        $categories = Category::all();

        return view('admin.addProduct', compact('categories'));
    }

    public function viewCategory() {
        return view('admin.addCategory');
    }

    public function addCategory(Request $request) {

    
    $categoryCheck = $request->bladeCategory;

    if (Category::where('categoryName', '=', $categoryCheck, 'and')->exists()) {

        notifyError('Category Already Existing!');

        return redirect()->back();

    } else {

        $categorydb = new Category();
        $categorydb->categoryName = $request->bladeCategory;
        $categorydb->save();

        notifySuccess('Category Added!');

        return redirect()->back();
    }

       
    }

    public function addProduct(Request $request) {

        $description = $request->bladeDescription;

        if (strlen($description) > 500) {
            notifyError('Description is too long. Please Shorten it to 500 characters');
            return redirect()->back();
        }

        $productdb = new Product();

        $productdb->name = $request->bladeName;
        $productdb->price = $request->bladePrice;
        $productdb->description = $request->bladeDescription;
        $productdb->category = $request->bladeCategory;
        $productdb->stock = $request->bladeStock;

        $image = $request->bladeImage;

        if ($image) {
            $imageName = time().'.'. $image->getClientOriginalExtension();
            $image->move('productImages', $imageName);
            $productdb->image = $imageName;
        }

        $productdb->save();

        notifySuccess('Product Added!');

        return redirect()->back();
    }

    public function manageProduct() {
        

        return view('admin.manageProduct', );
    }

    public function editProduct(Request $request, $id) {
        $product = Product::find($id);
        $category = Category::all();

        return view ('admin.editProduct', compact('product', 'category'));
    }

    public function editProductConfirm(Request $request, $id) {
        $product = Product::find($id);
        
        $imagePath = public_path('productImages/'. $product->image);

        $product->name = $request->bladeName;
        $product->price = $request->bladePrice;

        

        if ($request->hasFile('bladeImage') && $imagePath) {

            unlink($imagePath);
            $image = $request->bladeImage;
            $imageName = time().'.'. $image->getClientOriginalExtension();
            $image->move('productImages', $imageName);
            $product->image = $imageName;
            
        }
        
        
        $product->description = $request->bladeDescription;
        $product->category = $request->bladeCategory;
        $product->stock = $request->bladeStock;

        $product->save();

        notifySuccess('Product Updated!');
        return redirect()->route('admin.manageProduct');

    }

    public function deleteProduct($id) {
        $product = Product::find($id);

        

        if ($product && $product->image) {

            $imagePath = public_path('productImages/'. $product->image);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            
            $product->delete();
            
            
            return redirect()->back();

        } else {
            notifyError('Product not found');
            return redirect()->back();
        }
    }

    public function sales() {
        $sales = Sales::paginate(10);

        return view('admin.sales', compact('sales'));
    }

    public function orders() {
        $orders = Order::paginate(5);

        return view('admin.orders', compact('orders'));
    }

    public function action(Request $request, $id) {
        $order = Order::find($id);

        $status = $order->status;

        $preparing = $request->preparing;
        $otw = $request->onTheWay;
        $delivered = $request->delivered;

        if ($preparing) {
            $order->status = 'preparing';
        } else if ($otw) {
            $order->status = 'orderOtw';
        } else if ($delivered) {
            $order->status = 'delivered';
        } else {
            notifyError('Action Error');
        }

       $order->save();
        
        notifyInfo('Order status updated');
        return redirect()->route('admin.orders');
    }

    public function orderDone(Request $request, $id) {
        $order = Order::find($id);

        $orderDone = $request->orderDone;

        if ($orderDone) {
            Sales::create([
                'name' => $order->name,
                'price' => $order->total,
                'productName' => $order->product->name,
                'category' => $order->product->category,
                'quantity' => $order->quantity,
                'rating' => $order->product->rating,
                'userOrderId' => $order->user->id,
            ]);

            $order->delete();
            notifySuccess('Order is done good work!');
            return redirect()->route('admin.orders');
        }
    }

    public function deleteCategory($id) {
        $category = Category::find($id);

        $category->delete();

        notifySuccess('Category deleted successfully!');
        return redirect()->back();
    }

    public function adminDashboard() {

        return view('admin.adminDashboard');
    }
}
