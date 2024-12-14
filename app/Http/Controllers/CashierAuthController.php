<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Cashier;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierAuthController extends Controller
{
    // Show Cashier Login Form
    public function showLoginForm()
    {
        return view('cashier.login');
    }

    // Cashier Login Logic

public function login(Request $request)
{
    // Validate the request
    $credentials = $request->only('CashierUsername', 'CashierPass');

    // Attempt to find the cashier by username
    $cashier = Cashier::where('CashierUsername', $credentials['CashierUsername'])->first();

    // Check if cashier exists and verify the password
    if ($cashier && Hash::check($credentials['CashierPass'], $cashier->CashierPass)) {
        // Check cashier status
        if ($cashier->CashierStatus !== 'active') {
            return back()->withErrors(['CashierUsername' => 'Your account is inactive. Please contact the admin.']);
        }

        // Log in using the custom cashier guard
        Auth::guard('cashier')->login($cashier);

        // Redirect to the intended page (cashier dashboard)
        return redirect()->intended('/cashier/dashboard');
    }

    // If login fails, return with error message
    return back()->withErrors(['CashierUsername' => 'Invalid credentials']);
}



    // Show Cashier Registration Form
    public function showRegistrationForm()
    {
        return view('cashier.register');
    }

    // Cashier Registration Logic
  public function register(Request $request)
{
    $validated = $request->validate([
        'CashierUsername' => 'required|string|max:255|unique:cashiers',
        'CashierEmail' => 'required|email|max:255|unique:cashiers',
        'CashierFname' => 'required|string|max:255',
        'CashierMname' => 'nullable|string|max:255',
        'CashierLname' => 'required|string|max:255',
        'CashierPhone' => 'required|string|max:15',
        'CashierAddress' => 'nullable|string|max:255',
        'CashierGender' => 'nullable|string|in:Male,Female,Other',
        'CashierProfile' => 'nullable|image|max:2048',
        'CashierPass' => 'required|string|min:8|confirmed',
        'CashierBdate' => 'required|date',
    ]);

    // Handle file upload
    if ($request->hasFile('CashierProfile')) {
        $validated['CashierProfile'] = $request->file('CashierProfile')->store('CashierProfiles', 'public');
    }

    // Explicitly set CashierStatus to 'inactive' (although the database default is already 'inactive')
    $validated['CashierStatus'] = 'inactive';

    // Insert into database
    try {
        Cashier::create($validated); // The password will be hashed automatically due to the mutator in the model
        return redirect()->route('cashier.login')->with('success', 'Registration successful!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

public function logout(Request $request)
{
    Auth::guard('cashier')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('cashier.login')->with('success', 'You have been logged out.');
}


 public function dashboard()
    {
        // Fetch categories and products
        $categories = Category::with('products')->get();
        $products = Product::all();
        $cashiers = Cashier::all();

        return view('cashier.dashboard', compact('categories', 'cashiers', 'products'));
    }

    

}
