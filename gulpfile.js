
var gulp = require('gulp');
//var sass = require('gulp-ruby-sass');
//var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var htmlmin = require('gulp-htmlmin');
var stripComments = require('gulp-strip-comments');
var watch = require('gulp-watch');
var plumber = require('gulp-plumber');
var phpMinify = require('gulp-php-minify');
//var cache = require('gulp-cache');
//var livereload = require('gulp-livereload');
//var del = require('del');

gulp.task('style1', function() {
    return gulp.src([
            './public_html/css/site.css',
        ])
        .pipe(watch([
            './public_html/css/site.css',
        ]))
        .pipe(plumber())
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./public_html/css/'));
});

gulp.task('style2', function() {
    return gulp.src([
        './public_html/assets/css/home.css',
        './public_html/assets/css/main.css'
    ])
        .pipe(watch([
            './public_html/assets/css/home.css',
            './public_html/assets/css/main.css'
        ]))
        .pipe(plumber())
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('../imidiatv/public_html/assets/css/'));
});


gulp.task('onescript', function() {
    return gulp.src([
        //'./public_html/assets/plugins/misc/gmaps/gmaps.js',
        // './public_html/assets/plugins/jscolor/jscolor.js',
        ])
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
         //.pipe(gulp.dest('./public_html/assets/plugins/misc/gmaps'));
        // .pipe(gulp.dest('./public_html/assets/plugins/jscolor'));
});

//JSHint, concat, and minify JavaScript
// isso pode ser perigoso, se um js quebrar, todos vão parar também se todos forem concatenados
gulp.task('scripts', function() {

    return gulp.src([
            './public_html/assets/js/myapp.js',
            './public_html/assets/js/grade-programacao.js',
            './public_html/assets/js/views-dashboard-index.js',
            './public_html/assets/js/views-midia-index.js',
            './public_html/assets/js/views-midia-editar.js',
            './public_html/assets/js/views-midia-templateeditor.js',
            './public_html/assets/js/views-midia-editarmidiatemplate.js',
            './public_html/assets/js/views-cliente-index.js',
            './public_html/assets/js/views-player-index.js',
            './public_html/assets/js/views-player-adicionar.js',
            './public_html/assets/js/views-player-configurar.js',
            './public_html/assets/js/views-agenciadenoticias.js',
        ])
        .pipe(watch([
            './public_html/assets/js/myapp.js',
            './public_html/assets/js/grade-programacao.js',
            './public_html/assets/js/views-dashboard-index.js',
            './public_html/assets/js/views-midia-index.js',
            './public_html/assets/js/views-midia-editar.js',
            './public_html/assets/js/views-midia-templateeditor.js',
            './public_html/assets/js/views-midia-editarmidiatemplate.js',
            './public_html/assets/js/views-cliente-index.js',
            './public_html/assets/js/views-player-index.js',
            './public_html/assets/js/views-player-adicionar.js',
            './public_html/assets/js/views-player-configurar.js',
            './public_html/assets/js/views-agenciadenoticias.js',
        ]))
        .pipe(plumber())
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        // .pipe(gulp.dest('./public_html/assets/js/'));
        .pipe(gulp.dest('../imidiatv/public_html/assets/js/'));

    // return gulp.src('src/scripts/**/*.js')
    //     .pipe(jshint('.jshintrc'))
    //     .pipe(jshint.reporter('default'))
    //     .pipe(concat('main.js'))
    //     .pipe(gulp.dest('dist/assets/js'))
    //     .pipe(rename({suffix: '.min'}))
    //     .pipe(uglify())
    //     .pipe(gulp.dest('dist/assets/js'))
    //     .pipe(notify({ message: 'Scripts task complete' }));
});

// gulp.task('minify:php', () => gulp.src('path/to/lib/**/*.php', {read: false})
//     .pipe(phpMinify())
//     .pipe(gulp.dest('path/to/out'))
// );

gulp.task('phpminify', function() {

    return gulp.src([
        "./application/**/*.php"
    ])
    .pipe(watch("./application/**/*.php"))
    .pipe(plumber())
    .pipe(phpMinify())
    .pipe(gulp.dest('../imidiatv/application'))

});


gulp.task('applicationbootstrap', function() {

    return gulp.src([
            "./public_html/assets/js/jquery.appStart.js",
            "./public_html/assets/js/app.js",
        ])
        .pipe(concat('appStart.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../imidiatv/public_html/assets/js'));

});

gulp.task('topscripts', function() {

    return gulp.src([
            "./public_html/plugins/jquery-2.1.1.min.js",
            "./public_html/assets/js/jquery-ui.min.js",
        ])
        .pipe(concat('top-scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../imidiatv/public_html/assets/js'));

});

gulp.task('internalcontent', function() {

    return gulp.src([
            "./public_html/assets/plugins/ui/bootbox/bootbox.js",
			"./public_html/assets/plugins/forms/icheck/jquery.icheck.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.custom.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.pie.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.resize.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.time.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.growraf.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.categories.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.stack.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.orderBars.js",
			"./public_html/assets/plugins/charts/flot/jquery.flot.tooltip.min.js",
			"./public_html/assets/plugins/charts/flot/date.js",
			"./public_html/assets/plugins/charts/sparklines/jquery.sparkline.js",
			"./public_html/assets/plugins/charts/pie-chart/jquery.easy-pie-chart.js",
			// // //"./public_html/assets/js/pages/charts.js", // isso é necessário na configuração do player mas quebra o select2 da edição da mídia
        ])
        .pipe(concat('internal-content.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../imidiatv/public_html/assets/js'));

});

gulp.task('mainlayoutscripts', function() {

    return gulp.src([
            "./public_html/assets/js/bootstrap/bootstrap.min.js",
            "./public_html/assets/plugins/forms/validation/jquery.validate.js",
            "./public_html/assets/plugins/forms/validation/additional-methods.min.js",
            "./public_html/assets/js/libs/modernizr.custom.js",
            "./public_html/assets/js/jRespond.min.js",
        //"./public_html/assets/plugins/core/slimscroll/jquery.slimscroll.min.js",
        //"./public_html/assets/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js",
            "./public_html/assets/plugins/misc/highlight/highlight.pack.js",
            "./public_html/assets/plugins/core/quicksearch/jquery.quicksearch.js",
            "./public_html/assets/plugins/ui/bootbox/bootbox.js",
        //"./public_html/assets/plugins/tables/datatables/jquery.dataTables.min.js",
        //"./public_html/assets/plugins/tables/datatables/jquery.dataTablesBS3.js",
        //"./public_html/assets/plugins/tables/datatables/tabletools/ZeroClipboard.js",
        //"./public_html/assets/plugins/tables/datatables/tabletools/TableTools.min.js",
        //    "./public_html/assets/js/pages/tables-data.js",
            "./public_html/assets/plugins/forms/maxlength/bootstrap-maxlength.js",
            "./public_html/assets/plugins/forms/tags/jquery.tagsinput.min.js",
            "./public_html/assets/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js",
            "./public_html/assets/plugins/forms/maskedinput/jquery.maskedinput.js",
            "./public_html/assets/plugins/forms/autosize/jquery.autosize.js",
            "./public_html/assets/plugins/forms/select2/select2.js",
            "./public_html/assets/plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js",
            "./public_html/assets/plugins/forms/checkall/jquery.CheckAll.js",
            "./public_html/assets/plugins/forms/switch/jquery.onoff.min.js",
            "./public_html/assets/js/pages/form-elements.js",
            "./public_html/assets/plugins/forms/password/jquery-passy.js",
            "./public_html/assets/plugins/forms/timepicker/jquery-ui-timepicker-addon.js",
            "./public_html/assets/plugins/forms/color-picker/spectrum.js",
            "./public_html/assets/plugins/ui/video/video.js",
            //"./public_html/assets/js/jquery.appStart.js",
            //"./public_html/assets/js/app.js",
        ])
        .pipe(concat('main-layout.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../imidiatv/public_html/assets/js'));

});

gulp.task('styles', function() {

    return gulp.src([
            //'./public_html/assets/css/home.css',
            './public_html/assets/css/icons.css' ,
            './public_html/assets/css/bootstrap.css' ,
            './public_html/assets/css/appstart-theme/jquery.ui.all.css' ,
            './public_html/assets/css/plugins.css' ,
            './public_html/assets/css/main.css' ,
            './public_html/assets/css/custom.css'
        ])
        // .pipe(watch([
        //     './public_html/assets/css/icons.css' ,
        //     './public_html/assets/css/bootstrap.css' ,
        //     './public_html/assets/css/appstart-theme/jquery.ui.all.css' ,
        //     './public_html/assets/css/plugins.css' ,
        //     './public_html/assets/css/main.css' ,
        //     './public_html/assets/css/custom.css'
        // ]))
        // .pipe(plumber())
        .pipe(concat('all-styles.min.css'))
        .pipe(cssnano())
        .pipe(gulp.dest('../imidiatv/public_html/assets/css'));

});

gulp.task('htmlmin', function() {
    return gulp.src('./application/views/**/*.phtml')
        .pipe(watch('./application/views/**/*.phtml'))
        .pipe(plumber())
        .pipe(htmlmin({collapseWhitespace: true}))
        .pipe(stripComments())
        .pipe(gulp.dest('../imidiatv/application/views'))

});

gulp.task('layoutmin', function() {
    return gulp.src('./application/layouts/scripts/*.phtml')
        .pipe(watch('./application/layouts/scripts/*.phtml'))
        .pipe(plumber())
        .pipe(htmlmin({collapseWhitespace: true}))
        .pipe(stripComments())
        .pipe(gulp.dest('../imidiatv/application/layouts/scripts'))
});


gulp.task('images', function() {
    return gulp.src('./public_html/assets/src-img/**/*')
        .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
        .pipe(gulp.dest('../imidiatv/public_html/assets/img'))
        .pipe(notify({ message: 'Images task complete' }));
});



gulp.task('devel', function() {
// * renomear ex.:
//      pasta "views" para "dist-views"
//      pasta "src-views" para "views"

});

gulp.task('deploy', function() {

// * renomear pastas
//      pasta "views" para "src-views"
//      pasta "dist-views" para "views"
// * pode ate mudar o numero da versao
// * compilar tudo

});

gulp.task('watch', function() {

    // Watch .scss files
    gulp.watch('./public_html/assets/css/**/*.css', ['styles']);
    gulp.watch('./public_html/css/site.css', ['style1']);

    // Watch .js files
    //gulp.watch('src/scripts/**/*.js', ['scripts']);

    // Watch image files
    //gulp.watch('src/images/**/*', ['images']);

});

//gulp.task('default', ['clean'], function() {
gulp.task('default', function() {
    gulp.start('phpminify','style1','style2', 'styles' , 'htmlmin','scripts','layoutmin','mainlayoutscripts','internalcontent');
});