<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tovars;
class BaseController extends Controller
{
    public function getIndex()
    {
        $products = Tovars::where('showhide', 'show')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('products')->with('products', $products);
    }
}