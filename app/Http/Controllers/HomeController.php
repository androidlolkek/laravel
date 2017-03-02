<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Auth;
use App\Tovars;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	
    {
		$all = Tovars::where ('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
				
		
        return view('home')->with('all',$all);
    }
	public function postindex(ProductRequest $r)
	{
		//dd($r->all());
		$r['picture']= ' ';
		$r['url']= ' ';
		$r['user_id']= Auth::user()->id;
		Tovars::create($r->all());
		return redirect('home');
		
	}
	public function getDelete($id=0){
		Tovars::where('id', $id)->delete();
		return redirect('/home');
	}
	public function getEdit($id=0){
		$product = Tovars::find($id);
		return view('edit')->with('product', $product);	
	}
	public function postEdit(ProductRequest $r, $id=0){
		//dd($_POST);
		$prod = Tovars::find($id);
		if($prod->user_id == Auth::user()->id){
			Tovars::where('id',$id)->update($r->except('_token'));
		}
		return redirect('/home');
		
	}
}
