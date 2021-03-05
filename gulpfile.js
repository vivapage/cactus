var gulp = require("gulp"),
  autoprefixer = require("gulp-autoprefixer"),
  browsersync = require("browser-sync"),
  concat = require("gulp-concat"),
  cache = require("gulp-cache"),
  cleancss = require("gulp-clean-css"),
  ftp = require("vinyl-ftp"),
  imagemin = require("gulp-imagemin"),
  notify = require("gulp-notify"),
  pngquant = require("imagemin-pngquant"),
  gutil = require("gulp-util"),
  rename = require("gulp-rename"),
  rsync = require("gulp-rsync"),
  sass = require("gulp-sass"),
  uglify = require("gulp-uglify");

// Незабываем менять 'wp-gulp.loc' на свой локальный домен
gulp.task("browser-sync", function () {
  browsersync({
    proxy: "https://www.cactuskiev.com.ua/",
    notify: false,
    https: true,
    port: 8080,
    //open: true
    // tunnel: true,
    // tunnel: "gulp-wp-fast-start", //Demonstration page: http://gulp-wp-fast-start.localtunnel.me
  });
});

// Обьединяем файлы sass, сжимаем и переменовываем
gulp.task("styles", function () {
  return (
    gulp
      .src("./sass/**/*.scss")
      .pipe(sass({ outputStyle: "expanded" }).on("error", notify.onError()))
      .pipe(concat("style.css"))
      .pipe(autoprefixer(["last 15 versions"]))
      .pipe(cleancss({ level: { 1: { specialComments: 2 } } })) // Opt., comment out when debugging
      .pipe(gulp.dest("./"))
      .pipe(browsersync.reload({ stream: true }))
  );
});

gulp.task("styleswoo", function () {
  return (
    gulp
      .src("./sasswoo/**/*.scss")
      .pipe(sass({ outputStyle: "expanded" }).on("error", notify.onError()))
      .pipe(concat("woocommerce.css"))
      .pipe(autoprefixer(["last 15 versions"]))
      .pipe(cleancss({ level: { 1: { specialComments: 2 } } })) // Opt., comment out when debugging
      .pipe(gulp.dest("./"))
      .pipe(browsersync.reload({ stream: true }))
  );
});

// Обьединяем файлы скриптов, сжимаем и переименовываем
gulp.task("scripts", function () {
  return (
    gulp
      .src("./scripts/*.js")
      .pipe(concat("./../js/scripts.js"))
      //.pipe(uglify()) // Mifify js (opt.)
      .pipe(gulp.dest("./js"))
      .pipe(browsersync.reload({ stream: true }))
  );
});

gulp.task("php", function () {
  return gulp.src("./**/*.php").pipe(browsersync.reload({ stream: true }));
});

// Watch
gulp.task("watch", function () {
  gulp.watch("./sass/**/*.scss", gulp.parallel("styles"));
  gulp.watch("./sasswoo/**/*.scss", gulp.parallel("styleswoo"));
  gulp.watch("./scripts/*.js", gulp.parallel("scripts"));
  gulp.watch("./**/*.php", gulp.parallel("php"));
  //gulp.watch("./**/*.php").on("change", browsersync.reload);
});

gulp.task(
  "default",
  gulp.parallel("styles", "styleswoo", "scripts", "browser-sync", "watch")
);
