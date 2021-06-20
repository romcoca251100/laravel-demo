@extends('admin.layouts.master')
@section('head')
@endsection

@section('style')
@endsection

@section('content')
<i>Xin chào: {{ Auth::user()->name }}</i>
<a href="{{ route('logout') }}"><h3>Đăng xuất</h3></a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @if(isset($category))
        @foreach ($category as $item)
          <tr>
            <td>{{ $item->name }}</td>
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