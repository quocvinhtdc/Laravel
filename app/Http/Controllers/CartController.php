<?php

namespace App\Http\Controllers;

use Request;
use Cart, Auth;
use Validator;
use App\Customer;
use App\BillDetail;
use App\Bill;
use App\Product;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
	 // chức năng giỏ hàng
    public function shopingcart($id)
    {
        $prod_buy = Product::where('id', $id)->first();
        Cart::add(array('id' => $id, 'name' => $prod_buy->name, 'qty' => 1, 'price' => $prod_buy->price,
         'options' => array('img' => $prod_buy->image)));

        $content = Cart::content();
        return redirect()->route('cart');
    }

    public function cart()
    {
        $content = Cart::content();
        $total   = Cart::total();
        return view('web.shopingcart', ['content' => $content, 'total' => $total]);
    }

    public function deleteproduct($id)
    {
        Cart::remove($id);
        return redirect()->route('cart');
    }

    //============

    public function getListCart()
    {
         $bill = Bill::orderBy('id', 'DESC')->get();
        return view('backend.ShopingCart.listCart', ['bill' => $bill]);
    }


     public function getDeleteBill($id)
    {
       
        $bill = Bill::find($id);
        $bill->delete($id);
        return redirect()->route('admin/shoping-cart/list');
    
    }

    public function getListDetail($id)
    {
        $detail = BillDetail::find($id);
        return view('backend.ShopingCart.listDetail', ['detail' => $detail]);
    }


  //========================


     public function getCheckOut() {
         $content = Cart::content();
        $total   = Cart::total();
        return view('web.shopingcart', ['content' => $content, 'total' => $total]);
    }

    public function postCheckOut(Request $request) {
        $cartInfor = Cart::content();
       
        // validate
        $rule = [
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phoneNumber' => 'required|digits_between:10,12'

        ];
        
        $messages = [
            'fullName.required' => 'Chưa nhập họ tên',
            'email.required' => 'chưa nhập email',
            'email.email' => 'email không đúng',
            'address.required' => 'chưa nhập địa chỉ',
            'phoneNumber.required' => 'chưa nhập số điện thoại',
            'phoneNumber.digits_between:10,12' => 'số điện thoại không đúng'

        ];

         if(!(Auth::user()))
        {
            $validator = Validator::make(Input::all(), $rule, $messages);
        
            if ($validator->fails()) {
                return redirect('/checkout')
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        
       
             if(Auth::user())
            {
                $customer = new Customer;
                $customer->name = Auth::user()->name;
                $customer->email = Auth::user()->email;
                $customer->address = "HCM";
                $customer->phone_number = Auth::user()->phone;
                //$customer->note = $request->note;
                $customer->save();

                $bill = new Bill;
                $bill->customer_id = Auth::user()->id;
                $bill->date_order = date('Y-m-d H:i:s');
                $bill->total = str_replace(',', '', Cart::total());
                $bill->note = "Mua hàng";
                $bill->save();
                
            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDetail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
          // del
           Cart::destroy();
            }
            else
            {
                 // save
                $customer = new Customer;
                $customer->name = Request::get('fullName');
                $customer->email = Request::get('email');
                $customer->address = Request::get('address');
                $customer->phone_number = Request::get('phoneNumber');
                //$customer->note = $request->note;
                $customer->save();

                $bill = new Bill;
                $bill->customer_id = $customer->id;
                $bill->date_order = date('Y-m-d H:i:s');
                $bill->total = str_replace(',', '', Cart::total());
                $bill->note = Request::get('note');
                $bill->save();

            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDetail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
          // del
           Cart::destroy();
            }
           

            
      

        return redirect()->route('cart');
    }
}
