module.exports = function (grunt) {
	// time
	require('time-grunt')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {

			options: {
				sourceMap: true
			},

			dist: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'assets/stylesheets/marx.css': 'assets/scss/marx.sass'
				}
			}

		},

		copy: {

			scripts: {
				expand: true,
				cwd: 'assets/components/foundation/js/vendor/',
				src: '**',
				flatten: 'true',
				dest: 'assets/javascript/vendor/'
			},

			iconfonts: {
				expand: true,
				cwd: 'assets/components/fontawesome/fonts',
				src: ['**'],
				dest: 'assets/fonts/'
			}

		},

		'string-replace': {

			fontawesome: {
				files: {
					'assets/fontawesome/scss/_variables.scss': 'assets/fontawesome/scss/_variables.scss'
				},

				options: {
					replacements: [
						{
							pattern: '../fonts',
							replacement: '../assets/fonts'
						}
					]
				}

			}

		},

		concat: {

			options: {
				separator: ';'
			},

			dist: {

				src: [

					// Foundation core
					'assets/components/foundation/js/foundation/foundation.js',

					// Pick the componenets you need in your project
					//'assets/components/foundation/js/foundation/foundation.abide.js',
					//'assets/components/foundation/js/foundation/foundation.accordion.js',
					//'assets/components/foundation/js/foundation/foundation.alert.js',
					//'assets/components/foundation/js/foundation/foundation.clearing.js',
					//'assets/components/foundation/js/foundation/foundation.dropdown.js',
					//'assets/components/foundation/js/foundation/foundation.equalizer.js',
					//'assets/components/foundation/js/foundation/foundation.interchange.js',
					//'assets/components/foundation/js/foundation/foundation.joyride.js',
					//'assets/components/foundation/js/foundation/foundation.magellan.js',
					//'assets/components/foundation/js/foundation/foundation.offcanvas.js',
					//'assets/components/foundation/js/foundation/foundation.orbit.js',
					//'assets/components/foundation/js/foundation/foundation.reveal.js',
					//'assets/components/foundation/js/foundation/foundation.slider.js',
					//'assets/components/foundation/js/foundation/foundation.tab.js',
					//'assets/components/foundation/js/foundation/foundation.tooltip.js',
					'assets/components/foundation/js/foundation/foundation.topbar.js',

          // Include Custom bower plugins
          //'assets/components/fullpage.js/jquery.fullPage.js',
          //'assets/components/isotope/dist/isotope.pkgd.js',

					// Include your own custom scripts (located in the custom folder)
					'assets/javascript/custom/*.js'

				],

				// Finally, concatinate all the files above into one single file
				dest: 'assets/javascript/marx.js'

			}

		},

		uglify: {

			dist: {
				files: {
					// Shrink the file size by removing spaces
					'assets/javascript/marx.js': ['assets/javascript/marx.js']
				}
			}

		},

		watch: {
			grunt: {files: ['Gruntfile.js']},

			sass: {
				files: 'assets/scss/**/*.*',
				tasks: ['sass'],
				options: {
					livereload: true
				}
			},

			js: {
				files: 'assets/javascript/custom/**/*.js',
				tasks: ['concat', 'uglify'],
				options: {
					livereload: true
				}
			},

			all: {
				files: '**/*.php',
				options: {
					livereload: true
				}
			}

		}
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-string-replace');

	grunt.registerTask('build', ['copy', 'string-replace:fontawesome', 'sass', 'concat', 'uglify']);
	grunt.registerTask('default', ['watch']);
};