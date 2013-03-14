'use strict';
module.exports = function(grunt) {
  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        'assets/js/plugins/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    recess: {
      dist: {
        options: {
          compile: true,
          compress: true
        },
        files: {
          'assets/css/style.min.css': [
            'assets/css/bootstrap/bootstrap.less',
            'assets/css/bootstrap/responsive.less',
            'assets/css/app.less',
            'assets//css/icons.css'
          ]
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'assets/js/plugins/bootstrap/transition.js',
            'assets/js/plugins/bootstrap/alert.js',
            'assets/js/plugins/bootstrap/button.js',
            'assets/js/plugins/bootstrap/carousel.js',
            'assets/js/plugins/bootstrap/collapse.js',
            'assets/js/plugins/bootstrap/dropdown.js',
            'assets/js/plugins/bootstrap/modal.js',
            'assets/js/plugins/bootstrap/tooltip.js',
            'assets/js/plugins/bootstrap/popover.js',
            'assets/js/plugins/bootstrap/scrollspy.js',
            'assets/js/plugins/bootstrap/tab.js',
            'assets/js/plugins/bootstrap/typehead.js',
            'assets/js/plugins/*.js',
            'assets/js/*.js'
          ]
        }
      }
    },
    watch: {
      less: {
        files: [
          'assets/css/*.less',
          'assets/css/bootstrap/*.less'
        ],
        tasks: ['recess']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint']
      }
    },
    clean: {
      dist: [
        'assets/css/style.min.css',
        'assets/js/scripts.min.js'
      ]
    }
  });

  grunt.loadTasks('tasks');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-recess');

  grunt.registerTask('default', [
    'clean',
    'recess',
    'uglify',
  ]);

  grunt.registerTask('dev', [
    'watch'
  ]);
};
