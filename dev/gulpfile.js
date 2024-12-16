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
// imagemin
const imagemin = require("gulp-imagemin");
const imageminPngquant = require("imagemin-pngquant");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminOption = [
	imageminPngquant({ quality: [0.65, 0.8] }),
	imageminMozjpeg({ quality: 85 }),
	imagemin.gifsicle({
		interlaced: false,
		optimizationLevel: 1,
		colors: 256
	}),
	imagemin.mozjpeg(),
	imagemin.optipng(),
	imagemin.svgo()
];
// webp convert
const webp = require('gulp-webp');

// ファイルの変更を監視
function watch() {
	gulp.watch("./src/assets/sass/**/*.scss", gulp.series(compileSass, browserReload));
	gulp.watch("./src/assets/js/**/*.js", gulp.series(minJS, browserReload));
	gulp.watch("./src/assets/img/**/*", gulp.series(imagemin, browserReload));
	gulp.watch("./src/**/*.html", gulp.series(formatHTML, browserReload));
	gulp.watch("../**/*.php", browserReload);
}

// ブラウザの起動
function browserInit(done) {
	browserSync.init({
		server: {
			baseDir: "./",
		}
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
	return gulp.src("./src/**/*.html")
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
	.pipe(gulp.dest("../css/"))
	.pipe(cleanCss())
	.pipe(rename({
		suffix: ".min"
	}))
	.pipe(gulp.dest("../css/"))
}

// JSの圧縮
function minJS() {
	return gulp.src("./src/assets/js/**/*.js")
	.pipe(gulp.dest("../js/"))
	.pipe(uglify())
	.pipe(rename({
		suffix: ".min"
	}))
	.pipe(gulp.dest("../js/"))
}

// 画像のコピー
function copyImage() {
	return gulp.src("./src/assets/img/**/*")
	.pipe(gulp.dest("../img/"))
}

// 画像の圧縮
function imagemin() {
	return gulp
		.src("./src/assets/img/**/*{png,jpg,gif,svg}")
		.pipe(imagemin(imageminOption))
		.pipe(gulp.dest("../img/"));
}

// 画像のwebp変換
function webpConvert() {
	return gulp
		.src("./src/assets/img/**/*{png,jpg}")
		.pipe(webp({
			quality: 70,
			method: 4,
		}))
		.pipe(gulp.dest("../img/"));
}


exports.dev = gulp.parallel(watch, browserInit);
exports.build = gulp.parallel(formatHTML, minJS, compileSass, imagemin);
// 画像のwebp変換
exports.webp = webpConvert;
