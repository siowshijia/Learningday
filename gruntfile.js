const sass = require( 'node-sass' );

module.exports = function( grunt ) {
	// project configuration
	grunt.initConfig( {
		// metadata
		pkg: grunt.file.readJSON( 'package.json' ),
		logo:
      /*eslint-disable */
      '*            .--://////::-.`                                                                                                                            \n' +
      '*        `-/++++++++++++++++/:.                                                                                                                         \n' +
      '*      ./++++++++++++++++++++++/-                                                                                                                       \n' +
      '*    `/+++++++++++++/++++++++++++/.                                                 .:                                                                  \n' +
      '*   .+++++/.++++++/.`/++++++:.+++++:         .+`       /+`       /-                 -/                    `+`                                           \n' +
      '*  -++++++/ `/+++/`   :++++- .++++++:         /-      -:-:      ./                  -/                    `+`                                           \n' +
      '* `+++++++/  `/+++:  .+++/.  .+++++++-        -/      /``+`     /-      `----.`     -/ `.----`            `+`    `.  .---.   `.---.       .  `----.     \n' +
      '* :+++++++/    :++:  .++/`   .+++++++/         /.    -:  ::    `+`    ./-`  `./-    -/:-.`  `:/.          `+`    ./-:.` `-/.:-`  `:/`     +::.`  `-/-   \n' +
      '* /+++++++/  `::++:  .++::.  .++++++++`        -/   `+`  `+.   ::    ./`       /.   -/        -+`         `+`    .+`      :/       /-     +.       `/-  \n' +
      '* /+++++++/  `++++:  .++++-  .++++++++`        `+.  ::    -/  `+`    /-````````::   -/         +.         `+`    .+       -:       ::     +`        :/  \n' +
      '* :+++++++/  `++++:  .++++-  .+++++++/          :: `+`     /. -:     +-``````````   -/         +-         `+`    .+       -:       ::     +`        :/  \n' +
      '* `+++++++/  `++++:  .++++-  .+++++++-          `+`-:      -/ /.     :/             -/        -+`         `+`    .+       -:       ::     +`       `/-  \n' +
      '*  -++++++/   `````  .+:```  .++++++:            ::/`       /:/       :/`      `    -/.     `-/.          `+`    .+       -:       ::     +-`     ./-   \n' +
      '*   .+++++/````````  .+-`````-+++++:             `:-        .:.        `-::--::.    .-.-:::::.            `:`    `:       .-       --     +.-:::::-`    \n' +
      '*    `/+++++++++++:  .+++++++++++/.                                                                                                       +`            \n' +
      '*      ./+++++++++:  .+++++++++/-                                                                                                         +`            \n' +
      '*        `-/++++++:  .++++++/-.                                                                                                           /`            \n' +
      '*            .--:/-  ./::-.`',
    /*eslint-enable */
		message:
      "* You appear to be one of those insatiably curious engineers who always wants to know what's under the covers\n" +
      "* and make it better. We are a like-minded group of engineers and designers implementing this solution. We've\n" +
      '* got hard problems to solve and some amazing technology to do so: come join us and be part of it all!\n*\n' +
      '* Now hiring @ https://www.webimp.com.sg/career/',
		banner:
      '/*\n' +
      '* <%= pkg.title || pkg.name %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author %>\n*\n<%= logo %>\n*\n<%= message %>\n*/\n\n',
		output: {
			global: {
				css: 'assets/css/<%= pkg.name %>.min.css',
				js: 'assets/js/<%= pkg.name %>.min.js',
			},
			woocommerce: {
				css: 'assets/css/<%= pkg.name %>-wc.min.css',
				js: 'assets/js/<%= pkg.name %>-wc.min.js',
			},
			fontAwesome: {
				css: 'assets/css/fontawesome.min.css',
			},
			swiper: {
				css: 'assets/css/swiper.min.css',
				js: 'assets/js/swiper.min.js',
			},
			masonry: {
				js: 'assets/js/masonry.init.min.js',
			},
			swipebox: {
				js: 'assets/js/swipebox.min.js',
			},
		},

		// task configuration
		header: {
			options: {
				text: '<%= banner %>',
			},
			global: {
				files: {
					'<%= output.global.css %>': '<%= output.global.css %>',
					'<%= output.global.js %>': '<%= output.global.js %>',
				},
			},
			masonry: {
				files: {
					'<%= output.masonry.js %>': '<%= output.masonry.js %>',
				},
			},
			woocommerce: {
				files: {
					'<%= output.woocommerce.css %>': '<%= output.woocommerce.css %>',
					'<%= output.woocommerce.js %>': '<%= output.woocommerce.js %>',
				},
			},
			swipebox: {
				files: {
					'assets/css/swipebox.min.css': 'assets/css/swipebox.min.css',
					'<%= output.swipebox.js %>': '<%= output.swipebox.js %>',
				},
			},
			swiper: {
				files: {
					'<%= output.swiper.css %>': '<%= output.swiper.css %>',
					'<%= output.swiper.js %>': '<%= output.swiper.js %>',
				},
			},
			fontawesome: {
				files: {
					'<%= output.fontAwesome.css %>': '<%= output.fontAwesome.css %>',
				},
			},
		},
		comments: {
			global: {
				options: {
					keepSpecialComments: false,
				},
				src: [ '<%= output.global.css %>', '<%= output.global.js %>' ],
			},
			woocommerce: {
				src: [ '<%= output.woocommerce.css %>', '<%= output.woocommerce.js %>' ],
			},
			swipebox: {
				options: {
					keepSpecialComments: false,
				},
				src: [ 'assets/css/swipebox.min.css', '<%= output.swipebox.js %>' ],
			},
		},
		trimtrailingspaces: {
			options: {
				filter: 'isFile',
				encoding: 'utf8',
			},
			global: {
				src: [ '<%= output.global.css %>', '<%= output.global.js %>' ],
			},
			woocommerce: {
				src: [ '<%= output.woocommerce.css %>', '<%= output.woocommerce.js %>' ],
			},
			swipebox: {
				src: [ 'assets/css/swipebox.min.css', '<%= output.swipebox.js %>' ],
			},
			swiper: {
				src: [ '<%= output.swiper.css %>', '<%= output.swiper.js %>' ],
			},
		},
		concat: {
			options: {
				stripBanners: true,
			},
			global: {
				dest: '.tmp/js/<%= pkg.name %>.js',
				src: [
					'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
					'assets/src/js/global.functions.js',
					'assets/src/js/global.init.js',
				],
			},
			masonry: {
				dest: '.tmp/js/masonry.js',
				src: [ 'assets/src/js/masonry.init.js' ],
			},
			swiper: {
				dest: '.tmp/js/swiper.js',
				src: [
					'node_modules/swiper/js/swiper.js',
					'assets/src/js/swiper.init.js',
				],
			},
			swipebox: {
				dest: '.tmp/js/swipebox.js',
				src: [
					'node_modules/swipebox/src/js/jquery.swipebox.min.js',
					'assets/src/js/swipebox.init.js',
				],
			},
			woocommerce: {
				dest: '.tmp/js/woocommerce.js',
				src: [ 'assets/src/js/woocommerce.init.js' ],
			},
		},
		uglify: {
			options: {
				compress: true,
				output: {
					comments: false,
				},
			},
			global: {
				files: {
					'<%= output.global.js %>': [ '<%= concat.global.dest %>' ],
				},
			},
			masonry: {
				files: {
					'<%= output.masonry.js %>': [ '<%= concat.masonry.dest %>' ],
				},
			},
			swiper: {
				files: {
					'<%= output.swiper.js %>': [ '<%= concat.swiper.dest %>' ],
				},
			},
			swipebox: {
				files: {
					'<%= output.swipebox.js %>': [ '<%= concat.swipebox.dest %>' ],
				},
			},
			woocommerce: {
				files: {
					'<%= output.woocommerce.js %>': [ '<%= concat.woocommerce.dest %>' ],
				},
			},
		},
		eslint: {
			beforebuild: [ 'gruntfile.js', 'assets/src/js/*.js' ],
		},
		sass: {
			options: {
				implementation: sass,
				sourceMap: false,
				outputStyle: 'compressed',
				precision: 8,
			},
			global: {
				files: {
					'<%= output.global.css %>': 'assets/src/css/global/global.scss',
				},
			},
			swiper: {
				files: {
					'<%= output.swiper.css %>': 'assets/src/css/swiper/swiper.scss',
				},
			},
			woocommerce: {
				files: {
					'<%= output.woocommerce.css %>':
            'assets/src/css/woocommerce/woocommerce.scss',
				},
			},
		},
		copy: {
			fontawesome: {
				files: [
					{
						expand: true,
						cwd: 'node_modules/@fortawesome/fontawesome-free/css/',
						src: [
							'all.min.css',
						],
						dest: 'assets/css/',
						filter: 'isFile',
						rename( dest ) {
							return dest + 'fontawesome.min.css';
						},
					},
					{
						expand: true,
						cwd: 'node_modules/@fortawesome/fontawesome-free/webfonts/',
						src: [
							'fa-{brands,regular,solid}-{400,900}.{eot,svg,ttf,woff,woff2}',
						],
						dest: 'assets/webfonts/',
						filter: 'isFile',
					},
				],
			},
			swiper: {
				files: [
					{
						expand: true,
						cwd: 'node_modules/swiper/js/',
						src: [ 'maps/swiper.jquery.min.js.map' ],
						dest: 'assets/js/',
						filter: 'isFile',
					},
					{
						expand: true,
						cwd: 'node_modules/swiper/css/',
						src: [ 'swiper.css' ],
						dest: '.tmp/',
						filter: 'isFile',
						rename( dest ) {
							return dest + 'swiper.scss';
						},
					},
				],
			},
			swipebox: {
				files: [
					{
						expand: true,
						cwd: 'node_modules/swipebox/src/css/',
						src: [ 'swipebox.min.css' ],
						dest: 'assets/css/',
						filter: 'isFile',
					},
					{
						expand: true,
						cwd: 'node_modules/swipebox/src/img/',
						src: [ '*' ],
						dest: 'assets/img/',
						filter: 'isFile',
					},
				],
			},
			masonry: {
				files: [
					{
						expand: true,
						cwd: 'node_modules/imagesloaded/',
						src: [ 'imagesloaded.pkgd.min.js' ],
						dest: 'assets/js/',
						filter: 'isFile',
					},
					{
						expand: true,
						cwd: 'node_modules/masonry-layout/dist/',
						src: [ 'masonry.pkgd.min.js' ],
						dest: 'assets/js/',
						filter: 'isFile',
					},
				],
			},
		},
		clean: {
			global: [ '<%= output.global.css %>', '<%= output.global.js %>' ],
			woocommerce: [
				'<%= output.woocommerce.css %>',
				'<%= output.woocommerce.js %>',
			],
			swipebox: [
				'assets/css/swipebox.min.css',
				'<%= output.swipebox.js %>',
				'assets/img/icons.{png,svg}',
				'assets/img/loader.gif',
			],
			swiper: [
				'<%= output.swiper.css %>',
				'assets/js/maps/swiper.jquery.min.js.map',
				'<%= output.swiper.js %>',
			],
			fontawesome: [
				'<%= output.fontAwesome.css %>',
				'assets/webfonts/fa-{brands,regular,solid}-{400,900}.{eot,svg,ttf,woff,woff2}',
			],
			masonry: [
				'<%= output.masonry.js %>',
				'assets/js/imagesloaded.pkgd.min.js',
				'assets/js/masonry.pkgd.min.js',
			],
			tmp: [ '.tmp' ],
		},
		watch: {
			config: {
				files: [ 'gruntfile.js', 'package.json' ],
				tasks: [ 'default' ],
				options: {
					reload: true,
				},
			},
			jsGlobal: {
				files: [
					'assets/src/js/global.functions.js',
					'assets/src/js/global.init.js',
				],
				tasks: [
					// prep:js
					'eslint:beforebuild',

					// build:js
					'concat:global',
					'uglify:global',

					// done
					'beep',
				],
				options: {
					debounceDelay: 2000,
				},
			},
			jsMasonry: {
				files: [ 'assets/src/js/masonry.init.js' ],
				tasks: [ 'taskMasonry', 'beep' ],
				options: {
					debounceDelay: 2000,
				},
			},
			jsSwiper: {
				files: [ 'assets/src/js/swiper.init.js' ],
				tasks: [
					// prep:js
					'eslint:beforebuild',

					// build:js
					'concat:swiper',
					'uglify:swiper',

					// done
					'beep',
				],
				options: {
					debounceDelay: 2000,
				},
			},
			jsSwipebox: {
				files: [ 'assets/src/js/swipebox.init.js' ],
				tasks: [
					// prep:js
					'eslint:beforebuild',

					// build:js
					'concat:swipebox',
					'uglify:swipebox',

					// done
					'beep',
				],
				options: {
					debounceDelay: 2000,
				},
			},
			jsWoocommerce: {
				files: [ 'assets/src/js/woocommerce.init.js' ],
				tasks: [
					// prep:js
					'eslint:beforebuild',

					// build:js
					'concat:woocommerce',
					'uglify:woocommerce',

					// done
					'beep',
				],
				options: {
					debounceDelay: 2000,
				},
			},
			cssSwiper: {
				files: [
					'assets/src/css/global/_variables.scss',
					'assets/src/css/global/mixins/*.scss',
					'assets/src/css/swiper/**/*.scss',
				],
				tasks: [
					// prep:both
					'copy:swiper',

					// build:css
					'sass:swiper',

					// done
					'beep',
				],
				options: {
					debounceDelay: 2000,
				},
			},
			cssGlobal: {
				files: [ 'assets/src/css/global/**/*.scss' ],
				tasks: [
					// build:css
					'sass:global',

					// done
					'beep',
				],
				options: {
					debounceDelay: 2000,
				},
			},
			cssWoocommerce: {
				files: [
					'assets/src/css/global/**/*.scss',
					'assets/src/css/woocommerce/**/*.scss',
				],
				tasks: [
					// build:css
					'sass:woocommerce',

					// done
					'beep',
				],
			},
		},
	} );

	// plugins
	require( 'load-grunt-tasks' )( grunt );

	// default task
	grunt.registerTask( 'default', [
		'clean',
		'taskGlobal',
		'taskWoocommerce',
		'taskSwipebox',
		'taskSwiper',
		'taskFontawesome',
		'taskMasonry',
		'beep',
	] );

	grunt.registerTask( 'taskGlobal', [
		// remove old files
		'clean:global',

		// build:css
		'sass:global',

		// prep:js
		'eslint:beforebuild',

		// build:js
		'concat:global',
		'uglify:global',

		// clean:both
		'comments:global',
		'trimtrailingspaces:global',

		// header:both
		'header:global',
	] );

	grunt.registerTask( 'taskWoocommerce', [
		// remove old files
		'clean:woocommerce',

		// build:css
		'sass:woocommerce',

		// prep:js
		'eslint:beforebuild',

		// build:js
		'concat:woocommerce',
		'uglify:woocommerce',

		// clean:both
		'comments:woocommerce',
		'trimtrailingspaces:woocommerce',

		// header:both
		'header:woocommerce',
	] );

	grunt.registerTask( 'taskSwipebox', [
		// remove old files
		'clean:swipebox',

		// prep:css
		'copy:swipebox',
		'comments:swipebox',

		// prep:js
		'eslint:beforebuild',

		// build:js
		'concat:swipebox',
		'uglify:swipebox',

		// clean:both
		'trimtrailingspaces:swipebox',
		'header:swipebox',
	] );

	grunt.registerTask( 'taskSwiper', [
		// remove old files
		'clean:swiper',

		// prep:both
		'copy:swiper',

		// build:css
		'sass:swiper',

		// prep:js
		'eslint:beforebuild',

		// build:js
		'concat:swiper',
		'uglify:swiper',

		// clean:both
		'trimtrailingspaces:swiper',
		'header:swiper',
	] );

	grunt.registerTask( 'taskFontawesome', [
		// remove old files
		'clean:fontawesome',

		// prep:both
		'copy:fontawesome',

		// clean:css
		'header:fontawesome',
	] );

	grunt.registerTask( 'taskMasonry', [
		// remove old files
		'clean:masonry',

		// prep:js
		'copy:masonry',

		// build:js
		'concat:masonry',
		'uglify:masonry',

		// clean:js
		'header:masonry',
	] );
};
