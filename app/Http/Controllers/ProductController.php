<?php

namespace App\Http\Controllers;

use App\Models\product;
use http\Client\Curl\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\get;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $products = product::query() -> where('user_id', $user -> id) -> with('user:id,name')->latest()->get();
        return view('product/product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $request->user()->products()->create($validated);
        $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
//        $this->authorize('update', $chirp);

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //        $this->authorize('delete', $chirp);

    }
}
