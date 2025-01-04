@extends('layouts.default')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<table>
    <div class="admin">
        <h2 class="admin__heading content__heading">商品一覧</h2>
            <div class="admin__inner">
                <form class="search-form" action="/search" method="get">
                @csrf
                    <div class="search-form__actions">
                        <input class="search-form__keyword-input" type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
                        <input class="search-form__search-btn btn" type="submit" value="検索">
                    </div>
                </form>
                <div class="search-form__price">価格順で表示</div>
                    <select class="search-form__gender-select" name="price" value="{{request('price')}}">
                        <option disabled selected>価格で並び替え</option>
                        <option value="1" @if( request('price')==1 ) selected @endif>高い順に表示</option>
                        <option value="2" @if( request('price')==2 ) selected @endif>低い順に表示</option>
                    </select>
                </div>
                <div class="update-form__button">
                    <button class="update-form__button-submit" type="submit">+商品を追加</button>
                </div>
            </div>
        </div>
        @foreach ($products as $product)
        <div class="card">
            <img src="{{ asset($product->image) }}" class="card-img"/>
                <div class="card-body">
                    <p class="card-title">{{ $product->name }}</p>
                    <p class="card-text">¥{{ number_format($product->price) }} </p>
                </div>
        </div>
    </div>
    @endforeach
</table>
{{ $products->links() }}
@endsection
