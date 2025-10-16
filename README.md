# laravel-docker-template
##環境構築
###Dokerビルド
1. git clone git@github.com:shiorimorita/fruit-list.git
2. DockerDesktopアプリを立ち上げる
3. docker-compose up -d --build
MacのM1・M2チップのPCの場合、no matching manifest for linux/arm64/v8 in the manifest list entriesのメッセージが表示されビルドができないことがあります。 エラーが発生する場合は、docker-compose.ymlファイルの「mysql」内に「platform」の項目を追加で記載してください

```yaml
mysql:
    platform: linux/x86_64(この文を追加)
    image: mysql:8.0.26
    environment:
```

###Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。
4. アプリケーションキーの作成
```
php artisan key:generate
```
5. マイグレーションの実行
```
php artisan migrate
```
6. シーディングの実行
```
php artisan db:seed
```

##使用技術(実行環境)
+ PHP 8.4.11
+ Laravel 8.83.8
+ MySQL 11.8.3
  
##ER図
<img width="721" height="500" alt="Image" src="https://github.com/user-attachments/assets/1755351d-c41a-4886-82cd-49697734d3d5" />

##URL
+ 開発環境：http://localhost/
+ phpMyAdmin:：http://localhost:8080/