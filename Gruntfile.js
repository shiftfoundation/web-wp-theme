module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		compass: {
			dev: {
				options: {              
					sassDir: ['scss'],
					cssDir: ['css'],
					environment: 'development',
					require: 'susy'
				}
			},
			sourceMap: {
				options: {
					sourceComments: 'map',
					sourceMap: 'app.css.map'
				},
				files: {
					'css/app.css': 'scss/app.scss'
				}
			},
		},
		watch: {
			grunt: { files: ['Gruntfile.js'] },
			scripts: {
				files: ['scss/**/*.scss'],
				tasks: ['compass:dev'],
			},
			livereload: {
				files: ['*.html', '*.php', 'js/**/*.{js,json}', 'css/*.css','img/**/*.{png,jpg,jpeg,gif,webp,svg}'],
				options: {
					livereload: true
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');

	grunt.registerTask('build', ['compass:dev']);
	grunt.registerTask('default', ['build','watch']);
}
