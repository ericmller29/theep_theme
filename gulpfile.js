var gulp = require('gulp')
	sass = require('gulp-sass'),
	concat = require('gulp-concat'),
    source = require('vinyl-source-stream'),
    notify = require('gulp-notify');

var config = {
	bootstrap: {
		main: 'bower_components/bootstrap-sass',
		js: 'bower_components/bootstrap-sass/assets/javascripts/bootstrap',
		css: 'bower_components/bootstrap-sass/assets/stylesheets'
	}
}

gulp.task('sass', () => {
	return gulp.src('src/sass/**/*.scss')
		.pipe(sass.sync({
			includePaths: [
				config.bootstrap.css,
				'bower_components/font-awesome/scss'
			]
		}).on('error', notify.onError(function (error) {
   			return error;
		})))
		.pipe(notify('Sass has been compiled and moved.'))
		.pipe(gulp.dest('./dist/css'));
});

gulp.task('js', () => {

});

gulp.task('fonts', () => {
	return gulp.src('bower_components/font-awesome/fonts/*.*')
		.pipe(gulp.dest('dist/fonts'));
});

gulp.task('vendor', () => {
	return gulp.src([
		config.bootstrap.js + '/../bootstrap.min.js'
	])
	.pipe(concat('vendor.js'))
	.pipe(notify('Vendor scripts have been moved.'))
	.pipe(gulp.dest('dist/js'));
});

gulp.task('images', () => {
	return gulp.src('src/img/**/*.*')
		.pipe(gulp.dest('dist/img'));
})

gulp.task('watch', () => {
	gulp.watch('src/sass/**/*.scss', ['sass']);
	gulp.watch('src/img/**/*.*', ['images']);
	// gulp.watch('src/js/**.*.js', ['js']);
});

gulp.task('default', ['sass', 'images', 'watch', 'vendor', 'fonts']);