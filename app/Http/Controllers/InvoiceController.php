<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Function to show the invoice creation form
       public function create($orderId)
    {
        // Fetch the order by its ID
        $order = Order::findOrFail($orderId);

        // Pass the order data to the view
        return view('cashier.invoice.create', compact('order'));
    }

    // Store the invoice in the database
    public function store(Request $request, $orderId)
    {
        $request->validate([
            'totalAmount' => 'required|numeric',
            'paymentType' => 'required|in:Cash,GCash',
            'amountPaid' => 'required|numeric',
            'changeGiven' => 'required|numeric',
            'Gcash_receipt' => 'nullable|string',
        ]);

        $order = Order::findOrFail($orderId);  // Fetch the order by its ID

        // Create the invoice record
        $invoice = new Invoice();
        $invoice->orderId = $orderId;
        $invoice->totalAmount = $request->input('totalAmount');
        $invoice->paymentType = $request->input('paymentType');
        $invoice->amountPaid = $request->input('amountPaid');
        $invoice->changeGiven = $request->input('changeGiven');
        $invoice->Gcash_receipt = $request->input('paymentType') == 'GCash' ? $request->input('Gcash_receipt') : null; // Only set Gcash_receipt if paymentType is GCash
        $invoice->save();

        // Update order status if needed, e.g., mark as 'paid'
        $order->status = 'paid';
        $order->save();

        return redirect()->route('cashier.dashboard')->with('success', 'Invoice generated successfully!');
    }
}

