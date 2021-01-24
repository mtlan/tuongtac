<?php

namespace App\Http\Controllers;

use DB;

// thư viện use session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect; // redirect giống như return trả về thành công hay thất bại
session_start();
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else {
            return Redirect::to('admin')->send();
        }
    }
    public function Add_Product() {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function All_Product() {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->orderby('tbl_product.product_id','desc')->get();

        $manager_product = view('admin.all_product')->with('all_product',$all_product);  // all_pro biến, $all_category_product sẽ gán cho biến all_pro
        return view('admin_layout')->with('admin.all_product',$manager_product);  // admin_layout sẽ chứa admin.all_product và sẽ gán vào biến $manager_category_product
    }
    public function Save_Product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;  // product_name là name trong add_product.blade.php
        $data['price_old'] = $request->price_old;
        $data['product_price'] = $request->product_price;
        $data['product_source'] = $request->product_source;
        $data['physical'] = $request->physical;
        $data['product_weight'] = $request->product_weight;
        $data['product_life'] = $request->product_life;
        $data['product_sex'] = $request->product_sex;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        
        // error sau khi chèn trong csdl ko có ảnh 
        $get_image = $request->file('product_image');  // kiểm tra có thêm ảnh hay ko, kích thước ảnh bn mới dc upload, dung lượng bn, up ảnh vào thư mục upload
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            // thêm ảnh xong ra số.jpg ko chuẩn SEO
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();  //lấy đuôi mở rộng
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;  // nếu chọn ảnh thì thêm vào trường product_image
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return redirect('Add-product');
        }

        $data['product_image'] = '';
        // error sau khi chèn trong csdl ko có ảnh, giải quyết vào add_product thêm enctype="multipart/form-data" vào form

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return redirect('All-product');
    }
    
    public function active_product($pro_id) {
        $this->AuthLogin();
        // update('category_status'=>1); ERROR, GT update('[category_status'=>1]); nó sẽ update 1 cái mảng 
        DB::table('tbl_product')->where('product_id',$pro_id)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('All-product');
    }
    public function unactive_product($pro_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$pro_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('All-product');
    }
    public function edit_Product($pro_id) {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        
        $edit_product = DB::table('tbl_product')->where('product_id',$pro_id)->get();  // ->first() limit 1 lấy ra sp đầu tiên nếu first lỗi
        // Vì edit-category-product mặc định lấy ra nó so sánh id chỉ lấy chứa 1 id này vd id=3 sẽ ko cần first mặc định có 1 id thôi nó chỉ lấy ra cái dữ liệu thuộc id này thôi chứ ko lấy all mà ko phải dùng first
        $manager_product = view('admin.edit_product')->with('edit_pro',$edit_product)->with('cate_product',$cate_product);  // all_pro biến, $all_category_product sẽ gán cho biến all_pro
        return view('admin_layout')->with('admin.edit_product',$manager_product);  // admin_layout sẽ chứa admin.all_product và sẽ gán vào biến $manager_category_product
    }
    public function update_Product(Request $request, $pro_id) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;  // product_name là name trong add_product.blade.php
        $data['price_old'] = $request->price_old;
        $data['product_price'] = $request->product_price;
        $data['product_source'] = $request->product_source;
        $data['physical'] = $request->physical;
        $data['product_weight'] = $request->product_weight;
        $data['product_life'] = $request->product_life;
        $data['product_sex'] = $request->product_sex;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        

        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            // thêm ảnh xong ra số.jpg ko chuẩn SEO
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();  //lấy đuôi mở rộng
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;  // nếu chọn ảnh thì thêm vào trường product_image
            DB::table('tbl_product')->where('product_id',$pro_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return redirect('All-product');
        }        
        

        DB::table('tbl_product')->where('product_id',$pro_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('All-product');

    }
    public function delete_Product($pro_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$pro_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('All-product');
    }

    // end admin page

    public function detail($product_id) {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); // sắp xếp category_id
        
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(8)->get();

        // dòng lấy ra chi tiết sản phẩm thuộc danh mục đó
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.product_id',$product_id)->get();
        // vì trang product_detail có danh mục, nxb nên join 2 bảng

        // Sản phẩm liên quan đến danh mục đó
        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
        }

        // lấy ra all sp thuộc category_id
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)->get();
        // whereNotIn lấy ra sp trừ sp ở mục chi tiết,ko trùng vs sp đã xuất hiện trang chi tiết

        return view('pages.product_detail')->with('category',$cate_product)
        ->with('all_product',$all_product)->with('product_details',$details_product)
        ->with('relate',$related_product);
    }
}
