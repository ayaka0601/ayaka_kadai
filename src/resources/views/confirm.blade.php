<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        商品登録確認
      </a>
    </div>
  </header>

  <main>
    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>登録確認</h2>
      </div>
      <form class="form" action="/complete" method="post" enctype="">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">商品名</th>
              <td class="confirm-table__text">
                <input type="text" name="name" value="{{ $contact['name'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">値段</th>
              <td class="confirm-table__text">
                <input type="text" name="price" value="{{ $contact['n price'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">商品画像</th>
              <td class="confirm-table__file">
                <input type="file" name="image" value="{{ $contact['image'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">季節</th>
              <td class="confirm-table__text">
                <input type="text" name="season" value="{{ $contact['season'] }}" readonly />
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">>商品説明</th>
              <td class="confirm-table__text">
                <input type="text" name="description" value="{{ $contact['description'] }}" readonly />
              </td>
            </tr>
          </table>
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