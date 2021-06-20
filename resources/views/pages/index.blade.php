@extends('pages.layouts')
@section('head')
    <title>Trang chủ</title>
@endsection

@section('style')
@endsection

@section('content')
<div class="row">
    @if (isset($products))
        @foreach ($products as $item)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->name }}</h5>
                  <p class="card-text">{{ $item->desc }}</p>
                  <a href="{{ route('page.getProduct', ['id'=>$item->id , 'slug' => $item->slug]) }}" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    
</div>
@endsection

@section('script')
@endsection