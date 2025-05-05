<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Clients;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // عرض جميع المعاملات
    public function index()
    {
        $transactions = Transaction::with(['client', 'products'])->latest()->get();
        return view('dashboard.transactions.index', compact('transactions'));
    }

    // عرض فورم إنشاء معاملة
    public function create()
    {
        $clients = Clients::all();
        $products = Product::all();

        return view('dashboard.transactions.create', compact('clients', 'products'));
    }

    // حفظ المعاملة الجديدة
    public function store(Request $request)
{
    $validated = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'transaction_type' => 'required|in:in,out',
        'product_id' => 'required|array',
        'product_id.*' => 'exists:products,id',
        'quantity' => 'required|array',
        'quantity.*' => 'numeric|min:0.01',
        'unit_price' => 'required|array',
        'unit_price.*' => 'numeric|min:0.01',
        'paid' => 'required|numeric|min:0',
        'notes' => 'nullable|string',
    ]);

    $total = 0;

    // حساب التوتال النهائي
    foreach ($request->product_id as $index => $productId) {
        $total += $request->quantity[$index] * $request->unit_price[$index];
    }

    $transaction = Transaction::create([
        'client_id' => $request->client_id,
        'transaction_type' => $request->transaction_type,
        'total_price' => $total,
        'paid' => $request->paid,
        'remaining' => $total - $request->paid,
        'notes' => $request->notes,
    ]);

    // حفظ المنتجات المرتبطة بالمعاملة
    foreach ($request->product_id as $index => $productId) {
        $transaction->products()->attach($productId, [
            'quantity' => $request->quantity[$index],
            'unit_price' => $request->unit_price[$index],
            'total_price' => $request->quantity[$index] * $request->unit_price[$index],
        ]);
    }

    return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
