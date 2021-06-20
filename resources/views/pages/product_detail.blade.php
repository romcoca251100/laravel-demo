@extends('pages.layouts')
@section('head')
<title>{{ $product->name }}</title>
@endsection

@section('style')
@endsection

@section('content')
<h1>{{ $product->name }}</h1>
<i style="color: red">Giá: {{ number_format($product->price) }} VNĐ</i>
<p>
    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="450" height="400">
</p>
<hr>
<p>Loại sản phẩm: <a href="{{ route('page.getCategory', ['id'=>$product->category->id , 'slug' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
<p>Thương hiệu: {{ $product->brand->name }}</p>
<hr>
<h3>Mô tả:</h3>
<p>{{ $product->desc }}</p>

@endsection

@section('script')
@endsection