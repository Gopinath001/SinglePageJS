var gulp = require('gulp');
var concat = require('gulp-concat');

gulp.task("js-minify",function(){
    return gulp.src([
                "client/utils/utils.js",
                "client/request/request.js",
                "client/response/response.js"])
            .pipe(concat("singlePageJS.js"))
            .pipe(gulp.dest("out/"));
});
