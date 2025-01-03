@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="admin">
  <h2 class="admin__heading content__heading">Admin</h2>
  <div class="admin__inner">
    <form class="search-form" action="/search" method="get">
      @csrf
      <input class="search-form__keyword-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{request('keyword')}}">
      <div class="search-form__gender">
        <select class="search-form__gender-select" name="gender" value="{{request('gender')}}">
          <option disabled selected>性別</option>
          <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
          <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
          <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
        </select>
      </div>
      <div class="search-form__category">
        <select class="search-form__category-select" name="category_id">
          <option disabled selected>お問い合わせの種類</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" @if( request('category_id')==$category->id ) selected @endif
            >{{$category->content }}
          </option>
          @endforeach
        </select>
      </div>
      <input class="search-form__date" type="date" name="date" value="{{request('date')}}">
      <div class="search-form__actions">
        <input class="search-form__search-btn btn" type="submit" value="検索">
        <input class="search-form__reset-btn btn" type="submit" value="リセット" name="reset">
      </div>
    </form>

    <div class="export-form">
      <form action="{{'/export?'.http_build_query(request()->query())}}" method="post">
        @csrf
        <input class="export__btn btn" type="submit" value="エクスポート">
      </form>
      {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>

    <table class="admin__table">
      <tr class="admin__row">
        <th class="admin__label">お名前</th>
        <th class="admin__label">性別</th>
        <th class="admin__label">メールアドレス</th>
        <th class="admin__label">お問い合わせの種類</th>
        <th class="admin__label"></th>
      </tr>
      @foreach($contacts as $contact)
      <tr class="admin__row">
        <td class="admin__data">{{$contact->first_name}}{{$contact->last_name}}</td>
        <td class="admin__data">
          @if($contact->gender == 1)
          男性
          @elseif($contact->gender == 2)
          女性
          @else
          その他
          @endif
        </td>
        <td class="admin__data">{{$contact->email}}</td>
        <td class="admin__data">{{$contact->category->content}}</td>
        <td class="admin__data">
          <a class="admin__detail-btn" href="#{{$contact->id}}">詳細</a>
        </td>
      </tr>

      <div class="modal" id="{{$contact->id}}">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
          <div class="modal__content">
            <form class="modal__detail-form" action="/delete" method="post">
              @csrf
              <div class="modal-form__group">
                <label class="modal-form__label" for="">お名前</label>
                <p>{{$contact->first_name}}{{$contact->last_name}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">性別</label>
                <p>
                  @if($contact->gender == 1)
                  男性
                  @elseif($contact->gender == 2)
                  女性
                  @else
                  その他
                  @endif
                </p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">メールアドレス</label>
                <p>{{$contact->email}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">電話番号</label>
                <p>{{$contact->tell}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">住所</label>
                <p>{{$contact->address}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">お問い合わせの種類</label>
                <p>{{$contact->category->content}}</p>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">お問い合わせ内容</label>
                <p>{{$contact->detail}}</p>
              </div>
              <input type="hidden" name="id" value="{{ $contact->id }}">
              <input class="modal-form__delete-btn btn" type="submit" value="削除">

            </form>
          </div>

          <a href="#" class="modal__close-btn">×</a>
        </div>
      </div>
      @endforeach
    </table>
  </div>
</div>

</div>
@endsection

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
  <div class="todo__alert--success">
    Todoを作成しました
  </div>
</div>
@section('title', 'index.blade.php')

@section('content')
<table>
  <tr>
    <th>name</th>
    <th>price</th>
    <th>image</th>
    <th>description</th>
  </tr>
  @foreach ($products as $product)
  <tr>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->image}}</td>
    <td>{{$product->description}}</td>
  </tr>
  @endforeach
</table>
{{ $products->links() }}

<div class="flex__item">
  <div class="practice__card">
    <div class="card__img">
      <img src="img//Users/ayaka/coachtech/ayaka_kadai/src/storage/app/public/kiwi.png" alt="" />
    </div>
    <div class="card__content">
      <div class="card__cat">カテゴリー</div>
      <h2 class="card__ttl">
        今日の朝ごはんは卵と肉を合わせたバランスの良いメニューです。
      </h2>
      <div class="tag">
        <p class="card__tag">#朝ごはん</p>
        <p class="card__date">2021/01/01</p>
      </div>
    </div>
  </div>
  <div class="practice__card">
    <div class="card__img">
      <img src="img/card.jpg" alt="" />
    </div>
    <div class="card__content">
      <div class="card__cat">カテゴリー</div>
      <h2 class="card__ttl">
        今日の朝ごはんは卵と肉を合わせたバランスの良いメニューです。 </h2>
      <div class="tag">
        <p class="card__tag">#朝ごはん</p>
        <p class="card__date">2021/01/01</p>
      </div>
    </div>
  </div>
  <div class="practice__card">
    <div class="card__img">
      <img src="img/" alt="" />
    </div>
    <div class="card__content">
      <div class="card__cat">カテゴリー</div>
      <h2 class="card__ttl">
        今日の朝ごはんは卵と肉を合わせたバランスの良いメニューです。
      </h2>
      <div class="tag">
        <p class="card__tag">#朝ごはん</p>
        <p class="card__date">2021/01/01</p>
      </div>
    </div>
  </div>
</div>



<div class="todo__content">
<form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
   @csrf
    <div class="create-form__item">
        <input type="file" name="image">
   <label for="title">題名</label> 
      <input class="create-form__item-input" type="text" name="content">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit" type="submit">作成</button>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <tr class="todo-table__row">
        <th class="todo-table__header">Todo</th>
      </tr>
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <form class="update-form">
            <div class="update-form__item">
              <input class="update-form__item-input" type="text" name="content" value="test">
            </div>
            <div class="update-form__button">
              <button class="update-form__button-submit" type="submit">更新</button>
            </div>
          </form>
        </td>
        <td class="todo-table__item">
          <form class="delete-form">
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <form class="update-form">
            <div class="update-form__item">
              <input class="update-form__item-input" type="text" name="content" value="test2">
            </div>
            <div class="update-form__button">
              <button class="update-form__button-submit" type="submit">更新</button>
            </div>
          </form>
        </td>
        <td class="todo-table__item">
          <form class="delete-form">
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
    </table>
  </div>
</div>
@endsection
