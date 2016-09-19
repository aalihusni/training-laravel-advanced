const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

elixir(mix => {
    mix.sass('app.scss')
       .copy('node_modules/font-awesome/fonts', 'public/fonts') // copy over fonts folders to public
       .webpack('app.js');
});

/*
	Paths passed to this method are relative to the resources/assets/css directory 
	and the resulting CSS will be placed in public/css/all.css
*/

// page dashboard
elixir(function(mix){
	mix.styles(
		['dashboard.css','generic.css'],
		'public/assets/css/dashboard.css');
});

// page main
elixir(function(mix) {
    mix.styles([
        'generic.css',
        'main.css'
    ],'public/css/dashboard.css');
});

elixir(function(mix) {
    mix.scripts([
        'dashboard.js',
        'generic.js'
    ],'public/assets/js/dashboard.js');
});

elixir(function(mix) {
    mix.scripts([
        'canvasjs.js'
    ],'public/assets/js/report.js','node_modules/canvasjs/dist');
});

/*
	Paths passed to this method are relative to the resources/assets/css directory 
	and the resulting CSS will be placed in public/css/all.css
*/
// elixir(function(mix) {
//     mix.styles([
//         'normalize.css',
//         'main.css'
//     ], 'public/assets/css/components.css');
// });