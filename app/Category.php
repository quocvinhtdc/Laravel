<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
	protected $fillable = ['name', 'parent_id', 'type'];


	public function childs()
	{
		return $this->hasMany('App\Category', 'parent_id', 'id');
	} 	

	public function getCategory()
	{
		$categories = Category::where('parent_id', 0)->get();
		return $categories;
	}
}
