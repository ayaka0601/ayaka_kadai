@extends('layouts.default')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
@endsection

@section('content')
<div class="product__alert">
  @if(session('message'))
    <div class="product__alert--success">
      {{ session('message') }}
    </div>
  @endif
</div>

<table>
  <nav>
    <ul class="header-nav">
      <li class="header-nav__item">
        <a class="header-nav__link" href="/products/register">＋商品を追加</a>
      </li>
    </ul>
  </nav>
  <div class="admin">
    <h2 class="admin__heading content__heading">商品一覧</h2>
      <div class="admin__inner">
        <form class="create-form" action="/products/register" method="post">
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
        @foreach ($products as $product)
        <div class="flex__item">
          <div class="card__img">
            <img src="{{ asset($product->image) }}" class="card__img"/>
              <div class="card__body">
                <p class="card__title">{{ $product->name }}</p>
                <p class="card__text">¥{{ number_format($product->price) }} </p>
                <a href="" class="btn btn-primary">詳細</a>
              </div>
          </div>
        </div>
    </div>
    @endforeach
    {{ $products->links() }}
</table>
@endsection
