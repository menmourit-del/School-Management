<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('product.addproduct', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productname' => 'required|max:255|unique:products,productname',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'catid'       => 'required|exists:categories,categoryid',
        ]);

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    public function index()
    {
        // ទាញយកទិន្នន័យ Product ទាំងអស់ រួមទាំង Category របស់វា
        $products = Product::with('category')->get();
        
        return view('product.index', compact('products'));
    }

    // <-- បន្ថែម Method show ត្រង់នេះ -->
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('product.show', compact('product'));
    }

    // បន្ថែម Method សម្រាប់បង្ហាញទំព័រ Edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    // បន្ថែម Method សម្រាប់ធ្វើបច្ចុប្បន្នភាព (Update) ទិន្នន័យ
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'productname' => 'required|max:255',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'description' => 'nullable|string',
            'catid'       => 'required|exists:categories,categoryid',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    // បន្ថែម Method សម្រាប់លុបទិន្នន័យ (Delete/Destroy)
    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    // ─── ផ្នែកកូដរៀបចំ ID ឡើងវិញ ───
    $products = Product::orderBy('productid', 'asc')->get();
    $newId = 1;
    foreach ($products as $p) {
        DB::table('products')
            ->where('productid', $p->productid)
            ->update(['productid' => $newId]);
        $newId++;
    }

    // Reset Auto Increment ឱ្យរត់បន្តពីលេខចុងក្រោយត្រឹមត្រូវ
    DB::statement("ALTER TABLE products AUTO_INCREMENT = $newId");
    // ───────────────────────────────

    return redirect()->route('product.index')->with('success', 'Product deleted successfully and IDs reordered!');
}
    // បង្ហាញទំព័រសម្រាប់បញ្ជាក់ការលុប
    public function delete($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('product.delete', compact('product'));
    }
}
