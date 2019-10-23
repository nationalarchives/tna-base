module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      options: {
        sourcemap: false
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
          'css/base-sass.min.css': ['css/base-sass.css']
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
      small: {
        src: ['js/tests/**/*.html'],
        options: {
          page: {
            viewportSize: { width: 300, height: 400 }
          }
        }
      },
      large: {
        src: ['js/tests/**/*.html'],
        options: {
          page: {
            viewportSize: { width: 1024, height: 400 }
          }
        }
      }
    },
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: [
          'js/generic-utilities.js',
          'js/mega-menu.js',
          'js/mitigate-target-blank.js',
          'js/cookie-notice.js',
          'js/global-search.js',
          'js/image-caption.js',
          'js/tna-global.js',
          'js/run-on-page-load.js'
        ],
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
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-qunit');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Default task(s).
  grunt.registerTask('default', [
    'sass',
    'cssmin',
    'concat',
    'uglify',
    'qunit',
    'watch'
  ]);
};
