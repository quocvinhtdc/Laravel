<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	protected $table = 'Products';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'price', 'image', 'description', 'Category_id', 'created_at'];

    // lay ra 4 san pham moi nhat cua mens
    public function getMensProducts()
	{
		$products = self::where('category_id', 2)->orderBy('category_id','DESC')->limit(8)->get();
		return $products;
	}

	// lay ra 4 san pham moi nhat cua womens
    public function getWomensProducts()
	{
		$products = self::where('category_id', 1)->orderBy('category_id','DESC')->limit(8)->get();
		return $products;
	}

	// lay ra 4 san pham bags moi nhat
    public function getBagsProducts()
	{
		$products = self::where('category_id', 6)->orderBy('category_id','DESC')->limit(8)->get();
		return $products;
	}

	// lay san pham theo id
	public function getProductByID($id)
	{
		$product = Product::find($id);
		return $product;
	}

	public function getProduct($id)
	{
		$categories = Category::where('parent_id', 0)->get();
		$products = Product::where('category_id', (int) $id)->get();

		return view('category', ['categories' => $categories, 'products' => $products]);
	}

}
