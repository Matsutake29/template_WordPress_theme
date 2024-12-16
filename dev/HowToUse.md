ターミナルに以下のコマンドを入力
git clone https://github.com/Matsutake29/template_WordPress_theme .

gulp導入手順
1. チェンジディレクトリ
cd dev

2. package.jsonの内容をインストール (初回のみ)
npm install

3. ファイルの監視、ブラウザの自動リロードを開始
npx gulp dev

4. ビルドを実行
npx gulp build

5. 画像のwebp変換
npx gulp webp

package.json記述内容メモ
{
  "devDependencies": {
    "autoprefixer": "^10.4.0", // CSSに自動でベンダープレフィックスを付加するためのツール
    "browser-sync": "^2.27.7", // ローカルサーバーを立ち上げ、ファイルの変更を監視し、ブラウザを自動リロードするツール
    "css-declaration-sorter": "^6.1.3", // CSSプロパティをアルファベット順に並べ替えるためのツール
    "gulp": "^4.0.2", // タスクランナーであり、ビルドプロセスを自動化するためのツール
    "gulp-clean-css": "^4.3.0", // CSSファイルを圧縮するためのプラグイン
    "gulp-html-beautify": "^1.0.1", // HTMLファイルを整形するためのプラグイン
    "gulp-imagemin": "^7.1.0", // 画像ファイルを最適化するためのプラグイン
    "gulp-merge-media-queries": "^0.2.1", // メディアクエリを結合してCSSファイルを最適化するためのプラグイン
    "gulp-postcss": "^9.0.1", // PostCSSプラグインを利用するためのGulpプラグイン
    "gulp-rename": "^2.0.0", // ファイル名を変更するためのプラグイン
    "gulp-sass": "^5.0.0", // Sassファイルをコンパイルするためのプラグイン
    "gulp-uglify": "^3.0.2", // JavaScriptファイルを圧縮するためのプラグイン
    "gulp-webp": "^5.0.0", // WebP形式への画像変換を行うプラグイン
    "imagemin-mozjpeg": "^10.0.0", // JPEG画像の圧縮を行うプラグイン
    "imagemin-pngquant": "^10.0.0", // PNG画像の圧縮を行うプラグイン
    "sass": "^1.45.1" // Sass（CSSの拡張メタ言語）コンパイラ
  },
  "browserslist": ["defaults"] // ブラウザ互換性リスト。デフォルト設定を使用している。
}