@extends('layouts.common')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
<script src="{{asset('js/register.js')}}" defer></script>
@endsection
@section('content')
<div class="register-content">
    @csrf
    <div class="register__inner">
        <form action="/products/register" method="post" enctype="multipart/form-data" class="register-form">
            @csrf
            <h2 class="register-content__title sub-title">商品登録</h2>
            <div class="register-content__group">
                <label for="name" class="register-content__label">商品名<span
                        class="register-content__label--span">必須</span></label>
                <input type="text" class="register-content__input input-common" placeholder="商品名を入力" id="name"
                    name="name" value="{{old('name')}}">
            </div>
            <ul class="errors-group">
                @if($errors->has('name'))
                @foreach($errors->get('name') as $error)
                <li class="errors-message">{{$error}}</li>
                @endforeach
            </ul>
            @endif

            <div class="register-content__group">
                <label for="price" class="register-content__label">値段<span
                        class="register-content__label--span">必須</span></label>
                <input type="number" class="register-content__input input-common" placeholder="値段を入力" id="price"
                    name="price" value="{{old('price')}}">
            </div>
            <ul class="errors-group">
                @if($errors->has('price'))
                @foreach($errors->get('price') as $error)
                <li class="errors-message">{{$error}}</li>
                @endforeach
                @endif
            </ul>

            <div class="register-content__group">
                <label for="image" class="register-content__label">商品画像<span
                        class="register-content__label--span">必須</span></label>
                <!-- preview -->
                <img src="" alt="画像プレビュー" class="image-preview" style="display: none;">
                <input type="file" name="image" class="register-content__image" id="image" style="display: none;">
                <button id="fileSelect" type="button" class="custom-btn register-custom__btn">ファイルを選択</button>
                <span class="detail-custom__btn--span"></span>

                <img src="" alt="">
                <ul class="errors-group">
                    @if($errors->has('image'))
                    @foreach($errors->get('image') as $error)
                    <li class="errors-message">{{$error}}</li>
                    @endforeach
                    @endif
                </ul>
            </div>

            <!-- saeason -->
            <div class="register-content__group">
                <label for="name" class="register-content__label">季節<span
                        class="register-content__label--span">必須</span><span
                        class="register-content__label--span">複数選択可</span></label>
                <!-- checkbox -->
                <div class="register-content__checkbox">
                    @foreach($seasons as $season)
                    <label for="" class="custom-checkbox">
                        <input type="checkbox" class="custom-checkbox__input" value="{{$season->id}}" name="seasons[]"
                        {{in_array($season->id, old('seasons',[])) ? 'checked' : ''}}>
                        <span class="checkmark"></span>
                        <span class="label-text">{{$season->name}}</span>
                    </label>
                    @endforeach
                </div>
                <ul class="errors-group">
                    @if($errors->has('seasons'))
                    @foreach($errors->get('seasons') as $error)
                    <li class="errors-message">{{$error}}</li>
                    @endforeach
                    @endif
                </ul>
            </div>

            <div class="register-content__group">
                <label for="description" class="register-content__label">商品説明<span
                        class="register-content__label--span">必須</span></label>
                <textarea name="description" id="description" placeholder="商品の説明を入力" rows="5" cols="20"
                    class="register-content__textarea input-common">{{old('description')}}</textarea>
                <ul class="errors-group">
                    @if($errors->has('description'))
                    @foreach($errors->get('description') as $error)
                    <li class="errors-message">{{$error}}</li>
                    @endforeach
                    @endif
                </ul>
            </div>

            <div class="register-content__btns btns-wrapper">
                <input type="button" value="戻る" class="register-content__btns--back btn__back"
                    onclick="location.href='/products/' ">
                <input type="submit" value="登録" class="register-content__btns--register btn-save">
            </div>
        </form>
    </div>
</div>
@endsection