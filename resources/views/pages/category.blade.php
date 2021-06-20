@extends('pages.layouts')
@section('head')
<title>{{ $categorys->name }}</title>
@endsection

@section('style')
@endsection

@section('content')
<h1>{{ $categorys->name }}</h1>
<hr>
<div class="row">
    @if (isset($categorys))
        @foreach ($categorys->product as $item)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body">
                <a href="{{ route('page.getProduct', ['id'=>$item->id , 'slug' => $item->slug]) }}"><h5 class="card-title">{{ $item->name }}</h5></a>
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