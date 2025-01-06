## アプリケーション名
確認テスト：mogitate

## ER図
![ER図](ER.drawio.png)

## URL
```
・開発環境：http://localhost/
・phpMyAdmin:http://localhost:8080/
```

## 使用技術（実行環境）
```
PHP 7.4.9
Laravel Framework 8.83.8
MySQL 8.0.26
Nginx
Docker/Docker-compose
```

## 環境構築

#### リポジトリからダウンロードして下さい
```
git clone git@github.com:ayaka0601/ayaka_kadai.git
```

#### Docker環境構築
1.DockerDesktopアプリを立ち上げる  
2.docker-compose up -d --build
```
MacのM1・M2チップのPCの場合、no matching manifest
for linux/arm64/v8 in the manifest list entriesの
メッセージが表示されビルドができないことがあります。
エラーが発生する場合は、docker-compose.ymlファイルの
「mysql」内に「platform」の項目を追加で記載してください.

mysql:
    platform: linux/x86_64(この文追加)
    image: mysql:8.0.26
    environment:
```

#### Laravel環境構築
1.docker-compose exec php bash  
2.composer install  
3..env.exampleファイルから.envを作成し、以下に環境変数を変更
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

4.アプリケーションキーの作成
```
php artisan key:generate
```

5.マイグレーションの実行
```
php artisan migrate
```

6.シーディングの実行
```
php artisan db:seed
```

7.シンボリックリンクの設定
```
php artisan storage:link
```
```
http://localhostにアクセスして
"The stream or file could not be opened"という
エラーが発生した場合はファイルの権限を変更して対応を
お願いします。
```