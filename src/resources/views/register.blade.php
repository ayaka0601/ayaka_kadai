<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/"></a>
        </div>
    </header>

    <main>
        <div class="mogitate__content">
            <div class="mogitate__heading">
                <h2>商品登録</h2>
            </div>
            <form class="form" action="/products/confirm" method="post" enctype="">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form-item-label-required">商品名</span>必須
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <label for="first-name"></label>
                            <input type="text" id="name" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                        </div>
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form-item-label-required">値段</span>必須
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <label for="first-name"></label>
                            <input type="text" id="price" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
                        </div>
                        <div class="form__error">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group-content">
                    <div class="form__input--file">
                        <span class="form-item-label-required">商品画像</span>必須
                        <input type="file" id="image" name="image" placeholder="ファイルを選択" value="{{ old('image') }}" />
                    </div>
                    <div class="form__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form-item-label-required">季節</span>必須
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="checkbox" id="season" name="season" value="{{ old('spring') }}" /> 春
                        <input type="checkbox" id="season" name="season" value="{{ old('summer') }}" /> 夏
                        <input type="checkbox" id="season" name="season" value="{{ old('autumn') }}" /> 秋
                        <input type="checkbox" id="season" name="season" value="{{ old('winter') }}" /> 冬
                    </div>
                    <div class="form__error">
                        @error('season_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品説明</span>必須
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="description" placeholder="商品の説明を入力" value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="form__error">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button type="button" onClick="history.back()">戻る</button>
                <button class="form__button-submit" type="submit">登録</button>
            </div>
            </form>
        </div>
    </main>
</body>

</html>
