<?php

namespace App\Http\Controllers;

use DB;

// thư viện use session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect; // redirect giống như return trả về thành công hay thất bại
session_start();
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request) {
    
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;

    	// lấy all thông tin dựa vào id đã truyền vào
    	$product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

    	// Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    	// Cart::destroy(); // hủy hết các đơn
    	$data['id'] = $product_info->product_id;
    	$data['qty'] = $quantity;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
    	$data['weight'] = '123';
    	$data['options']['image'] = $product_info->product_image;
    	Cart::add($data);
    	

    	// echo '<pre>';
    	// print_r($data);
    	// echo '<pre>';
    	return Redirect::to('/show-cart'); // 
    }

    public function show_cart() {

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get();

        return view('pages.cart')->with('category',$cate_product)->with('all_product',$all_product);

    }
    // $rowId được truyền từ web.php
    public function delete_cart($rowId) {
    	// đưa sp về số 0, tức là sp sẽ ko tồn tại
    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');

    }

    public function update_cart(Request $request) {
    	$rowId = $request->rowId_cart;
    	$qty = $request->quantity_cart;
    	Cart::update($rowId,$qty);
    	return Redirect::to('/show-cart');
    }
}
