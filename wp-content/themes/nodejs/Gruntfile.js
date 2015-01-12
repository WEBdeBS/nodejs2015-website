module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        sass: {
            dev:{
                options: {
                    loadPath: 'bower_components/bootstrap-sass-official/assets/stylesheets'
                },
                files: {
                    'style.css': 'sass/style.scss'
                }
            }        
        },
        
        uglify: {
            dev:{
                files: {
                    'app.js': [
                        'js/*.js',
                        'bower_components/jquery/dist/jquery.js'
                    ]
                }
            }
        },
        
        watch: {
            sass: {
                files: ['sass/*.scss'],
                tasks: 'sass'
            },
            js: {
                files: ['js/*.js'],
                tasks: 'uglify'
            }
        }
    });

    // Default task(s).
    grunt.registerTask('default', ['watch']);

};