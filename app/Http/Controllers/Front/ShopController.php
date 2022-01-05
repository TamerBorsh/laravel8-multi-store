<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $data = Product::paginate(paginate_number);
        return response()->view('front.product.index', ['products'=> $data]);
    }

    public function show()
    {

    }
}
