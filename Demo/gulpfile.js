var gulp = require('gulp');
var clean = require('gulp-clean');
var concat = require('gulp-concat');


gulp.task("clean",function(){
    return gulp.src("out/*",{read: false})
        .pipe(clean());
});

gulp.task("js-minify",function(){
    return gulp.src([
                "client/utils/utils.js",
                "client/request/request.js",
                "client/response/response.js"])
            .pipe(concat("singlePageJS.js"))
            .pipe(gulp.dest("out/"));
});
