var gulp = require('gulp');
var minifyCSS = require('gulp-csso');

gulp.task('copy', function() {

    // gulp.src('resources/assets/js/modules/companies/site/old/*js')
    //     .pipe(gulp.dest('public/assets/companies/site/js'))
})

gulp.task('css', function() {
    return gulp.src('resources/views/themes/stackhtml-133/Stack-1.3.3/css/*.css')
        .pipe(minifyCSS())
        .pipe(gulp.dest('public/assets/companies/site/theme/css'))
});

