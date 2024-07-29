# なはわらばぁ
那覇市の子育て情報(おでかけ、食事、生活ニュースなど)の共有を目的としたブログサイト「なはわらばぁ」のWPテーマ専用リポジトリです。

※ 作成段階で那覇市内の情報がまとめれなかったため、他の地区の情報を記事にしてます。

URL : https://dustin-yamashiro.github.io/naha-waraba/

ローカル環境 : 下記の[環境構築](#環境構築)を手順通りに進めてください。

PCイメージ画像

<img width="1680" alt="スクリーンショット 0006-07-29 10 21 03" src="https://github.com/user-attachments/assets/49e65e47-fdfe-4cee-9a0d-f57f3abc408b">

SPイメージ画像

![IMG_1736](https://github.com/user-attachments/assets/9bb66d42-49bd-45c6-b84f-828c1e73bf2e)

## 作成経緯

ブログを作成するにあたって、地域情報に特化した地域ブログを運営してみたい + 娘に色々な経験をさせてみたいという2つの思いがあり、沖縄県の子連れ家族に向けたブログサイトを運営したいと考えておりました。
そんな中、知人から那覇市の子育て家族に向けた給付金があるという話を聞いて実際に受給申請をして受給できたという経験から、　那覇市内の子育て情報をわかりやすく発信するブログサイトが自分の思いと需要をリンクできるのではと考え、作成に至りました。

## 使用スキル

デザイン設計から環境構築、コーディング、サイト公開(github pages)までをWEBと参考書の情報を元に自分で行いました。また、jqueryやWordpressプラグインなどは使用せず、全て自作か代替ライブラリで作成しました。

### デザイン関連
- Figma
- canva
- Picsart

### コーディング, プログラム関連
- HTML/CSS
- SCSS
- FLOCSS
- Javascript
- Wordpress

### ライブラリ, 外部サービス
- swiper
- fontawesome
- google fonts

### 環境構築, ソース管理
- docker
- git, github

## 作成イメージ

  ※当初はパーラー巡りブログ「パーラー探検隊」を開設しようとしていました。

  また、実際の作成したサイトとデザインが異なる点があります。

- デザインカンプ

<img width="468" alt="スクリーンショット 0006-07-29 11 10 50" src="https://github.com/user-attachments/assets/2db53d98-4509-4490-a88f-399c599d74d8">

- 作成デザインイメージ

<img width="930" alt="
スクリーンショット 0006-07-29 11 19 07" src="https://github.com/user-attachments/assets/5c3104de-d60d-4bf4-88dd-6e9b3bcc69d4">

## サイト構成
| ヘッダー |　サイドバー |
| ---- | ---- |
| <img width="600" alt="スクリーンショット 0006-07-29 12 14 33" src="https://github.com/user-attachments/assets/7ab80be7-62b3-49c5-a251-834586a5a01d"> | ![dustin-yamashiro github io_naha-waraba_](https://github.com/user-attachments/assets/9c1a410a-59fb-40ea-b702-052c7bcdac92) |
|　サイトロゴとカテゴリー別メニュー、主要ページへのメニューをイラストと合わせて表示するように実装しました。 |　各ページに表示したいコンテンツ(プロフィール、人気記事ランキング、タグ一覧)を含むように実装しました。 |

| トップページ |　記事ページ |
| ---- | ---- |
| <img width="600" alt="スクリーンショット 0006-07-29 10 21 03" src="https://github.com/user-attachments/assets/49e65e47-fdfe-4cee-9a0d-f57f3abc408b"> | <img width="700" alt="スクリーンショット 0006-07-29 12 29 02" src="https://github.com/user-attachments/assets/4ccf2d1f-e495-4630-8aa3-baebab191731"> |
| 投稿フェードスライダー、カテゴリー別記事一覧スライダーで全ての記事が表示されるように実装しました。 | 項目ごとにセクションを分けて管理しやすいように実装しました。 |

| カテゴリー、タグ、検索結果ページ |　　サイト内検索フォーム(スマホ、タブレットのみ) |
| ---- | ---- |
| <img width="480" alt="スクリーンショット 0006-07-29 12 35 30" src="https://github.com/user-attachments/assets/c484deaf-52d6-446b-8991-72bad696c75b"> | ![IMG_1737](https://github.com/user-attachments/assets/64d58d11-363e-4f02-af35-1a64f7ee05e1) |
| デザインを共通化し、何を選択したかわかりやすいように実装しました。 | スマホ、タブレットの際にサイト内検索を行えるように検索メニューと検索フォームを実装しました。 |

| カテゴリーメニュー(スマホ、タブレットのみ) |
| ---- |
| ![IMG_1738](https://github.com/user-attachments/assets/f97372cc-4817-412a-a5f5-795dfca6da94) |
| スマホ、タブレットの際にカテゴリー別で絞り込めるようにハンバーガーメニューとカテゴリーメニュー一覧を実装しました。 |

#### 未作成ページ
- 人気記事ランキングページ
- サイト紹介ページ
- 固定ページ (プライバシーポリシー、免責事項、お問い合わせ、サイトマップ)

## 今後の展望
- 各固定ページのコンテンツ作成やおすすめ記事一覧プロジェクトの作成やSNS連携などがまだなので、そこを実装していく。
- SEO関連の修正(サイトマップやセマンティックHTMLなど)を行って運用に向けた対応を行う。
- CSS設計で要素によってProjectとComponentの分け方やスタイリングがバラバラなので、記述ルールを改めて見直す。
- サーバーの契約や広告の導入を行って、サイトを利益化する。
  - サーバーはAWSのEC2無料枠を利用して用意する予定。(https://aws.amazon.com/jp/ec2/pricing/?loc=ft#Free_tier)
- 那覇市内だけの情報だけではなく、このブログ運用を通して県内全体の子育て情報を共有できるサイトを運営したい。


## 参考文献

### デザイン参考

https://okinawa-cellular.jp/laifue/

https://toyosu.tokyo/

https://san-tatsu.jp/

https://webdou.net/font-rem/

https://junichi-manga.com/


### 利用ツール

https://min-max-calculator.9elements.com/

https://fontawesome.com/

https://aspect.arc-one.jp/#google_vignette


## 環境構築

### dockerの場合

1. リポジトリをforkした後、下記のコマンドでdockerイメージとコンテナを作成し、起動してください。

```
docker-compose up --build
```

2. 起動したあと、[localhost](http://localhost:8080)にアクセスして一度適当にwordpressサイトの初期設定をしていただいて、wordpressの管理画面にアクセスしてください。

3. プラグインの新規追加から`All-in-One WP Migration`プラグインをインストールしていただいて、`Docker/naha-waraba-bk.wpress`というファイルをインポートしてください。

4. インポート後、下記のログイン情報を元に再ログインしていただくと管理画面へアクセスできるかと思います。

```
ユーザー名 : test
パスワード : test
```

5. アクセス後、スタイリング崩れが起きている場合は、`style.css`のコンパイルがされていないかと思いますので、vscodeの`Live Sass Compiler`などのプラグインで`style.scss`をコンパイルしてて再度ご確認ください。

### localの場合

dockerの場合の2番以降の手順をlocalの環境構築後に行ってください。












