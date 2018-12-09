<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Auth\Events\Registered;
use DB,Mail,Cart;
use App\Comment;
use Auth;
use Illuminate\Support\collection;
use App\User;

class DemoController extends Controller
{

    /***********************************
    ******** INDEX
    ************************************/

    public function index()
    {
         return view('web.index');
        
    }

    // Get products
    public function getProducts()
    {
        $db_products = Product::orderBy('id', 'DESC')->get();
       
        return view('web.womens', ['prod'=>$db_products]);
    }

    // get products for index
    public function getProductsIndex()
    {
        $prod_mens   = new Product();
        $db_mens     = $prod_mens->getMensProducts();
        $prod_womens = new Product();
        $db_womens   = $prod_mens->getWomensProducts();
        return view('web.index', ['prod_mens' => $db_mens, 'prod_womens' => $db_womens]);
    }

    // hien thi san pham theo caregory, phan trang
    public function category($id)
    {
        $products = Product::where('Category_id', (int) $id)->paginate(8);

        return view('web.products', ['products' => $products]);
    }

    // chi tiet san pham
      public function detail($id)
    {
        $product_detail = Product::where('id', $id)->first();
        $comment = Comment::where('id_prod', $id)->get();
       

        return view('web.single', ['product_detail' => $product_detail, 'comment' => $comment]);
    }

    // tim kiem san pham
      public function getSearch(Request $res)
    {
        $search = Product::where('name', 'like','%'.$res->key.'%')->paginate(4);
        $key = $res->key;
        return view('web.search', ['prod'=> $search, 'key' => $key]);
    }


    // lien ket cac trang
    public function mens()
    {
        
        return view('web.mens');
    }

     public function womens()
    {
        
        return view('web.womens');
    }

     public function about()
    {
        return view('web.about');
    }

      public function contact()
    {
        return view('web.contact');
    } 

    public function admin()
    {
        return view('backend/index');
    }


    /***********************************
    ******** // liên hệ
    ************************************/

    
    public function getContact()
    {
        return view('web.contact');
    }

     public function postContact(Request $res)
    {
        $data = ['hoten' => $res->Name,
                  'email' => $res->Email,
                  'tinhan'=> $res->Message
              ];

        Mail::send('gmail.blank', $data, function ($message) {
            $message->from('quocvinh.tdc@gmail.com', 'Quốc Vĩnh');
            $message->to('quocvinh.tdc@gmail.com','Quốc Vĩnh')->subject('Đây là email của vĩnh');

        });
          echo "<script type='text/javascript'>
                alert('Cảm ơn bạn! , Chúng tôi sẽ Liên hệ lại với bạn sớm nhất!!!');
                window.location = '";
                    echo route('home');
                echo "'
            </script>";
    }


    /***********************************
    ******** // comment
    ************************************/
    
    public function postComment($id, Request $request)
    {
        $id_prod = $id;
        $prod = Product::find($id);
        $comment = new Comment;
        $comment->id_prod = $id_prod;
        $comment->idUser = Auth::user()->id;
        $comment->message = $request->message;
        $comment->save();
        return redirect()->route('detail',$id);
    }

    public function getListCmt()
    {
        $cmt = Comment::all();

        return view('backend.comment.listComment', ['comment' => $cmt]);
    }

     public function getDeleteCmt($id)
    {
       
        $comment = Comment::find($id);
        $comment->delete($id);
        return redirect()->route('admin.comment.list');
    
    }



    /***********************************
    ********  // sắp xếp sản phẩm
    ************************************/
   
    public function sortByPrice()
    {
        $collection = collect([
    ['name' => 'Desk', 'price' => 200],
    ['name' => 'Chair', 'price' => 100],
    ['name' => 'Bookcase', 'price' => 150],
    ]);

    $sorted = $collection->sortByDesc('price');

    $sorted->values()->all();
    }

}
	