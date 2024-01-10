<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Exception;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('welcome', [
            'products' => Product::paginate(10)
        ]);
    }

    
}
