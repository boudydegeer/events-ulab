var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
	mix
		.sass('app.scss')
		.browserify('app.js')
		.copy('resources/assets/images', 'public/images')
		.version(['css/app.css', 'js/app.js' ])

		.browserSync({
			proxy: 'events.ulab.dev',
			host: 'events.ulab.dev',
			open: 'external',
			browser: 'google chrome canary',
		});
});
