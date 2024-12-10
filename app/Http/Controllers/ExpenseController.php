<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
public function index()
{
    // Fetch all expenses from the database
    $expenses = Expense::all();
 $admin = Auth::user();
    // Decode details field to make it easier to work with
    foreach ($expenses as $expense) {
        // Ensure the details are decoded correctly
        $expense->details = json_decode($expense->details);

        // If details are not in the correct format, set them to an empty object
        if (!$expense->details || !isset($expense->details->names)) {
            $expense->details = (object) [
                'names' => [],
                'amounts' => [],
                'dates' => [],
            ];
        }
    }

    // Return the view with expenses
    return view('admin.expenses.index', compact('expenses','admin'));
}

    public function store(Request $request)
    {
        // Validate and store the expense as per the previous code
        $request->validate([
            'name' => 'required|string|max:255',
            'names' => 'required|array',
            'names.*' => 'required|string|max:255',
            'amounts' => 'required|array',
            'amounts.*' => 'required|numeric|min:0',
            'dates' => 'required|array',
            'dates.*' => 'required|date',
        ]);

        // Calculate the total amount by summing up all the amounts
        $totalAmount = array_sum($request->amounts);

        // Create a new expense record
        $expense = Expense::create([
            'name' => $request->name,
            'total_amount' => $totalAmount, // Save the total amount
            'details' => json_encode([
                'names' => $request->names,
                'amounts' => $request->amounts,
                'dates' => $request->dates,
            ]),
            'created_at' => now(), // Store the current date and time
        ]);

        // Redirect to the expenses index page after saving
        return redirect()->route('admin.expenses.index')->with('success', 'Expense added successfully!');
    }

public function destroy($expenseId)
{
    // Find the expense by its ID
    $expense = Expense::findOrFail($expenseId);

    // Delete the expense
    $expense->delete();

    // Redirect back with a success message
    return redirect()->route('admin.expenses.index')->with('success', 'Expense deleted successfully.');
}


}
