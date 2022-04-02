# 前提
- phpバージョンは8.0.2以上を利用
- gitmojiの利用方法は以下を参照
https://tech-blog.cloud-config.jp/2021-12-21-git-moji-list/

# sail

### bashエイリアスの設定（任意）
- bashもしくはzshに以下を追記。
※ 試験的にこの手順を入れているが、できればプロジェクト単位で設定したい。
```
alias sail='./vendor/bin/sail'
```
### sailの起動
- 上記（bashエイリアスの設定）を対応している場合
```
sail up
```

- 対応していない場合
```
./vendor/bin/sail up
```
### アプリケーションコンテナへの接続
```
sail shell
```
