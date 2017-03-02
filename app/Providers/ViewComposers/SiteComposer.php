<?php

namespace App\Providers\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Categories;

class SiteComposer
{
    public function compose(View $view){

        $cats = Categories::where('showhide' , 'show')
                                    ->where('parent_id' , 0)
                                    ->get();
        $view->with('cats', $cats);
    }
}