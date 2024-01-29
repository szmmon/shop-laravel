<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\JsonResponse;

class WelcomeController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index(Request $request):View | JsonResponse
    {

        $filters = $request->query(key: 'filter');
        $query = Product::query();
        if (!is_null($filters)){
            if (array_key_exists('categories', $filters)){
            $query = $query->whereIn('category_id', $filters["categories"]);
            }
            if (!is_null($filters["price_min"])){
            $query = $query->where('price', '>', $filters["price_min"]);
            }
            // if (!is_null($filters["price_max"])){
            // $query = $query->where('price', '< ' ,$filters["price_max"]);
            // } 
            // ustawienie gornych widelek nie dziala

            return response()->json([
                'data' => $query->get()
            ]);
        }   
        return view('welcome', [
            'products' => $query->paginate(10),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'defaultImage' => config('shop.defaultImage')
            ]);
    }

    
}
