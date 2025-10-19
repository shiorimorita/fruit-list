@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/show.css')}}">
<script src="{{asset('js/register.js')}}" defer></script>
@endsection
@section('content')

<div class="show-wrapper">

    <div class="show-link">
        <a href="/products" class="show-link__products">商品一覧</a>
        <span class="show-link__span">></span>
        <span class="show-link__span">{{$product['name']}}</span>
    </div>


    <form action="/products/{{$product['id']}}/update" method="post" class="update-form" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="show-detail">

            <div class="show-detail__img">
                <img src="{{asset('storage/' . $product['image'])}}" alt="" class="show-detail__img--img image-preview"
                    {{ $errors->has('image') ? 'hidden' : ''}}>
            </div>

            <div class="show-detail__item">
                <label for="name" class="show-detail__item--label">商品名</label>
                <input type="text" class="show-detail__item--input" id="name" name="name"
                    value="{{ $errors->has('name') ? '' : old('name',$product['name']) }}">
                <div class="detail-error">
                    @if($errors->has('name'))
                    <ul class="errors-group">
                        @foreach($errors->get('name') as $error)
                        <li class="errors-message">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <label for="name" class="show-detail__item--label">値段</label>
                <input type="text" class="show-detail__item--input" id="price" name="price"
                    value="{{$errors->has('price') ? '' : old('price',$product['price'])}}">
                <div class="detail-error">
                    @if($errors->has('price'))
                    <ul class="errors-group">
                        @foreach($errors->get('price') as $error)
                        <li class="errors-message">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <label for="name" class="show-detail__item--label">季節</label>
                <input type="hidden" name="id" value="{{$product->id}}">

                <div class="show-detail__check-group">
                    @foreach($seasons as $season)
                    <label for="" class="custom-checkbox">
                        <input type="checkbox" name="seasons[]" class="custom-checkbox__input" value="{{$season->id}}"
                            {{$errors->has('seasons') ? '' : (in_array($season->id, old('seasons',
                        $product->seasons->pluck('id')->toArray())) ?
                        'checked' : '') }}>
                        <span class="checkmark"></span>
                        <span class="label-text">{{$season->name}}</span>
                    </label>
                    @endforeach
                </div>
                <div class="detail-error">
                    @if($errors->has('seasons'))
                    <ul class="errors-group">
                        @foreach($errors->get('seasons') as $error)
                        <li class="errors-message">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <input type="file" class="show-detail__input" name="image" id="image" style="display: none;">
        <button id="fileSelect" type="button" class="custom-btn detail-custom__btn">ファイルを選択</button>
        <span class="detail-custom__btn--span"></span>
        <ul class="errors-group">
            @if($errors->has('image'))
            @foreach($errors->get('image') as $error)
            <li class="errors-message">{{$error}}</li>
            @endforeach
            @endif
        </ul>

        <label class="show-detail__item--label">商品説明</label>
        <textarea name="description" cols="30" rows="5"
            class="show-detail__description">{{$errors->has('description') ? '' : old('description', $product['description']) }}</textarea>
        <div class="detail-error">
            @if($errors->has('description'))
            <ul class="errors-group">
                @foreach($errors->get('description') as $error)
                <li class="errors-message">{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="detail-btns">
            <div class="detail-btns__wrapper btns-wrapper">
                <div class="detai-btn__back">
                    <input type="button" class="detai-btn__back--btn btn__back" value="戻る"
                        onclick="location.href='//localhost/products/' ">
                </div>

                <div class="detai-btn__update">
                    <input type="submit" class="detai-btns__update--btn btn-save" value="変更を保存">
                </div>
            </div>
    </form>

    <form action="/products/{{$product->id}}/delete" method="post">
        @csrf
        @method('delete')

        <div class="detai-btn__trash" {{$errors->any() ? 'hidden' : ''}}>
            <input type="image" src="{{ asset('storage/images/TiTrash.png') }}" alt="" class="detai-btn__trash">
        </div>
    </form>
</div>
</div>

@endsection