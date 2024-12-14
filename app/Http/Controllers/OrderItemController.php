<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Invoice;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{


    public function getProductsByCategory($categoryId)
    {
        // Get products based on the selected category
        $products = Product::where('categoryId', $categoryId)->get();
        return response()->json($products);
    }

    public function addToOrder(Request $request)
    {
        // Store product in the order summary session
        $product = Product::find($request->productId);
        $order = session()->get('order', []);
        
        $order[] = [
            'product_id' => $product->productId,
            'name' => $product->productName,
            'quantity' => $request->quantity,
            'price' => $product->productPrice,
            'subtotal' => $product->productPrice * $request->quantity,
        ];
        
        session(['order' => $order]);
        return response()->json(['success' => 'Product added to order summary']);
    }

    public function showPaymentForm()
    {
        // Calculate the total from the order summary session
        $order = session()->get('order');
        $totalAmount = array_sum(array_column($order, 'subtotal'));
        
        return view('cashier.payment', compact('totalAmount'));
    }

    public function confirmPayment(Request $request)
    {
        // Create the order and invoice
        $orderData = session()->get('order');
        
        // Generate order and customer IDs automatically
        $order = Order::create([
            'customerId' => $request->customerId,
            'cashier_id' => auth()->id(), // Assuming cashier is logged in
            'orderType' => $request->orderType,
            'totalAmount' => array_sum(array_column($orderData, 'subtotal')),
        ]);

        // Save order items
        foreach ($orderData as $item) {
            OrderItem::create([
                'orderId' => $order->orderId,
                'productId' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // Create invoice
        Invoice::create([
            'orderId' => $order->orderId,
            'totalAmount' => $order->totalAmount,
            'paymentType' => $request->paymentType,
            'amountPaid' => $request->amountPaid,
            'changeGiven' => $request->amountPaid - $order->totalAmount,
        ]);

        // Clear the session after the order is confirmed
        session()->forget('order');

        return redirect()->route('cashier.dashboard')->with('success', 'Order successfully completed');
    }
    public function createOrder(Request $request)
{
    // Create the order
    $order = Order::create([
        'cashier_id' => auth()->user()->cashier_id,
        'customerId' => $request->customerId,
        'totalAmount' => $request->totalAmount,
        'orderType' => $request->orderType,  // 'Dine-in' or 'Take-out'
    ]);

    // Add each product in the cart to the order items
    $cart = session('cart', []);
    foreach ($cart as $item) {
        OrderItem::create([
            'orderId' => $order->orderId,
            'productId' => $item['productId'],
            'quantity' => $item['quantity'],
            'price' => $item['productPrice'],
            'subtotal' => $item['productPrice'] * $item['quantity'],
        ]);
    }

    // Clear the cart after order creation
    session()->forget('cart');

    // Redirect to invoice creation page
    return redirect()->route('cashier.invoice.create', ['orderId' => $order->orderId]);
}

}
