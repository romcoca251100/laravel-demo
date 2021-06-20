@extends('admin.layouts.master')
@section('head')
@endsection

@section('style')
@endsection

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Loại sản phẩm</th>
        <th scope="col">Thương hiệu</th>
        <th scope="col">tên sản phẩm</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Giá</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($products))
        @foreach ($products as $item)
          <tr>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->brand->name }}</td>
            <td>{{ $item->name }}</td>
            <td><img src="{{ $item->image }}" alt="{{ $item->name }}" width="250" height="200"></td>
            <td>{{ number_format($item->price) }} VNĐ</td>
            <td>{{ $item->desc }}</td>
            <td>
              @if ($item->status)
                Hiển thị
              @else
                Ẩn
              @endif
            </td>
            <td>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
@endsection

@section('script')
@endsection