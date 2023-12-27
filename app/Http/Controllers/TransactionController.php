<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionProduct;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\Product;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['customer', 'delivery', 'products'])->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $deliveries = Delivery::all();
        $products = Product::all();
        return view('admin.transactions.create', compact('customers', 'deliveries', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create([
            'invoice' => $request->invoice->store('invoices'),
            'date' => $request->date,
            'customer_id' => $request->customer_id,
            'delivery_id' => $request->delivery_id,
        ]);

        foreach ($request->products as $productId => $productData) {
            TransactionProduct::create([
                'transaction_id' => $transaction->id,
                'product_id' => $productId,
                'quantity' => $productData['quantity'],
                'price' => $productData['price'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $customers = Customer::all();
        $deliveries = Delivery::all();
        $products = Product::all();
        return view('admin.transactions.edit', compact('transaction', 'customers', 'deliveries', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        // Delete old invoice if a new one is uploaded
        if ($request->invoice) {
            Storage::delete($transaction->invoice);
            $transaction->invoice = $request->invoice->store('invoices');
        }

        $transaction->update([
            'date' => $request->date,
            'customer_id' => $request->customer_id,
            'delivery_id' => $request->delivery_id,
        ]);

        TransactionProduct::where('transaction_id', $transaction->id)->delete();
        foreach ($request->products as $productId => $productData) {
            TransactionProduct::create([
                'transaction_id' => $transaction->id,
                'product_id' => $productId,
                'quantity' => $productData['quantity'],
                'price' => $productData['price'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Storage::delete($transaction->invoice);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
