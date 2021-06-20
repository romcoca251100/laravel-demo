@extends('admin.layouts.master')
@section('head')
@endsection

@section('style')
@endsection

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    </div>
@endif

@if (session('thongbao'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ session('thongbao') }} </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<form action="{{ route('admin.category.store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
      <label for="name">Tên loại sản phẩm</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="status">Example select</label>
        <select class="form-control" id="status" name="status">
        <option value="" selected disabled>-- Chọn trạng thái --</option>
          <option value="1">Hiển thị</option>
          <option value="0">Ẩn</option>
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
@endsection

@section('script')
@endsection