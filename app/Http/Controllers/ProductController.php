<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $filterData = $request['properties'];
        $products = Product::with('properties');
        $products = collect($products->filter($filterData));
        return response()->json([
            'products' => $products->paginate(40)
        ], 200);
    }

}
