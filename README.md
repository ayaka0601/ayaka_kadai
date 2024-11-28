## アプリケーション名
確認テスト：お問合せフォーム

## ER図
![ER図](ER.drawio.png)

## 環境構築
```

リポジトリからダウンロードして下さい
git clone <リポジトリURL>

srcディレクトリに.envファイルを作成し
docker-compose.ymlのDBの設定を記入して下さい
$ cp .env.example .env
---
DB_HOST=XXX
DB_DATABASE=XXX
DB_USERNAME=XXX
DB_PASSWORD=XXX
---

dockerコンテナを構築して下さい
$ docker-compose up -d --build
$ docker-compose exec php bash
> composer install
> php artisan key:generate
> php artisan migrate
> php artisan db:seed
http://localhostにアクセスして
"The stream or file could not be opened"というエラーが発生した場合は
ファイルの権限を変更して対応お願いします
```
