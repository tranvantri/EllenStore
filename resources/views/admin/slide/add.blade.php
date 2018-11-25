@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Thêm</small>
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
            <form action="admin/slide/add" method="POST" id="formSlide">
                {{ csrf_field() }}
                <div class="col-lg-7" style="padding-bottom:120px">   
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" type="text" name="tieude" placeholder="Nhập tiêu đề" minlength="6" required maxlength="100" value="{{ old('tieude') }}" />
                    </div>
                    <div class="form-group">
                        <label>Liên kết</label>
                        <input class="form-control" type="text" required maxlength="100" minlength="6" name="link" placeholder="Nhập liên kết" value="{{ old('link') }}" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="enable" value="1" checked type="radio">Hoạt động
                        </label>
                        <label class="radio-inline">
                            <input name="enable" value="0" type="radio">Khóa
                        </label>
                    </div>   
                    <div class="form-group">
                        <label>Chọn ảnh</label>
                        <div class="input-group">
                            <input id="ckfinder-input-slide" type="text" class="form-control" placeholder="Chọn hình ảnh" required maxlength="190" name="img">
                            <div class="input-group-btn">
                              <button id="ckfinder-popup-slide" class="btn btn-warning" type="button">Browse Server</button>
                            </div>
                        </div>
                    </div>       

                    <button type="submit" id="submit" disabled class="btn btn-warning">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
