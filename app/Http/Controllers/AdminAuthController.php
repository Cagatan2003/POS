<?php
namespace App\Http\Controllers;
use App\Models\Admin; 
use App\Models\Product;
use App\Models\Cashier;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    // Show Admin Login Form
    public function showLoginForm()
    {
        return view('admin.login');
    }

   public function showRegistrationForm()
    {
        return view('admin.register');
    }
public function register(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'AdminUsername' => 'required|string|max:255|unique:admins',
        'AdminEmail' => 'required|email|max:255|unique:admins',
        'AdminFname' => 'required|string|max:255',
        'AdminMname' => 'nullable|string|max:255',
        'AdminLname' => 'required|string|max:255',
        'AdminGender' => 'nullable|string|in:Male,Female,Other',
        'AdminBdate' => 'required|date',
        'AdminPhone' => 'nullable|string|max:20|regex:/^[0-9]+$/',
        'AdminAddress' => 'nullable|string|max:255',
        'AdminPassword' => 'required|string|min:8|confirmed',
        'AdminProfile' => 'nullable|image|max:2048', // Optional profile image validation
    ]);

    // Handle file upload if exists
    if ($request->hasFile('AdminProfile')) {
        $validated['AdminProfile'] = $request->file('AdminProfile')->store('AdminProfiles', 'public');
    }

    // Hash the password
    $validated['AdminPassword'] = bcrypt($validated['AdminPassword']);

    // Save the admin record
    Admin::create($validated);

    // Redirect with success message
    return redirect()->route('admin.login')->with('success', 'Your registration was successful!');
}


public function login(Request $request)
{
    // Validate the request
    $credentials = $request->only('AdminUsername', 'AdminPassword');

    // Attempt to find the admin by username
    $admin = Admin::where('AdminUsername', $credentials['AdminUsername'])->first();

    // Check if the admin exists and verify the password
    if ($admin && Hash::check($credentials['AdminPassword'], $admin->AdminPassword)) {
        // Log in using the custom admin guard
        Auth::guard('admin')->login($admin);

        // Redirect to the intended page (admin dashboard)
        return redirect()->intended('admin/dashboard');
    }

    // If login fails, return with error message
    return back()->withErrors(['AdminUsername' => 'Invalid credentials']);
}

  
public function logout(Request $request)
{
    // Log out the admin using the 'admin' guard
    Auth::guard('admin')->logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session ID to prevent session fixation
    $request->session()->regenerateToken();

    // Redirect to the login page
    return redirect()->route('admin.login');
}


 public function viewCashiers()
{
    $cashiers = Cashier::all(); // Fetch all cashier records from the database
    return view('admin.cashier', compact('cashiers')); // Pass cashiers data to the view
}
public function updateCashierStatus(Request $request, $cashierId)
{
    $cashier = Cashier::findOrFail($cashierId); // Find the cashier by ID
    $newStatus = $request->input('status'); // Get the new status from the form
    $adminId = auth()->id(); // Get the currently authenticated admin's ID

    // Update the cashier's status and admin_id
    $cashier->CashierStatus = $newStatus;
    $cashier->admin_id = $adminId;
    $cashier->save();

    return redirect()->back()->with('success', 'Cashier status updated successfully!');
}


public function dashboard()
{
    // Count the number of products
    $productCount = Product::count();

    // Get total expenses for the last 7 days
    $totalExpensesLast7Days = Expense::where('created_at', '>=', Carbon::now()->subDays(7))
                                     ->sum('total_amount');

    // Get admin user info
    $admin = auth()->user();

    // Return the view with both product count and total expenses for the last 7 days
    return view('admin.dashboard', compact('productCount', 'admin', 'totalExpensesLast7Days'));
}
 
    // Method for displaying password change form
    public function showChangePasswordForm()
    {
        return view('admin.change-password'); // Show the password change form
    }

    // Method to update the admin password
    public function updatePassword(Request $request)
    {
        // Validate the password change request
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches the admin's stored password
        if (!Hash::check($validated['current_password'], auth()->user()->AdminPassword)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Hash the new password and update it
        $admin = auth()->user();
        $admin->AdminPassword = Hash::make($validated['new_password']);
        $admin->save();

        // Log out the admin and invalidate the session for security
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect with success message
        return redirect()->route('admin.login')->with('success', 'Password changed successfully. Please log in again.');
    }
    public function showChangeProfileForm()
{
    // Get the currently authenticated admin
    $admin = auth()->user();

    // Pass the admin's data to the view
    return view('admin.change-profile', compact('admin'));
}

public function updateProfile(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'AdminUsername' => 'required|string|max:255',
        'AdminFname' => 'required|string|max:255',
        'AdminMname' => 'nullable|string|max:255',
        'AdminLname' => 'required|string|max:255',
        'AdminGender' => 'nullable|string|in:Male,Female,Other',
        'AdminBdate' => 'required|date',
        'AdminPhone' => 'nullable|string|max:20|regex:/^[0-9]+$/',
        'AdminAddress' => 'nullable|string|max:255',
       'AdminProfile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional profile image validation
    ]);

    // Get the currently authenticated admin
    $admin = auth()->user();  // No need to use findOrFail, as auth()->user() will already give you the authenticated user

    // Update the admin record with the validated data
    $admin->AdminUsername = $validated['AdminUsername'];
    $admin->AdminFname = $validated['AdminFname'];
    $admin->AdminMname = $validated['AdminMname'];
    $admin->AdminLname = $validated['AdminLname'];
    $admin->AdminGender = $validated['AdminGender'];
    $admin->AdminBdate = $validated['AdminBdate'];
    $admin->AdminPhone = $validated['AdminPhone'];
    $admin->AdminAddress = $validated['AdminAddress'];

    // Handle file upload if exists
    if ($request->hasFile('AdminProfile')) {
        // Delete the old profile picture if a new one is uploaded
        if ($admin->AdminProfile) {
            Storage::delete('public/' . $admin->AdminProfile);
        }
        // Store the new profile picture
        $admin->AdminProfile = $request->file('AdminProfile')->store('AdminProfiles', 'public');
    }

    // Save the updated admin record
    $admin->save();

    // Redirect with success message
    return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully!');
}


public function destroy($id)
{
    $cashier = Cashier::findOrFail($id);
    $cashier->delete();
    return redirect()->route('admin.cashier')->with('success', 'Cashier deleted successfully!');
}

}
