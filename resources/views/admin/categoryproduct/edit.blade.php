@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm
                    <small>Chỉnh sửa</small>
                </h1>                
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
            </div>
            <form action="admin/categoryproduct/edit/{{$catePro->id}}" method="POST" id="formCategoryProduct">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   

                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" type="text" name="Ten" placeholder="Nhập tên nhóm sản phẩm mới" required maxlength="100" minlength="3" value="{{$catePro->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Nhóm danh mục</label>
                         <select class="form-control" name="NhomDanhMuc">
                            @foreach($cateGroup as $child)
                                <option 
                                    @if($catePro->idCategoryGroup == $child->id)
                                    {{"selected"}}
                                    @endif
                                value="{{$child->id}}">{{$child->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phần trăm giảm giá cho danh mục(%)</label>
                        <input class="form-control" type="number" maxlength="2" minlength="0" name="sale" value="{{$catePro->sale}}"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Ngày bắt đầu khuyến mãi</label>
                        <input type='text' class="form-control" id='datetimepicker1' name="start_date_sale" value="{{ date ("d-m-Y H:i:s", strtotime($catePro->start_date_sale)) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Ngày kết thúc khuyến mãi</label>
                        <input type='text' class="form-control" id='datetimepicker2' name="end_date_sale" value="{{ date ("d-m-Y H:i:s", strtotime($catePro->end_date_sale)) }}" />
                    </div>

                    <div class="form-group">
                        <label>Ảnh giảm giá</label>                        
                        <input id="ckfinder-input-cate-pro" type="hidden" placeholder="Chọn hình ảnh" required maxlength="190" name="sale_img" value="{{ $catePro->sale_img }}">
                        <div><img id="img-cate-pro" src="{{ $catePro->sale_img }}" alt="" class="img-edit img-fluid"></div>
                        <div class="input-group-btn">
                          <button id="ckfinder-popup-cate-pro" class="btn btn-info" type="button">Chọn ảnh</button>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1"
                            @if($catePro->enable == 1)
                             checked
                             @endif
                             type="radio">Hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" 
                            @if($catePro->enable == 0)
                             checked
                             @endif
                            type="radio">Khóa
                        </label>
                    </div>   
                    <br>
                    <button type="submit" id="submit" disabled class="btn btn-warning">Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>                
                </div>
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
