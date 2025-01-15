const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssSorter = require("css-declaration-sorter");
const mmq = require("gulp-merge-media-queries");
const browserSync = require("browser-sync");
const cleanCss = require("gulp-clean-css");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const htmlBeautify = require("gulp-html-beautify");

// ファイルの変更を監視
function watch() {
	gulp.watch("./src/assets/sass/**/*.scss", gulp.series(compileSass, browserReload));
	gulp.watch("./src/assets/js/**/*.js", gulp.series(minJS, browserReload));
	gulp.watch("./src/assets/img/**/*", gulp.series(copyImage, browserReload));
	gulp.watch("./src/**/*.html", gulp.series(formatHTML, browserReload));
	gulp.watch("../**/*.php", browserReload);
}

// ブラウザの起動
function browserInit(done) {
	browserSync.init({
		// -----ローカル環境のURLを指定_静的サイトの場合-----
		// server: {
		// 	baseDir: ".././"
		// }
		// -----ローカル環境のURLを指定_静的サイトの場合-----

		// -----ローカル環境のURLを指定_WordPressの場合-----
		proxy: "http://localhost:8888/〇〇/"
		// -----ローカル環境のURLを指定_WordPressの場合-----
	});
	done();
}

// ブラウザのリロード
function browserReload(done) {
	browserSync.reload();
	done();
}

// HTMLの整形
function formatHTML() {
	return gulp.src("./src/*.html")
	.pipe(htmlBeautify({
		indent_size: 2,
		indent_with_tabs: true,
	}))
	.pipe(gulp.dest("../"))
}

// Sassのコンパイル & 圧縮
function compileSass() {
	return gulp.src("./src/assets/sass/**/*.scss")
	.pipe(sass())
	.pipe(postcss([autoprefixer(), cssSorter()]))
	.pipe(mmq())
	.pipe(gulp.dest("../assets/css/"))
	.pipe(cleanCss())
	.pipe(rename({
		suffix: ".min"
	}))
	.pipe(gulp.dest("../assets/css/"))
}

// JSの圧縮
function minJS() {
	return gulp.src("./src/assets/js/**/*.js")
	.pipe(gulp.dest("../assets/js/"))
	.pipe(uglify())
	.pipe(rename({
		suffix: ".min"
	}))
	.pipe(gulp.dest("../assets/js/"))
}

// 画像の複製
function copyImage() {
	return gulp.src("./src/assets/img/**/*")
	.pipe(gulp.dest("../assets/img/"))
}

// タスクの実行
exports.dev = gulp.parallel(browserInit, watch);
exports.build = gulp.parallel(formatHTML, compileSass, minJS, copyImage);

// 全てのタスクを実行
exports.default = gulp.series(
	gulp.parallel(formatHTML, compileSass, minJS, copyImage),
  gulp.parallel(browserInit, watch),
);