@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <?php
                $message = Session::get('message');  // lấy cái message bên admincontroller
                if($message) {   // nếu tồn tại thì in ra
                    //echo $message;
                    echo '<span class="text-alert">'.$message.'</span>';
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    Session::put('message',null);   // đặt rỗng chỉ hiển thị đúng 1 lần
                }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Nguồn gốc</th>
                        <th>Đặc điểm ngoại hình</th>
                        <th>Cân nặng</th>
                        <th>Tuổi thọ</th>
                        <th>Giới tính</th>
                        <th>Giá cũ</th>
                        <th>Giá mới</th>
                        <th>Hình sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Hiển thị</th>
                        
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- lấy dữ liệu bằng dữ liệu trong db vd trong đoạn có 1 dữ liệu và db có 2 dữ liệu sau khi in ra code sẽ show 2 dữ liệu --}}
                    @foreach($all_product as $key => $all_pro)  {{-- all_product bên ProductController.php --}}
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{ $all_pro->product_name }}</td>
                        <td>{{ $all_pro->product_source }}</td>
                        <td>{{ $all_pro->physical }}</td>
                        <td>{{ $all_pro->product_weight }}</td>
                        <td>{{ $all_pro->product_life }}</td>
                        <td>{{ $all_pro->product_sex }}</td>
                        <td>{{ $all_pro->price_old }}</td>
                        <td>{{ $all_pro->product_price }}</td>
                        <td><img src="public/uploads/product/{{ $all_pro->product_image }}" height="100" width="100"></td>
                        <td>{{ $all_pro->category_name }}</td>
                        
                        <td><span class="text-ellipsis">
                                <?php
                                    if ($all_pro->product_status==0) {
                                ?>
                                        {{-- echo 'Ẩn'; --}}
                                        {{-- lỗi echo '<a href=".{{URL::to('/unactive-product')}}."><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>'; --}}
                                        <a href="{{URL::to('/active-product/'.$all_pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>';
                                <?php    
                                    }else {
                                ?>
                                        {{-- echo 'Hiển thị'; --}}
                                        <a href="{{URL::to('/unactive-product/'.$all_pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>';
                                <?php        
                                    }
                                ?>
                            </span></td>
                        
                        <td>
                        <a href="{{URL::to('/edit-product/'.$all_pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/'.$all_pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection