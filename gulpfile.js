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
// elixir(function(mix) {
//     mix.styles([
//         'animate.min.css'
//     ],'public/css/animation.css','node_modules/animate.css');
// });

// elixir(function(mix) {
//     mix.scripts([
//         'wow.min.js'
//     ],'public/js/animation.js','node_modules/wow.js/dist');
// });

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