@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')
<div class="products-wrapper">

    <div class="flex-container">
        <h2 class="flex-container__title sub-title">商品一覧</h2>
        <a href="/products/register" class="flex-container__register--link">+ 商品を追加</a>
    </div>

    <div class="flex-product">
        <div class="product-function">
            <form action="/products/search" method="get" class="search-form">
                <input type="text" class="product-function__input" value="{{request('keyword')}}" placeholder="商品名で検索"
                    name="keyword">
                <input type="submit" value="検索" class="product-function__search--btn">

                <h3 class="product-function--text">価格順で表示</h3>

                <div class="custom-select-wrapper">
                    <select name="sort" id="" class="product-function__select" onchange="this.form.submit()">
                        <option value="" class="product-function__select--option" disabled selected>価格で並び替え</option>
                        <option value="price_up" class="product-function__select--option" {{request('sort')=='price_up'
                            ? 'selected' : '' }}>価格が高い順</option>
                        <option value="price_down" class="product-function__select--option"
                            {{request('sort')=='price_down' ? 'selected' : '' }}>価格が安い順</option>
                    </select>
                </div>
            </form>

            @if(! empty($sort_label))
            <div class="sort_label__tag">
                <span class="sort_label__tag--text">{{$sort_label}}</span>
                <a href="/products/" class="sort_label__tag__link">×</a>
            </div>
            @endif
        </div>

        <div class="product-imges">
            @foreach($products as $product)
            <div class="product-img__group">
                <a href="/products/{{$product->id}}" class="product-detail__link">

                    <img src="{{asset('storage/' . $product->image)}}" alt="" class="product-img__group--img">
                    <div class="product-img__text">
                        <p class="product-img__text--name">{{$product->name}}</p>
                        <p class="product-img__text--price">{{ "¥".$product->price}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="pagination--wrapper">
        {{$products->appends(request()->all())->links()}}
    </div>
</div>
@endsection