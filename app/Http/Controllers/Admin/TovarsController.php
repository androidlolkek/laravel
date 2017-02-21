<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Tovars;
use App\Http\Requests\CreateTovarsRequest;
use App\Http\Requests\UpdateTovarsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Categories;
use App\User;


class TovarsController extends Controller {

	/**
	 * Display a listing of tovars
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $tovars = Tovars::with("categories")->with("user")->get();

		return view('admin.tovars.index', compact('tovars'));
	}

	/**
	 * Show the form for creating a new tovars
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $categories = Categories::pluck("name", "id")->prepend('Please select', null);
$user = User::pluck("email", "id")->prepend('Please select', null);

	    
        $showhide = Tovars::$showhide;

	    return view('admin.tovars.create', compact("categories", "user", "showhide"));
	}

	/**
	 * Store a newly created tovars in storage.
	 *
     * @param CreateTovarsRequest|Request $request
	 */
	public function store(CreateTovarsRequest $request)
	{
	    $request = $this->saveFiles($request);
		Tovars::create($request->all());

		return redirect()->route(config('quickadmin.route').'.tovars.index');
	}

	/**
	 * Show the form for editing the specified tovars.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$tovars = Tovars::find($id);
	    $categories = Categories::pluck("name", "id")->prepend('Please select', null);
$user = User::pluck("email", "id")->prepend('Please select', null);

	    
        $showhide = Tovars::$showhide;

		return view('admin.tovars.edit', compact('tovars', "categories", "user", "showhide"));
	}

	/**
	 * Update the specified tovars in storage.
     * @param UpdateTovarsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTovarsRequest $request)
	{
		$tovars = Tovars::findOrFail($id);

        $request = $this->saveFiles($request);

		$tovars->update($request->all());

		return redirect()->route(config('quickadmin.route').'.tovars.index');
	}

	/**
	 * Remove the specified tovars from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Tovars::destroy($id);

		return redirect()->route(config('quickadmin.route').'.tovars.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Tovars::destroy($toDelete);
        } else {
            Tovars::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.tovars.index');
    }

}
