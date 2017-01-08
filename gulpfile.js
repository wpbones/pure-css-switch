/**
 * Ispired from https://markgoodyear.com/2014/01/getting-started-with-gulp/
 *
 */

var gulp      = require( 'gulp' ),
    less      = require( 'gulp-less' ),
    minifycss = require( 'gulp-minify-css' ),
    uglify    = require( 'gulp-uglify' ),
    rename    = require( 'gulp-rename' ),
    path      = require( 'path' );


// LESS
gulp.task( 'less', function()
{
  return gulp.src( './src/resources/assets/less/**/*.less' )
    .pipe( less( {
      paths : [ path.join( __dirname, 'less', 'includes' ) ]
    } ) )
    .pipe( gulp.dest( './src/public/css' ) )
    .pipe( rename( { suffix : '.min' } ) )
    .pipe( minifycss() )
    .pipe( gulp.dest( './src/public/css' ) )
} );

// Script
gulp.task( 'scripts', function()
{
  return gulp.src( './src/resources/assets/js/**/*.js' )
    .pipe( gulp.dest( './src/public/js' ) )
    .pipe( rename( { suffix : '.min' } ) )
    .pipe( uglify() )
    .pipe( gulp.dest( './src/public/js' ) );
} );

// Default task
gulp.task( 'default', function()
{
  // place code for your default task here
  gulp.start( 'less', 'scripts' );
} );

// Watch
gulp.task( 'watch', function()
{

  // Watch .less files
  gulp.watch( './src/resources/assets/less/**/*.less', [ 'less' ] );
  gulp.watch( './src/resources/assets/js/**/*.js', [ 'scripts' ] );

} );