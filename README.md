# 前提

-   php バージョンは 8.0.2 以上を利用
-   gitmoji の利用方法は以下を参照
    https://tech-blog.cloud-config.jp/2021-12-21-git-moji-list/

# sail

### bash エイリアスの設定（任意）

-   bash もしくは zsh に以下を追記。
    ※ 試験的にこの手順を入れているが、できればプロジェクト単位で設定したい。

```
alias sail='./vendor/bin/sail'
```

### sail のタイムゾーンを日本時間にする

```
変更前
ENV TZ=UTC

変更後
ENV TZ='Asia/Tokyo'
```

一度 sail を立ち上げてから上記変更を行なった場合は、以下を実行

```
sail build --no-cache
```

### sail の起動

-   上記（bash エイリアスの設定）を対応している場合

```
sail up
```

-   対応していない場合

```
./vendor/bin/sail up
```

### アプリケーションコンテナへの接続

```
sail shell
```

### Heroku へのデプロイ

https://devcenter.heroku.com/ja/articles/getting-started-with-laravel#creating-a-laravel-application
