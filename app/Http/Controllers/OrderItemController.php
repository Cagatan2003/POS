<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Method for adding an item to the order
  public function addToOrder(Request $request)
{
    $request->validate([
        'productId' => 'required|exists:products,productId',
        'quantity' => 'required|numeric|min:1',
        'price' => 'required|numeric',
        'subtotal' => 'required|numeric',
    ]);

    // Retrieve or create an order ID (e.g., using session)
    $orderId = session('orderId'); // You can generate a new order if needed

    // Ensure a cashier ID is available
    $cashierId = auth()->user()->id;  // Assuming you're using Laravel's built-in auth system

    // Create a new order if orderId doesn't exist
    if (!$orderId) {
        $order = new Order();
        $order->cashier_id = $cashierId;
        $order->status = 'Pending';  // Set the default status as Pending
        $order->save();
        $orderId = $order->id;
        session(['orderId' => $orderId]); // Store order ID in session
    }

    // Insert the item into the orderitem table
    $orderItem = new OrderItem();
    $orderItem->orderId = $orderId;
    $orderItem->productId = $request->productId;
    $orderItem->quantity = $request->quantity;
    $orderItem->price = $request->price;
    $orderItem->subtotal = $request->subtotal;
    $orderItem->save();

    return response()->json(['message' => 'Item added to order', 'data' => $orderItem]);
}

   

    // Method to remove an item from the order
    public function removeOrderItem($orderItemId)
    {
        $orderItem = OrderItem::find($orderItemId);
        if ($orderItem) {
            $orderItem->delete();
            return response()->json(['message' => 'Item removed successfully']);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }

    // Method to complete the order and finalize it
    public function completeOrder(Request $request)
    {
        // Logic to finalize the order, like updating the order status and saving to orders table
        $orderId = session('orderId');

        // Example: Update order status to 'Completed'
        $order = Order::find($orderId);
        if ($order) {
            $order->status = 'Completed';
            $order->save();
            return response()->json(['message' => 'Order completed successfully']);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }
}
