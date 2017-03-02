<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tovars;
use App\Categories;

class ProductController extends Controller
{
    public function getIndex($id = 0)
    {
        $cat = Categories::find($id);
        $products = Tovars::where('categories_id', $id)
            ->where('showhide', 'show')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('products')->with('cat', $cat)->with('products', $products);
    }
    public function getOne($id=0){
        $prod = Tovars::find($id);
        return view ('product')->with('prod',$prod);
    }
}
