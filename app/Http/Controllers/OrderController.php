<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tovars;
class OrderController extends Controller
{
    public function getIndex()
    {
        $arr = explode(',', $_COOKIE['basket']);
        $tovs = [];
        $tovars = [];
        foreach ($arr as $key => $value) {
            if ($value != '') {
                $arr_sm = explode(':', $value);
                $tovs[$arr_sm[0]] = $arr_sm[1];
                $tovars[$arr_sm[0]] = Tovars::find($arr_sm[0]);
            }
        }
        return view('order')->with('tovs', $tovs)->with('tovars', $tovars);
    }
    public function postIndex()
    {
        $arr = [];
        foreach ($_POST as $key => $value) {
            $id = (int) $key;
            if ($id > 0) {
                $arr[$id] = $value;
            }
        }
        $body = serialize($arr);
        dd($body);
    }
}