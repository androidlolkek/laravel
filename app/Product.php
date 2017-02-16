<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
	'name', 'body', 'user_id', 'id', 'picture', 'cat_id', 'url', 'showhide'
	];
}
