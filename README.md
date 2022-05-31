# SHU-CAN

<p align="center">
    <img width="1440" alt="スクリーンショット 2022-05-31 11 47 46" src="https://user-images.githubusercontent.com/63633583/171083119-f0220c4f-da86-408a-9212-f8e1b979c528.png" alt="top view">
</p>

## アプリの概要

エンジニアのための学習習慣づくり SNS

## 開発背景

私は職業を転々とするなど、なかなか物事を継続できないという弱みがありました。
一心発起して、公認会計士を目指すも 1 年で挫折した経験があります。
しかし、ある本を読んで、思考や意思を言語化することの重要性にきづきました。
そして web エンジニアになろうと決心した時から、習慣にしたい行動を言語化、記録することによって、
自分の行動を管理することができました。この記録を続けたことにより、学習や読書、運動の習慣が身につきました。

1. この習慣をつくる体験をあらゆる人に届けたい
2. メモよりも簡単かつより効果的に習慣を継続させる仕組みを作りたい
3. 中でも学習の継続が必須とされるプログラミング学習の習慣づくりに特化し、
   　　全ての学び続けるプログラマーを対象にした SNS コミュニティを作りたい

## 使用技術

■ フロントエンド
　 HTML/CSS/JS/Tailwind.css
■ バックエンド
　 Laravel(v8.83.2) PHP(v7.3.29)
■ 開発環境
　 Docker、docker-compose、MySQL
■ コード管理
　 Git,GitHub
開発期間：約 3 ヶ月

##　機能一覧

投稿機能
　・コメント機能
　・グッジョブ機能（いいね機能）
　・投稿編集機能
　・投稿一覧表示機能
　・投稿削除機能
　・投稿検索機能
ログイン＆ログアウト機能
　・Laravel Breeze により実装
マイページ
　・編集機能(アイコン画像あり)
　・表示機能
フォロー・フォロワー機能
学習実績グラフの表示機能

今後の実装予定
・言語・技術のハッシュタグ機能
・メールアドレス認証
・投稿時間の UI 改善
・グッジョブボタンとフォローボタン改善
・通知機能
・ダイレクトメッセージ機能

### app container

-   Base image
    -   [php](https://hub.docker.com/_/php):8.1-fpm-bullseye
    -   [composer](https://hub.docker.com/_/composer):2.1

### web container

-   Base image
    -   [nginx](https://hub.docker.com/_/nginx):1.20-alpine
    -   [node](https://hub.docker.com/_/node):16-alpine

### db container

-   Base image
    -   [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0
