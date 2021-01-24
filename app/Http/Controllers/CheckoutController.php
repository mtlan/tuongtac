<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

// thư viện use session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect; // redirect giống như return trả về thành công hay thất bại
session_start();
use Cart;


class CheckoutController extends Controller
{
	public function login_checkout() {
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        

		return view('pages.login_register')->with('category',$cate_product);
	}

	public function add_customer(Request $request) {

		$data = array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_phone'] = $request->customer_phone;
		$data['customer_email'] = $request->customer_email;
		$data['customer_password'] = md5($request->customer_password);
		

		// insertGetId() nó lấy data id (khi insert lấy luôn data vừa lấy insert)
		$customer_id = DB::table('tbl_customers')->insertGetId($data);

		// lấy insertGetId nó vừa insert vào nó sẽ lấy data cái mà insert nó truyền vào $insert_customer
		// $insert_customer chứa all data của cái trường vừa mới insert
		Session::put('customer_id',$customer_id);
		Session::put('customer_name',$request->customer_name);

		return Redirect::to('/checkout');

	}

	public function checkout() {
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
       

		return view('pages.checkout')->with('category',$cate_product);
	}

	public function save_checkout_customer(Request $request) {
		// inser thông tin địa chỉ
		$data = array();
		$data['shipping_firstname'] = $request->shipping_firstname;
		$data['shipping_lastname'] = $request->shipping_lastname;
		$data['shipping_country'] = $request->shipping_country;
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_phone'] = $request->shipping_phone;
		$data['shipping_addressone'] = $request->shipping_addressone;
		$data['shipping_addresstwo'] = $request->shipping_addresstwo;
		$data['shipping_city'] = $request->shipping_city;
		$data['shipping_note'] = $request->shipping_note;


		$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

		Session::put('shipping_id',$shipping_id);

		return Redirect::to('/payment');

	} 
	// lấy thông tin mua hàng và thông tin chuyển hàng, tức nếu đăng nhập và điền thông tin mua hàng
	public function payment() {
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        

        return view('pages.search.payment')->with('category',$cate_product);
	}

	public function order_place(Request $request) {
		// $content = Cart::content();
		// echo $content;
		// insert hình thức thanh toán
		$data = array();
		$data['payment_method'] = $request->payment_option;
		$data['payment_status'] = 'Đang chờ xử lý';
		
		// khi insert vào sẽ lấy id và truyền vào $payment_id
		$payment_id = DB::table('tbl_payment')->insertGetId($data);

		// insert order
		$order_data = array();
		$order_data['customer_id'] = Session::get('customer_id');
		$order_data['shipping_id'] = Session::get('shipping_id');
		$order_data['payment_id'] = $payment_id;
		$order_data['order_total'] = Cart::subtotal();
		$order_data['order_status'] = 'Đang chờ xử lý';
		$order_id = DB::table('tbl_order')->insertGetId($order_data);

		// insert order details
		$content = Cart::content();
		foreach ($content as $v_content) {
			// vd 10 sp sẽ chạy vòng lặp đủ 10sp nếu bỏ ngoài sẽ lấy sp cuối cùng
			$order_d_data['order_id'] = $order_id;
			$order_d_data['product_id'] = $v_content->id;
			$order_d_data['product_name'] = $v_content->name;
			$order_d_data['product_price'] = $v_content->price;
			$order_d_data['product_sales_quantity'] = $v_content->qty;
			DB::table('tbl_order_details')->insert($order_d_data);
		}
		if($data['payment_method']==1) {
			echo "Thanh toán thẻ ATM";
		}elseif ($data['payment_method']==2) {
			// hủy đơn hàng sau khi thanh toán xong trở lại phiên ban đầu
			Cart::destroy();
			$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        	
			return view('pages.search.handcash')->with('category',$cate_product);
			// echo "Tiền mặt";
		}else {
			echo "Paypal";
		}

		// return Redirect::to('/payment');
	}

	public function logout_checkout() {
		Session::flush();
		return Redirect::to('/login-checkout');
		
	}

	public function login_customer(Request $request) {
		$customer_email = $request->customer_email;
		$customer_password = md5($request->customer_password);

		// so sánh tbl_admin
        $result = DB::table('tbl_customers')->where('customer_email',$customer_email)->where('customer_password',$customer_password)->first();
        // echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        // return view('pages.home');
        // if(isset($result)) {
        //     return view('pages.home');
        // }
        if($result) {
        	Session::put('customer_id',$result->customer_id);
        	// khi lấy ra hàng trùng email,password
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
        
	}

	public function manager_order() {
		// .* chọn all
		
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();

        $manager_order = view('admin.manager_order')->with('all_order',$all_order);
		return view('admin_layout')->with('admin.manager_order',$manager_order);
		// lấy admin_layout và lấy admin_order
	}    
}
