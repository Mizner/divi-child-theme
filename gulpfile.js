var project = "ceveal";

var jsPath = "assets/scripts/";
var theFiles = [
    // 1st file loads first, 2nd, ect.
    //jsPath + "skip-link-focus-fix.js",
    jsPath + "nav.js",
    jsPath + "nav-mobile.js",
    //jsPath + "nav-buttons.js",
    jsPath + "popup-base.js",
    jsPath + "prevent-empty-nav-redirect.js"
];

var theInlineFiles = [
    jsPath + "fixed-header.js"
];

var gulp = require("gulp"),
    browserSync = require("browser-sync").create(),
    autoprefixer = require("gulp-autoprefixer"),
    cssnano = require("gulp-cssnano"),
    uglify = require("gulp-uglify"),
    rename = require("gulp-rename"),
    concat = require("gulp-concat"),
    sass = require("gulp-sass"),
    sourcemaps = require("gulp-sourcemaps"),
    babel = require("gulp-babel"),
    plumber = require("gulp-plumber"),
    del = require('del');

gulp.task("sass", function () {
    gulp.src("./assets/styles/**/*.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sourcemaps.write(""))
        .pipe(rename(project + ".min.css"))
        .pipe(gulp.dest("./dist"))
        .pipe(browserSync.stream())
});

gulp.task("inline-sass", function () {
    gulp.src("./assets/styles/inline.scss")
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cssnano({zindex: false}))
        .pipe(rename(project + ".inline.min.css"))
        .pipe(gulp.dest("./dist"));
});

gulp.task("production-sass", function () {
    gulp.src("./assets/styles/**/*.scss")
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(cssnano({zindex: false}))
        .pipe(rename(project + ".min.css"))
        .pipe(gulp.dest("./dist"));
});

gulp.task("js", function () {
    gulp.src(theFiles)
        .pipe(plumber())
        .pipe(concat("output.min.js")) // concat pulls all our files together before minifying them
        .pipe(babel({
            presets: ["es2015"]
        }))
        .pipe(uglify())
        .pipe(rename(project + ".min.js"))
        .pipe(gulp.dest("./dist"))
});

gulp.task("inline-js", function () {
    gulp.src(theInlineFiles)
        .pipe(plumber())
        .pipe(concat("output.min.js")) // concat pulls all our files together before minifying them
        .pipe(babel({
            presets: ["es2015"]
        }))
        .pipe(uglify())
        .pipe(rename(project + ".inline.min.js"))
        .pipe(gulp.dest("./dist"))
});


gulp.task("clean:dist", function () {
    return del([
        "dist/**/*" // here we use a globbing pattern to match everything inside the `dist` folder
    ]);
});

gulp.task("browser-sync", function () {
    browserSync.init(["*"], {
        proxy: project + ".dev",
        root: [__dirname],
        open: {
            file: "index.php"
        }
    });

});

gulp.task("watch", ["browser-sync"], function () {
    gulp.watch("assets/styles/**/*.scss", ["sass"]);
    gulp.watch("./assets/scripts/**/*.js", ["js"]);
    gulp.watch("./**/*.php");
    gulp.watch("gulpfile.js").on("change", function () {
        process.exit(0)
    })
});

gulp.task("default", ["clean:dist", "production-sass", "inline-sass", "js", "inline-js"]);