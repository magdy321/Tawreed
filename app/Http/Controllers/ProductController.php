<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price_regular' => 'required|numeric',
            'price_trader' => 'required|numeric',
            'unit' => 'required|in:ton,m3',
            'quantity' => 'required|numeric',
        ]);
    
        Product::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'description' => $request->description,
            'price_regular' => $request->price_regular,
            'price_trader' => $request->price_trader,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        return view('dashboard.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price_regular' => 'required|numeric',
        'price_trader' => 'required|numeric',
        'unit' => 'required|in:ton,m3',
        'quantity' => 'required|numeric',
    ]);

    $product = Product::findOrFail($id);

    $product->update([
        'name' => $request->name,
        'slug' => \Str::slug($request->name),
        'description' => $request->description,
        'price_regular' => $request->price_regular,
        'price_trader' => $request->price_trader,
        'unit' => $request->unit,
        'quantity' => $request->quantity,
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::findorFail($id)->delete();
        return redirect()->route('products.index');
    }
}
