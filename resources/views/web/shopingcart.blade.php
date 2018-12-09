@extends('web.masterpage.master');
@section('content');
<style type="text/css">.table&amp;amp;gt;tbody&amp;amp;gt;tr&amp;amp;gt;td, .table&amp;amp;gt;tfoot&amp;amp;gt;tr&amp;amp;gt;td {  
   vertical-align: middle;
   }
@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,100);
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,800,300,600,700);
@import url(http://fonts.googleapis.com/css?family=Abel);
/*************************
*******Cart CSS******
**************************/

#do_action {
  margin-bottom: 50px;
}

.breadcrumbs {
  position: relative;
}

.breadcrumbs .breadcrumb li a {
  background:#FE980F;
  color: #FFFFFF;
  padding: 3px 7px;
}

.breadcrumbs .breadcrumb li a:after {
  content:"";
  height:auto;
  width: auto;
  border-width: 8px;
  border-style: solid;
  border-color:transparent transparent transparent #FE980F;
  position: absolute;
  top: 11px;
  left:48px;

}

.breadcrumbs .breadcrumb > li + li:before {
  content: " ";
}

#cart_items .cart_info {
  border: 1px solid #E6E4DF;
  margin-bottom: 50px
}


#cart_items .cart_info .cart_menu>td {
  background: #FE980F;
  color: #fff;
  font-size: 18px;
  font-family: 'Roboto', sans-serif;
  font-weight: normal;
}

#cart_items .cart_info .table.table-condensed thead tr {
  height: 51px;
}


#cart_items .cart_info .table.table-condensed tr {
  border-bottom: 1px solid#F7F7F0
}

#cart_items .cart_info .table.table-condensed tr:last-child {
  border-bottom: 0
}

.cart_info table tr td {
  border-top: 0 none;
  vertical-align: inherit;
}


#cart_items .cart_info .image {
  padding-left: 30px;
}


#cart_items .cart_info .cart_description h4 {
  margin-bottom: 0
}

#cart_items .cart_info .cart_description h4 a {
  color: #363432;
  font-family: 'Roboto',sans-serif;
  font-size: 20px;
  font-weight: normal;

}

#cart_items .cart_info .cart_description p {
  color:#696763
}


#cart_items .cart_info .cart_price p {
  color:#696763;
  font-size: 18px
}


#cart_items .cart_info .cart_total_price {
  color: #FE980F;
  font-size: 24px;
}

.cart_action a{
  color: red;
  font-size: 20px;
}

.cart_product {
  display: block;
  margin: 15px -70px 10px 25px;
}

.cart_quantity_button a {
  background:#F0F0E9;
  color: #696763;
  display: inline-block;
  font-size: 16px;
  height: 28px;
  overflow: hidden;
  text-align: center;
  width: 35px;
  float: left;
}


.cart_quantity_input {
  color: #696763;
  float: left;
  font-size: 16px;
  text-align: center;
  font-family: 'Roboto',sans-serif;
  
}


.cart_delete  {
  display: block;
  margin-right: -12px;
  overflow: hidden;
}


.cart_delete a {
  background:#F0F0E9;
  color: #FFFFFF;
  padding: 5px 7px;
  font-size: 16px
}

.cart_delete a:hover {
  background:#FE980F
}


.bg h2.title {
  margin-right:0;
  margin-left:0;
  margin-top: 0;
}

.heading h3 {
  color: #363432;
  font-size: 20px;
  font-family: 'Roboto', sans-serif;
}

.heading p {
  color: #434343;
  font-size: 16px;
  font-weight: 300;
}


#do_action .total_area {
  padding-bottom: 18px !important;
}

#do_action .total_area, #do_action .chose_area {
  border: 1px solid #E6E4DF;
  color: #696763;
  padding: 30px 25px 30px 0;
  margin-bottom: 80px;
}

.total_area span {
  float: right;
}

.total_area ul li {
  background:#E6E4DF;
  color: #696763;
  margin-top: 10px;
  padding: 7px 20px;
}


.user_option label {
  color: #696763;
  font-weight: normal;
  margin-left: 10px;
}


.user_info {
  display: block;
  margin-bottom: 15px;
  margin-top: 20px;
  overflow: hidden;
}

.user_info label {
  color: #696763;
  display: block;
  font-size: 15px;
  font-weight: normal;

}

.user_info .single_field {
  width: 31%
}

.user_info .single_field.zip-field input {
  background: transparent;
  border: 1px solid#F0F0E9
}

.user_info > li {
  float: left;
  margin-right: 10px
}

.user_info > li > span {
}

.user_info input, select, textarea {
  background: #F0F0E9;
  border:0;
  color: #696763;
  padding: 5px;
  width: 100%;
  border-radius: 0;
  resize: none
}

.user_info select:focus {
  border: 0
}


.chose_area .update {
  margin-left: 40px;
}

.update, .check_out {
  background: #FE980F;
  border-radius: 0;
  color: #FFFFFF;
  margin-top: 18px;
  border: none;
  padding: 5px 15px;
}
.update{
    margin-left: 40px;
}

.check_out {
  margin-left: 20px
}



/*************************
*******checkout CSS******
**************************/

.step-one {
  margin-bottom: -10px
}

.register-req, .step-one .heading {
  background: none repeat scroll 0 0 #F0F0E9;
  color: #363432;
  font-size: 20px;
  margin-bottom: 35px;
  padding: 10px 25px;
  font-family: 'Roboto', sans-serif;
}

.checkout-options {
  padding-left: 20px
}


.checkout-options h3 {
  color: #363432;
  font-size: 20px;
  margin-bottom: 0;
  font-weight: normal;
  font-family: 'Roboto', sans-serif;
}

.checkout-options p {
  color: #434343;
  font-weight: 300;
  margin-bottom: 25px;
}

.checkout-options .nav li {
  float: left;
  margin-right: 45px;
  color: #696763;
  font-size: 18px;
  font-family: 'Roboto', sans-serif;
  font-weight: normal;
}

.checkout-options .nav label {
  font-weight: normal;
}

.checkout-options .nav li a {
  color: #FE980F;
  font-size: 18px;
  font-weight: normal;
  padding: 0
}

.checkout-options .nav li a:hover {
  background: inherit;
}

.checkout-options .nav i {
  margin-right: 10px;
  border-radius: 50%;
  padding: 5px;
  background: #FE980F;
  color:#fff;
  font-size: 14px;
  padding: 2px 3px;
}


.register-req  {
  font-size: 14px;
  font-weight: 300;
  padding: 15px 20px;
  margin-top: 35px;

}

.register-req p {
  margin-bottom: 0
}



.shopper-info p, 
.bill-to p, 
.order-message p {
  color: #696763;
  font-size: 20px;
  font-weight: 300
}


.shopper-info .btn-primary {
  background: #FE980F;
  border: 0 none;
  border-radius: 0;
  margin-right: 15px;
  margin-top: 20px;
}


.form-two, .form-one {
  float: left;
  width: 30%
}

.shopper-info > form > input, 
.form-two > form > select,
.form-two > form > input, 


.form-one input {
  background:#F0F0E9;
  border: 0 none;
  margin-bottom:10px;
  padding: 10px;
  width: 100%;
  font-weight: 300
}

.form-two > form > select {
  padding:10px 5px
}

.form-two {
  margin-left: 5%
}


.order-message textarea {
  font-size: 12px;
  height: 335px;
  margin-bottom: 20px;
  padding: 15px 20px;
}

.order-message label {
  font-weight:300;
  color: #696763;
  font-family: 'Roboto', sans-serif;
  margin-left: 10px;
  font-size: 14px
}


.review-payment h2 {
  color: #696763;
  font-size: 20px;
  font-weight: 300;
  margin-top: 45px;
  margin-bottom: 20px
}

.payment-options {
  margin-bottom:125px;
  margin-top: -25px
}

.payment-options span label {
  color: #696763;
  font-size: 14px;
  font-weight: 300;
  margin-right: 30px;
}

#cart_items .cart_info 
.table.table-condensed.total-result {
  margin-bottom: 10px;
  margin-top: 35px;
  color: #696763
}

#cart_items .cart_info 
.table.table-condensed.total-result tr {
  border-bottom: 0
}

#cart_items .cart_info 
.table.table-condensed.total-result span {
  color: #FE980F;
  font-weight: 700;
  font-size: 16px
}

#cart_items .cart_info 
.table.table-condensed.total-result 
.shipping-cost {
  border-bottom: 1px solid #F7F7F0;
}
   }
</style>
  <div class="container">
            <div class="row">
                <form action="{{ url('/checkout') }}" method="post">
                   {{ csrf_field() }}
                  @if(Auth::user())
                  
                  @else
                   
                <div class="col-sm-12 clearfix">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="{{asset('/')}}">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ol>
                        </div>
                        <div class="bill-to">
                            <p>Thông tin khách hàng</p>
                                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-one">
                                    <input type="text" name="fullName" value="{{ old('fullName') }}" placeholder="Họ và Tên *">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email *">
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value="{{ old('message') }}"  placeholder="Ghi chú" rows="10"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-12">
                    <section id="cart_items">
                        <div class="container">
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Ảnh minh họa</td>
                                        <td class="description">Tên sản phẩm</td>
                                        <td class="price">Giá</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="total">Tổng</td>
                                         <td class="total">Hành Động</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($content))
                                        @foreach($content as $item)
                                            <tr>
                                                <td class="cart_product" style="margin: 0px">
                                                 
                                                       <img width="100px" height="100px" src="{{ asset('images/'.$item->options->img) }}" alt="" />
                                                  
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href="{{ asset('detail/' . $item->id) }}">{{ $item->name }}</a></h4>

                                                    <p>ID: {{ $item->id }}</p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>{{ number_format($item->price)}} VNĐ</p>
                                                </td>
                                                <td class="cart_quantity">
                                                    {{ $item->qty }}
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">{{ number_format($item->subtotal)}}
                                                         VNĐ</p>
                                                </td>
                                                 <td class="cart_action">
                                                  <a href="{{ route('deleteproduct', ['id' => $item->rowId])  }}"><i class="glyphicon glyphicon-remove">Delete</i></a>
                                                  </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">&nbsp;
                                            <span>
                                          

                                            </td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tbody>
                                                    <tr>
                                                        <td>Tổng Tiền:</td>
                                                        <td><span>{{ $total }} VNĐ</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-default check_out"
                                                               href="{{ url('checkout')}}">Gửi đơn hàng</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>You have no items in the shopping cart</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;
                                                <a class="btn btn-default update" href="{{ url('/')}}">Mua hàng</a>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <!--/#cart_items-->
                </div>
                </form>
            </div>
        </div>
@endsection