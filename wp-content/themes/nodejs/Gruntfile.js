module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dev: {
                options: {
                    loadPath: ['bower_components/bootstrap-sass-official/assets/stylesheets']
                },
                files: {
                    'style.css': 'sass/style.scss'
                }
            }
        },

        uglify: {
            dev: {
                files: {
                    'app.js': [
                        'bower_components/jquery/dist/jquery.js',
						'bower_components/jquery-colorbox/jquery.colorbox.js',
						'bower_components/OwlCarousel/owl-carousel/owl.carousel.js',
                        'js/*.js'
                    ]
                }
            }
        },

        watch: {
            sass: {
                files: ['sass/**/*.scss'],
                tasks: 'sass',
                options: {
                    livereload: true,
                }
            },
            js: {
                files: ['js/*.js'],
                tasks: 'uglify',
                options: {
                    livereload: true,
                }
            },
            php: {
                files: ['*.php'],
                options: {
                    livereload: true,
                }
            }
        }
    });

    // Default task(s).
    grunt.registerTask('default', ['watch']);

};