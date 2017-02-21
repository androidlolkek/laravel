<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'categories';
    
    protected $fillable = [
          'name',
          'showhide',
          'picture',
          'parent_id'
    ];
    
    public static $showhide = ["show" => "show", "hide" => "hide", ];


    public static function boot()
    {
        parent::boot();

        Categories::observe(new UserActionsObserver);
    }
    
    
    
    
}