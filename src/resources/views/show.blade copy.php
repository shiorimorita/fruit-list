@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/show.css')}}">
@endsection
@section('content')

<input type="text" name="name[]">
<input type="text" name="name[]">

<div class="show-wrapper">

    <div class="show-link">
        <a href="/products" class="show-link__products">商品一覧</a>
        <span class="show-link__span">></span>
        <span class="show-link__span">{{$product['name']}}</span>
    </div>

    <div class="show-detail">

        <div class="show-detail__img">
            <img src="{{asset('storage/' . $product['image'])}}" alt="" class="show-detail__img--img">
        </div>

        <form action="/products/{{$product['id']}}/update" method="post" class="update-form"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="show-detail__item">
                <label for="name" class="show-detail__item--label">商品名</label>
                <input type="text" class="show-detail__item--input" id="name" name="name" value="{{$product['name']}}">
                <label for="name" class="show-detail__item--label">値段</label>
                <input type="text" class="show-detail__item--input" id="price" name="price"
                    value="{{$product['price']}}">
                <label for="name" class="show-detail__item--label">季節</label>
                <input type="hidden" name="id" value="{{$product->id}}">

                <div class="show-detail__check-group">
                    @foreach($seasons as $season)
                    <label>
                        <input type="checkbox" name="seasons[]" class="show-detail__checkbox" value="{{$season->id}}"
                            {{$product->seasons->contains($season->id) ? 'checked' : ''}}>{{$season->name}}
                    </label>
                    @endforeach
                </div>
            </div>

    </div>
    <input type="file" class="show-detail__input" name="image">

    <label for="" class="show-detail__item--label">商品説明</label>

    <textarea name="description" id="" cols="30" rows="5" class="show-detail__description">{{$product['description']}}
    </textarea>

    <div class="detail-btns">

        <div class="detail-btns__wrapper">
            <div class="detai-btn__back">
                <input type="button" class="detai-btn__back--btn" value="戻る">
            </div>

            <div class="detai-btn__update">
                <input type="submit" class="detai-btns__update--btn" value="変更を保存">
            </div>
        </div>
        </form>

        <form action="/products/{{$product->id}}/delete" method="post">
            @csrf
            @method('delete')
            <div class="detai-btn__trash">
                <input type="image" src="{{ asset('storage/images/TiTrash.png') }}" alt="" class="detai-btn__trash">
            </div>
        </form>
    </div>

</div>

@endsection