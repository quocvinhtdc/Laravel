<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;


class CategogiesController extends Controller
{

     public function getAdd(Request $request)
    {

      return view('backend.Cate.AddCate');
    }
   
   // thêm sản phẩm
    public function postAdd(CategoryRequest $request)
    {  
        $cate = new Category;
        $cate->name      = $request->txtname;
        $cate->parent_id = $request->parent_id;
        $cate->type      = $request->txtType;
        $cate->save();
        // trở về trang list category
        return redirect()->route('admin.cate.list');
    }

  
    public function getList()
    {
        $cate = Category::orderBy('id', 'DESC')->get();
        return view('backend.Cate.listCate', ['Cate' => $cate]);
    }


    public function getDelete($id)
    {
        $parent = Category::where('parent_id', $id)->count();
        if($parent == 0){
            $cate = Category::find($id);
            $cate->delete($id);
            return redirect()->route('admin.cate.list');
        }
        else
        {
            echo "<script type='text/javascript'>
                alert('Xin Lỗi, Bạn Không thể xóa Category này');
                window.location = '";
                    echo route('admin.cate.list');
                echo "'
            </script>";
        }    
    }


    public function getEdit($id)
    {
        $data = Category::find($id); // dữ liệu đang lấy
        $parent = Category::get();
        return view('backend.Cate.EditCate', [ 'parent' => $parent, 'data' => $data, 'id' => $id]);
    }

     public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            ["txtname" => "required"], 
            ["txtname.required" => "Please Enter Name Category"] 
        );

        $cate = Category::find($id);
         $cate->name      = $request->txtname;
        $cate->parent_id = $request->parent_id;
        $cate->type      = $request->txtType;
        $cate->save();
        // trở về trang list category
        return redirect()->route('admin.cate.list');
    }




    
}
