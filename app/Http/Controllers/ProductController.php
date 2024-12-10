<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
public function create()
{
    // Paginate products
    $products = Product::with('category')->paginate(10);

    // Retrieve all categories (no need for pagination here)
    $categories = Category::all();

    // Get the currently authenticated admin user
    $admin = auth()->user();

    // Pass both products and categories to the view
    return view('admin.products', compact('categories', 'products', 'admin'));
}

    public function store(Request $request)
    {
        // Validate and store the product details
        $request->validate([
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric|min:0',
            'productDescription'=>'nullable|string|max:255',
            'categoryId' => 'required|exists:categories,id',
            'productStock' => 'nullable|numeric|min:0',
            'productAvailability' => 'required|in:Available,Not Available',
        ]);

        $product = new Product();
        $product->productName = $request->productName;  // Corrected field name
        $product->productDescription = $request->productDescription;  // Corrected field name
        $product->productPrice = $request->productPrice;  // Corrected field name
        $product->categoryId = $request->categoryId;  // Corrected field name
        $product->productStock = $request->productStock ?? 0;  // Corrected field name, default to 0 if null
        $product->productAvailability = $request->productAvailability;  // Corrected field name

        // Handle Image Upload
        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('products', 'public');
            $product->ProductImage = $imagePath;  // Corrected field name
        }

        // Save the product to the database
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product created successfully!');
    }
 public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id); // Find product by ID
        return view('admin.edit_product', compact('product', 'categories'));
    }

    // Update the product
    public function update(Request $request, $id)
    {
        $request->validate([
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric|min:0',
            'categoryId' => 'required|exists:categories,id',
            'productStock' => 'nullable|numeric|min:0',
            'productAvailability' => 'required|in:Available,Not Available',
        ]);

        $product = Product::findOrFail($id);
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $product->productPrice = $request->productPrice;
        $product->categoryId = $request->categoryId;
        $product->productStock = $request->productStock ?? 0;
        $product->productAvailability = $request->productAvailability;

        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('products', 'public');
            $product->ProductImage = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    // Delete the product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }    

}
