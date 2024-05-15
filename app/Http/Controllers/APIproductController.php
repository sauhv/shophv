<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class APIproductController extends Controller
{
    public function __construct()
    {
        $categoryList = Categories::where('hidden', 1)->orderBy('rank', 'asc')->limit(6)->get();
        View()->share('categoryList', $categoryList);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $productList = [
            'iphone' => Products::where('category_id', 1)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
            'ipad' => Products::where('category_id', 2)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
            'mac' => Products::where('category_id', 3)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
            'watch' => Products::where('category_id', 4)->where('hidden', 1)->orderBy('views', 'desc')->limit(4)->get(),
        ];
        $data = [
            'status' => true,
            'message' => 'Success',
            'data' => $productList
        ];
        return response()->json($data, 200);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
