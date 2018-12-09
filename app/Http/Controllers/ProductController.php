<?php

namespace App\Http\Controllers;

use Request;
use App\Product;
use App\Category;
use App\Http\Requests\ProductRequest;
use Input,File;

class ProductController extends Controller
{
    public function getList()
   	{
   		
		$products = Product::orderBy('id', 'DESC')->paginate(8);
		
   		return view('backend.product.list', ['products' => $products]);
   	}

   	  public function getAdd()
    {
       return view('backend.product.addNew');
    }

   	public function postAdd(ProductRequest $prod_request)
	{
		$file_name = $prod_request->file('fileToUpLoad')->getClientOriginalName();
		$product = new Product();
		$product->name = $prod_request->name;
		$product->price = $prod_request->price;
		$product->image = $file_name;
		$product->description =$prod_request->description;
		$product->category_id = $prod_request->category;
		$prod_request->file('fileToUpLoad')->move('images', $file_name);
		$product->save();
		return redirect()->route('admin/product/getList');
	}

	public function getDelete($id)
	{
		$product = Product::find($id);		
		File::delete('./images'.$product->image);
		$product->delete($id);
		return redirect()->route('admin/product/getList');
	}

	
	public function getEdit($id)
	{
		$cate = Category::all();
		$product = Product::find($id);
		return view('backend/product/edit', ['cate' => $cate, 'product' => $product]);
	}


	public function postEdit($id)
	{
		$product = Product::find($id);
		$img_current = 'images/'.Request::input('img_current');
		
        $product->name = Request::input('name');
		$product->price = Request::input('price');
		$product->description = Request::input('description');
		$product->category_id = Request::input('category');

        if(!empty(Request::file('fileToUpLoad'))) {

        	if(Request::file('fileToUpLoad'))
        	{
        		$file_name = Request::file('fileToUpLoad')->getClientOriginalName();
				$product->image = $file_name;
        	}
        	else {
        		$product->image = null;
        	}		
			Request::file('fileToUpLoad')->move('images', $file_name);

			// xóa hình hiện tại
			if(File::exists($img_current))
			{
				File::delete($img_current);
			}
		} else {
			echo "Không có file";
		}
        $product->save();
        // trở về trang list category
        return redirect()->route('admin/product/getList');
    }

    public function sortProduct($nameSort)
	{
		$prod = Product::all()->toArray();
		$collection = collect($prod);

		if($nameSort == "")
		{
		      $nameSort = "SortByDesc";
		}
		else
		{
		      $nameSort = "";
		}

		switch ($nameSort) {
			case "SortByDesc":
				$collection->sortBy('id', 'desc'); 
				break;
			default:
				$collection->sortBy('id'); 
				break;
		}
		return view('backend/product/list', ['collection' => $collection]);
	}
}
