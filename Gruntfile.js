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
            scripts: {
                files: 'js/*.js',
                tasks: ['qunit', 'concat', 'uglify']
            },
            css: {
                files: 'css/sass/*.scss',
                tasks: ['sass', 'cssmin']
            }
        },
        qunit: {
            all: ['js/tests/**/*.html']
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: ['js/mitigate-target-blank.js', 'js/run-on-page-load.js'],
                dest: 'js/compiled/tna-base.js'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'js/compiled/tna-base.min.js': ['js/compiled/tna-base.js']
                }
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
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task(s).
    grunt.registerTask('default', ['sass', 'cssmin', 'qunit', 'concat', 'uglify', 'watch']);
    grunt.registerTask('bSync', ['browserSync', 'watch']);

};