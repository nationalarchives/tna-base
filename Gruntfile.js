module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourcemap: 'none'
            },
            dist: {
                files: {
                    'css/base-sass.css': 'css/sass/base-sass.scss'
                }
            }
        },
        cssmin: {
            options: {
                sourceMap: true
            },
            target: {
                files: {
                    'css/base-sass.css.min': ['css/base-sass.css']
                }
            }
        },
        watch: {
            css: {
                files: 'css/sass/*.scss',
                tasks: ['sass', 'cssmin']
            }
        },
        browserSync: {
            dev: {
                bsFiles: {
                    src: [
                        'css/*.css'
                    ]
                },
                options: {
                    watchTask: true,
                    proxy: 'tna-website-dev:8888'
                }
            }
        },
        jasmine: {
            pivotal: {
                src: 'js/compiled/*.js',
                options: {
                    specs: 'js/spec/*Spec.js',
                    helpers: 'js/spec/*Helper.js'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-jasmine');

    // Default task(s).
    grunt.registerTask('default', ['sass', 'cssmin', 'watch']);
    grunt.registerTask('bSync', ['browserSync', 'watch']);

};